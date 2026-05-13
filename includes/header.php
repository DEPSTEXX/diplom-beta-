<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Ярко Парк' ?> - Парк развлечений</title>
    <link rel="stylesheet" href="<?= site_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="container header-content">
            <a href="<?= site_url() ?>" class="logo">
                <i class="fas fa-star"></i>
                <span class="logo-text">Ярко Парк</span>
            </a>
            <nav>
                <ul>
                    <li><a href="<?= site_url() ?>">Главная</a></li>
                    <li><a href="<?= site_url('trampoline-park.php') ?>">Батуты</a></li>
                    <li><a href="<?= site_url('ski-slope.php') ?>">Горнолыжка</a></li>
                    <li><a href="<?= site_url('wakeboarding.php') ?>">Вейкбординг</a></li>
                    <li><a href="<?= site_url('prices.php') ?>">Цены</a></li>
                    <li><a href="<?= site_url('contacts.php') ?>">Контакты</a></li>
                </ul>
            </nav>
            <div class="header-actions">
                <a href="<?= site_url('cart.php') ?>" class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                    <?php
                    $cartCount = array_sum($_SESSION['cart'] ?? []);
                    if ($cartCount > 0): ?>
                        <span class="cart-badge"><?= $cartCount ?></span>
                    <?php endif; ?>
                </a>
                <?php if (isLoggedIn()): ?>
                    <a href="<?= site_url('profile.php') ?>" class="user-menu">
                        <i class="fas fa-user-circle"></i>
                        <span><?= htmlspecialchars($_SESSION['user_name'] ?? 'Профиль') ?></span>
                    </a>
                <?php else: ?>
                    <a href="<?= site_url('login.php') ?>" class="btn btn-primary">Войти</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
