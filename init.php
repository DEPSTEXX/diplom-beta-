<?php
// init.php
session_start();

// Простой автозагрузчик классов
spl_autoload_register(function ($class) {
    // Если класс лежит прямо в папке core/
    $file = __DIR__ . '/core/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Глобальные настройки
$config = require_once __DIR__ . '/config.php';
require_once __DIR__ . '/core/auth_helpers.php';

// Функция для генерации абсолютных путей до ресурсов (css, img и т.д.)
function site_url($path = '') {
    global $config;
    return rtrim($config['site_url'], '/') . '/' . ltrim($path, '/');
}

// Защита от DOS атак запускается для всех запросов автоматически
RateLimit::handle($_SERVER['REQUEST_URI'] ?? '');
