<?php
require_once __DIR__ . '/init.php';

if (isLoggedIn()) {
    header('Location: ' . site_url('index.php'));
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['first_name'] ?? '');
    $last_name = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($email) || empty($password)) {
        $error = 'Email и пароль обязательны для заполнения';
    } else {
        $db = Database::getInstance();
        
        // Проверка существующего Email
        $stmt = $db->prepare('SELECT id FROM users WHERE email = ?');
        $stmt->execute([$email]);
        
        if ($stmt->fetch()) {
            $error = 'Пользователь с таким email уже существует';
        } else {
            // Создание пользователя
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $db->prepare(
                'INSERT INTO users (email, password_hash, first_name, last_name, phone, role) VALUES (?, ?, ?, ?, ?, ?)'
            );
            $stmt->execute([$email, $hash, $first_name, $last_name, $phone, 'customer']);
            
            // Автоматический логин после регистрации
            $_SESSION['user_id'] = $db->lastInsertId();
            header('Location: ' . site_url('index.php'));
            exit;
        }
    }
}

require_once __DIR__ . '/includes/header.php';
?>

<!-- Переиспользуем стили из логина -->
<style>
.auth-container { min-height: 80vh; display: flex; align-items: center; justify-content: center; padding: 100px 20px 40px; }
.auth-box { background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); width: 100%; max-width: 500px; text-align: center; }
.auth-box h1 { margin-bottom: 20px; font-size: 28px; }
.auth-form .form-group { margin-bottom: 20px; text-align: left; }
.auth-form label { display: block; font-weight: 600; margin-bottom: 8px; }
.auth-form input { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 16px; box-sizing: border-box; }
.auth-btn { width: 100%; padding: 15px; background: #2979ff; color: white; border: none; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; transition: background 0.3s; }
.auth-btn:hover { background: #1565c0; }
.auth-links { margin-top: 20px; font-size: 14px; }
.auth-links a { color: #2979ff; text-decoration: none; }
.error-msg { background: #fee; color: #c00; padding: 10px; border-radius: 5px; margin-bottom: 20px; }
.row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
</style>

<div class="auth-container">
    <div class="auth-box">
        <h1>Регистрация</h1>
        
        <?php if ($error): ?>
            <div class="error-msg"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form class="auth-form" method="POST" action="">
            <div class="row-2">
                <div class="form-group">
                    <label>Имя:</label>
                    <input type="text" name="first_name" placeholder="Иван">
                </div>
                <div class="form-group">
                    <label>Фамилия:</label>
                    <input type="text" name="last_name" placeholder="Иванов">
                </div>
            </div>
            
            <div class="form-group">
                <label>Email *:</label>
                <input type="email" name="email" required placeholder="example@mail.ru">
            </div>
            
            <div class="form-group">
                <label>Телефон:</label>
                <input type="tel" name="phone" placeholder="+7 (999) 000-00-00">
            </div>
            
            <div class="form-group">
                <label>Пароль *:</label>
                <input type="password" name="password" required placeholder="Придумайте пароль">
            </div>
            
            <button type="submit" class="auth-btn">Зарегистрироваться</button>
        </form>
        <div class="auth-links">
            <p>Уже есть аккаунт? <a href="<?= site_url('login.php') ?>">Войти</a></p>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
