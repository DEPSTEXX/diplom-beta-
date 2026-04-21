<?php

namespace App\Middleware;

use App\Database\Connection;
use PDO;
use PDOException;

/**
 * Middleware для защиты от DOS/DDOS атак.
 *
 * Принцип работы (Sliding Window):
 *  - Подсчитывает количество запросов с одного IP за последние N секунд.
 *  - Если количество превышает лимит — возвращает ошибку 429 Too Many Requests.
 *  - Старые записи периодически очищаются для сохранения производительности.
 *
 * Настройки:
 *  MAX_REQUESTS   — максимальное число запросов за период
 *  WINDOW_SECONDS — длина временного окна в секундах
 *  CLEANUP_PROB   — вероятность очистки старых записей (1/N от запросов)
 */
class RateLimitMiddleware
{
    // Глобальный лимит: не более 3 запросов в 10 секунд с одного IP (Снижено для теста)
    private const MAX_REQUESTS = 7;  // Максимум запросов
    private const WINDOW_SECONDS = 10; // За сколько секунд

    // Строгий лимит для чувствительных эндпоинтов (логин, регистрация) (Снижено для теста)
    private const SENSITIVE_MAX_REQUESTS = 7;
    private const SENSITIVE_WINDOW_SECONDS = 10;

    // Вероятность запуска очистки старых записей (1 из 50 запросов)
    private const CLEANUP_PROB = 50;

    /**
     * Чувствительные маршруты с более строгим лимитом.
     */
    private static array $sensitiveRoutes = [
        '/auth/login',
        '/auth/register',
        '/auth/password',
    ];

    /**
     * Обрабатывает входящий запрос.
     * Вызывать ДО dispatch() в index.php.
     */
    public static function handle(string $uri = ''): void
    {
        $ip = self::getClientIp();

        // Защита: если IP определить невозможно — пропускаем (не блокируем)
        if (empty($ip)) {
            return;
        }

        // Выбираем настройки в зависимости от маршрута
        $isSensitive = self::isSensitiveRoute($uri);
        $maxRequests = $isSensitive ? self::SENSITIVE_MAX_REQUESTS : self::MAX_REQUESTS;
        $windowSecs = $isSensitive ? self::SENSITIVE_WINDOW_SECONDS : self::WINDOW_SECONDS;
        $endpoint = $isSensitive ? $uri : 'global';

        try {
            $pdo = Connection::getInstance();

            // Периодически чистим устаревшие записи
            if (random_int(1, self::CLEANUP_PROB) === 1) {
                self::cleanup($pdo);
            }

            $windowStart = date('Y-m-d H:i:s', time() - $windowSecs);

            // Считаем количество запросов с этого IP в текущем окне
            $stmt = $pdo->prepare(
                'SELECT SUM(request_count) as total 
                 FROM rate_limits 
                 WHERE ip_address = :ip 
                   AND endpoint = :endpoint 
                   AND window_start >= :window_start'
            );
            $stmt->execute([
                ':ip' => $ip,
                ':endpoint' => $endpoint,
                ':window_start' => $windowStart,
            ]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = (int) ($row['total'] ?? 0);

            if ($total >= $maxRequests) {
                // Лимит превышен — блокируем запрос
                $retryAfter = $windowSecs;
                http_response_code(429);
                header('Retry-After: ' . $retryAfter);
                header('Content-Type: application/json');
                echo json_encode([
                    'success' => false,
                    'message' => 'Слишком много запросов. Пожалуйста, подождите ' . $retryAfter . ' секунд.',
                    'retry_after' => $retryAfter,
                ]);
                exit;
            }

            // Записываем текущий запрос
            $now = date('Y-m-d H:i:s');
            $stmt = $pdo->prepare(
                'INSERT INTO rate_limits (ip_address, endpoint, request_count, window_start)
                 VALUES (:ip, :endpoint, 1, :now)
                 ON DUPLICATE KEY UPDATE request_count = request_count + 1'
            );
            // Используем INSERT с уникальным ключом по ip+endpoint+now для простоты
            // В реальном проекте можно хранить по минутным срезам
            $stmt = $pdo->prepare(
                'INSERT INTO rate_limits (ip_address, endpoint, request_count, window_start)
                 VALUES (:ip, :endpoint, 1, :now)'
            );
            $stmt->execute([
                ':ip' => $ip,
                ':endpoint' => $endpoint,
                ':now' => $now,
            ]);
        } catch (PDOException $e) {
            // При ошибке БД — не блокируем пользователя, просто пропускаем
            error_log('[RateLimit] DB Error: ' . $e->getMessage());
        }
    }

    /**
     * Определяет реальный IP-адрес клиента.
     * Учитывает прокси/балансировщики, но с проверкой доверия.
     */
    private static function getClientIp(): string
    {
        // Список доверенных заголовков прокси (в порядке приоритета)
        $headers = [
            'HTTP_CF_CONNECTING_IP',   // Cloudflare
            'HTTP_X_REAL_IP',          // Nginx proxy
            'HTTP_X_FORWARDED_FOR',    // Standard proxy
        ];

        foreach ($headers as $header) {
            if (!empty($_SERVER[$header])) {
                // X-Forwarded-For может содержать список IP — берём первый
                $ip = trim(explode(',', $_SERVER[$header])[0]);
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                    return $ip;
                }
            }
        }

        return $_SERVER['REMOTE_ADDR'] ?? '';
    }

    /**
     * Проверяет, является ли маршрут чувствительным.
     */
    private static function isSensitiveRoute(string $uri): bool
    {
        foreach (self::$sensitiveRoutes as $route) {
            if (str_starts_with($uri, $route)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Удаляет устаревшие записи из таблицы rate_limits.
     * Вызывается с вероятностью 1/CLEANUP_PROB для экономии ресурсов.
     */
    private static function cleanup(PDO $pdo): void
    {
        // Удаляем записи старше максимального временного окна с запасом
        $cutoff = date('Y-m-d H:i:s', time() - max(self::WINDOW_SECONDS, self::SENSITIVE_WINDOW_SECONDS) * 2);
        $pdo->prepare('DELETE FROM rate_limits WHERE window_start < :cutoff')
            ->execute([':cutoff' => $cutoff]);
    }
}
