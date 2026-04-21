<?php

namespace App\Controllers;

use App\Controller;
use App\Auth;
use App\Database\Connection;

class AuthController extends Controller
{
    public function login(): array
    {
        $body = $this->getBody();
        
        if (empty($body['email']) || empty($body['password'])) {
            return $this->error('Email and password are required');
        }

        $db = Connection::getInstance();
        $stmt = $db->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$body['email']]);
        $user = $stmt->fetch();

        if (!$user || !password_verify($body['password'], $user['password_hash'])) {
            return $this->error('Invalid credentials', 401);
        }

        $token = Auth::generateToken($user);

        return $this->success([
            'user' => [
                'id' => $user['id'],
                'email' => $user['email'],
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'role' => $user['role'],
            ],
            'token' => $token,
        ]);
    }

    public function register(): array
    {
        $body = $this->getBody();

        if (empty($body['email']) || empty($body['password'])) {
            return $this->error('Email and password are required');
        }

        $db = Connection::getInstance();

        // Check if user exists
        $stmt = $db->prepare('SELECT id FROM users WHERE email = ?');
        $stmt->execute([$body['email']]);
        
        if ($stmt->fetch()) {
            return $this->error('User already exists', 409);
        }

        // Create user
        $passwordHash = password_hash($body['password'], PASSWORD_DEFAULT);
        $stmt = $db->prepare(
            'INSERT INTO users (email, password_hash, first_name, last_name, phone, role) VALUES (?, ?, ?, ?, ?, ?)'
        );
        $stmt->execute([
            $body['email'],
            $passwordHash,
            $body['first_name'] ?? '',
            $body['last_name'] ?? '',
            $body['phone'] ?? '',
            'customer',
        ]);

        $userId = $db->lastInsertId();
        $stmt = $db->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$userId]);
        $user = $stmt->fetch();

        $token = Auth::generateToken($user);

        return $this->success([
            'user' => [
                'id' => $user['id'],
                'email' => $user['email'],
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'role' => $user['role'],
            ],
            'token' => $token,
        ], 'Registration successful');
    }

    public function logout(): array
    {
        return $this->success(null, 'Logged out successfully');
    }

    public function me(): array
    {
        $authUser = Auth::requireAuth();
        
        $db = Connection::getInstance();
        $stmt = $db->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$authUser['user_id']]);
        $user = $stmt->fetch();

        if (!$user) {
            return $this->error('User not found', 404);
        }

        return $this->success([
            'id' => $user['id'],
            'email' => $user['email'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'phone' => $user['phone'],
            'role' => $user['role'],
        ]);
    }
}