<?php

namespace App;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Auth
{
    private static string $secret;
    private static int $expiration;

    public static function init(): void
    {
        $config = require __DIR__ . '/../config/app.php';
        self::$secret = $config['jwt_secret'];
        self::$expiration = $config['jwt_expiration'];
    }

    public static function generateToken(array $user): string
    {
        self::init();

        $payload = [
            'iss' => 'yarko-park',
            'iat' => time(),
            'exp' => time() + self::$expiration,
            'user_id' => $user['id'],
            'email' => $user['email'],
            'role' => $user['role'],
        ];

        return JWT::encode($payload, self::$secret, 'HS256');
    }

    public static function verifyToken(string $token): ?array
    {
        self::init();

        try {
            $decoded = JWT::decode($token, new Key(self::$secret, 'HS256'));
            return (array) $decoded;
        } catch (\Exception $e) {
            return null;
        }
    }

    public static function getUser(): ?array
    {
        $headers = getallheaders();
        $authHeader = $headers['Authorization'] ?? '';

        if (!preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            return null;
        }

        $token = $matches[1];
        return self::verifyToken($token);
    }

    public static function requireAuth(): array
    {
        $user = self::getUser();

        if (!$user) {
            http_response_code(401);
            echo json_encode([
                'success' => false,
                'message' => 'Unauthorized',
            ]);
            exit;
        }

        return $user;
    }

    public static function requireAdmin(): array
    {
        $user = self::requireAuth();

        if ($user['role'] !== 'admin') {
            http_response_code(403);
            echo json_encode([
                'success' => false,
                'message' => 'Forbidden',
            ]);
            exit;
        }

        return $user;
    }
}