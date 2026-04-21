<?php

class RateLimit
{
    private const MAX_REQUESTS   = 3;
    private const WINDOW_SECONDS = 10;

    private const SENSITIVE_MAX_REQUESTS   = 3;
    private const SENSITIVE_WINDOW_SECONDS = 10;

    private const CLEANUP_PROB = 50;

    private static array $sensitiveRoutes = [
        '/login.php',
        '/register.php'
    ];

    public static function handle(string $uri = ''): void
    {
        $ip = self::getClientIp();

        if (empty($ip)) {
            return;
        }

        $isSensitive = self::isSensitiveRoute($uri);
        $maxRequests = $isSensitive ? self::SENSITIVE_MAX_REQUESTS : self::MAX_REQUESTS;
        $windowSecs  = $isSensitive ? self::SENSITIVE_WINDOW_SECONDS : self::WINDOW_SECONDS;
        $endpoint    = $isSensitive ? $uri : 'global';

        try {
            $pdo = Database::getInstance();

            if (random_int(1, self::CLEANUP_PROB) === 1) {
                self::cleanup($pdo);
            }

            $windowStart = date('Y-m-d H:i:s', time() - $windowSecs);

            $stmt = $pdo->prepare(
                'SELECT SUM(request_count) as total 
                 FROM rate_limits 
                 WHERE ip_address = :ip 
                   AND endpoint = :endpoint 
                   AND window_start >= :window_start'
            );
            $stmt->execute([
                ':ip'           => $ip,
                ':endpoint'     => $endpoint,
                ':window_start' => $windowStart,
            ]);
            $row   = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = (int)($row['total'] ?? 0);

            if ($total >= $maxRequests) {
                http_response_code(429);
                header('Retry-After: ' . $windowSecs);
                // Подключаем визуальную страницу блокировки
                require_once __DIR__ . '/../includes/ddos_block.php';
                exit;
            }

            $now = date('Y-m-d H:i:s');
            $stmt = $pdo->prepare(
                'INSERT INTO rate_limits (ip_address, endpoint, request_count, window_start)
                 VALUES (:ip, :endpoint, 1, :now)'
            );
            $stmt->execute([
                ':ip'       => $ip,
                ':endpoint' => $endpoint,
                ':now'      => $now,
            ]);
        } catch (PDOException $e) {
            error_log('[RateLimit] DB Error: ' . $e->getMessage());
        }
    }

    private static function getClientIp(): string
    {
        $headers = [
            'HTTP_CF_CONNECTING_IP',
            'HTTP_X_REAL_IP',
            'HTTP_X_FORWARDED_FOR',
        ];

        foreach ($headers as $header) {
            if (!empty($_SERVER[$header])) {
                $ip = trim(explode(',', $_SERVER[$header])[0]);
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                    return $ip;
                }
            }
        }

        return $_SERVER['REMOTE_ADDR'] ?? '';
    }

    private static function isSensitiveRoute(string $uri): bool
    {
        foreach (self::$sensitiveRoutes as $route) {
            if (str_contains($uri, $route)) {
                return true;
            }
        }
        return false;
    }

    private static function cleanup(PDO $pdo): void
    {
        $cutoff = date('Y-m-d H:i:s', time() - max(self::WINDOW_SECONDS, self::SENSITIVE_WINDOW_SECONDS) * 2);
        $pdo->prepare('DELETE FROM rate_limits WHERE window_start < :cutoff')
            ->execute([':cutoff' => $cutoff]);
    }
}
