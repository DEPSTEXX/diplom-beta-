<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Router;
use App\Middleware\CorsMiddleware;
use App\Middleware\RateLimitMiddleware;

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Handle CORS
CorsMiddleware::handle();

// Убираем префикс пути при запуске через XAMPP Apache
$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Универсальная очистка URI от базового пути и /api
$basePath = '/DIPLOM/apps/backend/public';
if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}
$uri = preg_replace('#^/api#', '', $uri);
if ($uri === '') $uri = '/';

// DOS/DDOS protection: rate limiting
RateLimitMiddleware::handle($uri);

// Initialize router
$router = new Router();

// Define routes
require_once __DIR__ . '/../config/routes.php';

// Dispatch request
$response = $router->dispatch($method, $uri);

// Send response
header('Content-Type: application/json');
echo json_encode($response);