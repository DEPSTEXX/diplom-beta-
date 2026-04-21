<?php
require_once __DIR__ . '/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if ($action === 'add') {
        $product_id = (int)($_POST['product_id'] ?? 0);
        if ($product_id > 0) {
            $_SESSION['cart'][$product_id] = ($_SESSION['cart'][$product_id] ?? 0) + 1;
        }
    }
    
    if ($action === 'remove') {
        $product_id = (int)($_POST['product_id'] ?? 0);
        if (isset($_SESSION['cart'][$product_id])) {
            unset($_SESSION['cart'][$product_id]);
        }
    }
    
    if ($action === 'clear') {
        $_SESSION['cart'] = [];
    }
}

// Редирект в корзину или обратно
header('Location: ' . site_url('cart.php'));
exit;
