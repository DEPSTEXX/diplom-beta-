<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ярко Парк</title>
    <link rel="stylesheet" href="<?= site_url('public/css/style.css') ?>">
</head>
<body>
    <header class="home-header">
      <a href="<?= site_url() ?>" class="logo">
        <span class="logo-text">Ярко Парк</span>
      </a>
      <div class="nav-links">
          <a href="<?= site_url('contacts.php') ?>">Контакты</a>
          <a href="<?= site_url('prices.php') ?>">Прайс</a>
          <a href="<?= site_url('cart.php') ?>">Корзина <?php
          $cartCount = array_sum($_SESSION['cart'] ?? []);
          if ($cartCount > 0) echo "<span style='background: crimson; color: white; border-radius: 50%; padding: 2px 6px; font-size: 12px;'>$cartCount</span>";
          ?></a>
      </div>
      <?php if (isLoggedIn()): ?>
          <a href="<?= site_url('profile.php') ?>" class="login-btn" style="background: white; color: black;">Профиль</a>
      <?php else: ?>
          <a href="<?= site_url('login.php') ?>" class="login-btn">Войти</a>
      <?php endif; ?>
    </header>
