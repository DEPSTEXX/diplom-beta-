<?php
require_once __DIR__ . '/init.php';

if (isLoggedIn()) {
    header('Location: ' . site_url('index.php'));
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $error = 'Email и пароль обязательны';
    } else {
        $db = Database::getInstance();
        $stmt = $db->prepare('SELECT id, password_hash FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: ' . site_url('index.php'));
            exit;
        } else {
            $error = 'Неверный email или пароль';
        }
    }
}

require_once __DIR__ . '/includes/header.php';
?>

<style>
.auth-container {
    min-height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 100px 20px 40px;
}
.auth-box {
    background: white;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
}
.auth-box h1 { margin-bottom: 20px; font-size: 28px; }
.auth-form .form-group { margin-bottom: 20px; text-align: left; }
.auth-form label { display: block; font-weight: 600; margin-bottom: 8px; }
.auth-form input { 
    width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 16px; box-sizing: border-box; 
}
.auth-btn {
    width: 100%; padding: 15px; background: #2979ff; color: white; border: none; border-radius: 8px;
    font-size: 16px; font-weight: bold; cursor: pointer; transition: background 0.3s;
}
.auth-btn:hover { background: #1565c0; }
.auth-links { margin-top: 20px; font-size: 14px; }
.auth-links a { color: #2979ff; text-decoration: none; }
.error-msg { background: #fee; color: #c00; padding: 10px; border-radius: 5px; margin-bottom: 20px; }
</style>

<div class="auth-container">
    <div class="auth-box">
        <h1>Вход</h1>
        
        <?php if ($error): ?>
            <div class="error-msg"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form class="auth-form" method="POST" action="">
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required placeholder="Введите email">
            </div>
            <div class="form-group">
                <label>Пароль:</label>
                <input type="password" name="password" required placeholder="Введите пароль">
            </div>
            <button type="submit" class="auth-btn">Войти</button>
        </form>
        <div class="auth-links">
            <p>Нет аккаунта? <a href="<?= site_url('register.php') ?>">Зарегистрироваться</a></p>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
