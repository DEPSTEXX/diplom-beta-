<?php

return [
    'name' => 'Yarko Park API',
    'version' => '1.0.0',
    'jwt_secret' => $_ENV['JWT_SECRET'] ?? 'your-secret-key-change-in-production',
    'jwt_expiration' => 86400, // 24 hours
    'cors_origins' => [
        'http://localhost:5173',
        'http://localhost:5174',
    ],
];