<?php
// core/auth_helpers.php

function isLoggedIn(): bool {
    return isset($_SESSION['user_id']);
}

function getCurrentUserId(): ?int {
    return $_SESSION['user_id'] ?? null;
}

function getCurrentUser(): ?array {
    if (!isLoggedIn()) return null;
    
    $db = Database::getInstance();
    $stmt = $db->prepare('SELECT id, email, first_name, last_name, role FROM users WHERE id = ?');
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetch() ?: null;
}

function requireLogin(): void {
    if (!isLoggedIn()) {
        header('Location: ' . site_url('login.php'));
        exit;
    }
}

function requireAdmin(): void {
    $user = getCurrentUser();
    if (!$user || $user['role'] !== 'admin') {
        http_response_code(403);
        die('Доступ запрещен. Требуются права администратора.');
    }
}

function logoutUser(): void {
    unset($_SESSION['user_id']);
    session_destroy();
}
