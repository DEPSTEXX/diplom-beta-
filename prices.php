<?php
require_once __DIR__ . '/init.php';

$db = Database::getInstance();
// Сначала получаем категории (допустим, они есть, либо просто все продукты)
$stmt = $db->prepare('SELECT * FROM products WHERE is_active = 1');
$stmt->execute();
$products = $stmt->fetchAll();

require_once __DIR__ . '/includes/header.php';
?>

<style>
.prices-page { padding: 120px 20px 60px; min-height: 80vh; background: #f9f9f9; }
.container { max-width: 1200px; margin: 0 auto; }
.page-title { text-align: center; font-size: 36px; margin-bottom: 40px; text-transform: uppercase; }
.products-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 30px; }
.product-card { background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); display: flex; flex-direction: column; }
.product-img { width: 100%; height: 200px; background: #ddd; object-fit: cover; }
.product-info { padding: 20px; flex: 1; display: flex; flex-direction: column; }
.product-title { font-size: 20px; font-weight: bold; margin-bottom: 10px; }
.product-desc { color: #666; font-size: 14px; margin-bottom: 20px; flex: 1; }
.product-footer { display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #eee; padding-top: 15px; }
.product-price { font-size: 22px; font-weight: bold; color: #2979ff; }
.buy-btn { background: #2979ff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; transition: background 0.2s; border: none; cursor: pointer; }
.buy-btn:hover { background: #1565c0; }
</style>

<div class="prices-page">
    <div class="container">
        <h1 class="page-title">Услуги и Цены</h1>
        
        <?php if(empty($products)): ?>
            <p style="text-align:center;">Товары пока не добавлены.</p>
        <?php else: ?>
            <div class="products-grid">
                <?php foreach($products as $product): ?>
                    <div class="product-card">
                        <?php if($product['image_url']): ?>
                            <img src="<?= site_url($product['image_url']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="product-img">
                        <?php else: ?>
                            <div class="product-img" style="display:flex; align-items:center; justify-content:center; background:#444; color:white;">Нет фото</div>
                        <?php endif; ?>
                        
                        <div class="product-info">
                            <div class="product-title"><?= htmlspecialchars($product['name']) ?></div>
                            <div class="product-desc"><?= htmlspecialchars($product['description'] ?: 'Захватывающее времяпровождение в нашем парке.') ?></div>
                            
                            <div class="product-footer">
                                <div class="product-price"><?= number_format($product['price'], 0, '', ' ') ?> ₽</div>
                                <form action="cart_action.php" method="POST" style="margin:0;">
                                    <input type="hidden" name="action" value="add">
                                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                    <button type="submit" class="buy-btn">В корзину</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
