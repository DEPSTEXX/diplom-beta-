<?php
require_once __DIR__ . '/init.php';

$db = Database::getInstance();
$cart = $_SESSION['cart'] ?? [];
$cartItems = [];
$totalAmount = 0;

if (!empty($cart)) {
    // Получаем данные продуктов по ID из корзины
    $ids = implode(',', array_map('intval', array_keys($cart)));
    $stmt = $db->query("SELECT * FROM products WHERE id IN ($ids)");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($products as $product) {
        $qty = $cart[$product['id']];
        $subtotal = $product['price'] * $qty;
        $totalAmount += $subtotal;
        
        $product['qty'] = $qty;
        $product['subtotal'] = $subtotal;
        $cartItems[] = $product;
    }
}

// Оформление заказа
$orderSuccess = false;
$orderError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    if (!isLoggedIn()) {
        header('Location: ' . site_url('login.php?redirect=cart'));
        exit;
    }
    
    if (empty($cartItems)) {
        $orderError = 'Корзина пуста';
    } else {
        try {
            $db->beginTransaction();
            
            // Создаем заказ (status pending по умолчанию)
            $stmt = $db->prepare('INSERT INTO orders (user_id, total_amount) VALUES (?, ?)');
            $stmt->execute([getCurrentUserId(), $totalAmount]);
            $orderId = $db->lastInsertId();
            
            // Добавляем товары заказа
            $stmtItem = $db->prepare('INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)');
            foreach ($cartItems as $item) {
                $stmtItem->execute([$orderId, $item['id'], $item['qty'], $item['price']]);
            }
            
            $db->commit();
            
            // Очищаем корзину
            $_SESSION['cart'] = [];
            $cartItems = [];
            $totalAmount = 0;
            $orderSuccess = true;
            
        } catch (Exception $e) {
            $db->rollBack();
            $orderError = 'Ошибка при оформлении заказа: ' . $e->getMessage();
        }
    }
}

require_once __DIR__ . '/includes/header.php';
?>

<style>
.cart-page { padding: 120px 20px 60px; min-height: 80vh; background: #f9f9f9; }
.container { max-width: 1000px; margin: 0 auto; background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
.page-title { margin-bottom: 30px; font-size: 32px; border-bottom: 2px solid #eee; padding-bottom: 20px;}
.cart-table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
.cart-table th, .cart-table td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; }
.cart-table th { background: #f4f4f4; }
.remove-btn { color: crimson; text-decoration: none; font-weight: bold; font-size: 14px; }
.remove-btn:hover { text-decoration: underline; }
.cart-summary { display: flex; justify-content: flex-end; align-items: center; border-top: 2px solid #eee; padding-top: 20px; font-size: 24px; font-weight: bold; }
.checkout-btn { background: #2e7d32; color: white; padding: 15px 30px; border: none; border-radius: 8px; font-size: 18px; font-weight: bold; cursor: pointer; text-decoration: none; margin-left: 20px; transition: background 0.3s; }
.checkout-btn:hover { background: #1b5e20; }
.alert-success { background: #e8f5e9; color: #2e7d32; padding: 20px; border-radius: 8px; margin-bottom: 20px; font-weight: bold; }
.alert-error { background: #ffebee; color: #c62828; padding: 20px; border-radius: 8px; margin-bottom: 20px; font-weight: bold; }
</style>

<div class="cart-page">
    <div class="container">
        <h1 class="page-title">Корзина</h1>
        
        <?php if ($orderSuccess): ?>
            <div class="alert-success">Заказ успешно оформлен! Наш менеджер свяжется с вами.</div>
        <?php endif; ?>
        
        <?php if ($orderError): ?>
            <div class="alert-error"><?= htmlspecialchars($orderError) ?></div>
        <?php endif; ?>

        <?php if (empty($cartItems) && !$orderSuccess): ?>
            <p style="font-size: 18px; color: #666;">Ваша корзина пуста.</p>
            <br>
            <a href="<?= site_url('prices.php') ?>" style="color:#2979ff; font-weight:bold; text-decoration:none;">&larr; Вернуться к услугам</a>
        <?php elseif(empty($cartItems) && $orderSuccess): ?>
            <!-- Заказ оформлен, корзина пуста, просто показываем кнопку назад -->
             <a href="<?= site_url('prices.php') ?>" style="color:#2979ff; font-weight:bold; text-decoration:none;">&larr; Назад к прайсу</a>
        <?php else: ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Услуга/Товар</th>
                        <th>Цена</th>
                        <th>Кол-во</th>
                        <th>Сумма</th>
                        <th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($cartItems as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['name']) ?></td>
                            <td><?= number_format($item['price'], 0, '', ' ') ?> ₽</td>
                            <td><?= $item['qty'] ?></td>
                            <td style="font-weight:bold;"><?= number_format($item['subtotal'], 0, '', ' ') ?> ₽</td>
                            <td>
                                <form action="cart_action.php" method="POST" style="margin:0;">
                                    <input type="hidden" name="action" value="remove">
                                    <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                    <button type="submit" style="background:none; border:none; cursor:pointer;" class="remove-btn">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <div class="cart-summary">
                <span>Итого: <span style="color:#2979ff;"><?= number_format($totalAmount, 0, '', ' ') ?> ₽</span></span>
                <form action="" method="POST" style="margin:0;">
                    <input type="hidden" name="checkout" value="1">
                    <button type="submit" class="checkout-btn"><?= isLoggedIn() ? 'Оформить заказ' : 'Войти для оформления' ?></button>
                </form>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
