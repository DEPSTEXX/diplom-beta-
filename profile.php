<?php
require_once __DIR__ . '/init.php';

requireLogin(); // Только для авторизованных

$user = getCurrentUser();

// Обработка выхода
if (isset($_GET['logout'])) {
    logoutUser();
    header('Location: ' . site_url('index.php'));
    exit;
}

require_once __DIR__ . '/includes/header.php';
?>

<div style="padding: 120px 20px 40px; text-align: center; min-height: 70vh;">
    <h1>Личный кабинет</h1>
    <p>Добро пожаловать, <?= htmlspecialchars($user['first_name'] ?: $user['email']) ?>!</p>
    
    <div style="margin-top: 40px;">
        <a href="?logout=1" style="padding: 10px 20px; background: #d32f2f; color: white; text-decoration: none; border-radius: 5px;">Выйти из аккаунта</a>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
