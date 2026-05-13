<?php
require_once __DIR__ . '/init.php';

$db = Database::getInstance();
// Получаем продукты для батутного парка (категория 1 - батуты)
$stmt = $db->prepare('SELECT * FROM products WHERE category_id = 1 AND is_active = 1 LIMIT 6');
$stmt->execute();
$products = $stmt->fetchAll();

require_once __DIR__ . '/includes/header.php';
?>

<link rel="stylesheet" href="<?= site_url('public/css/locations.css') ?>">

<style>
.location-page { 
    padding-top: 0; 
    min-height: 80vh; 
}
.trampoline-hero {
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= site_url("public/батутка.jpg") ?>');
}
</style>

<div class="location-page">
    <div class="location-hero trampoline-hero">
        <div class="hero-content">
            <h1>🎢 Батутный парк</h1>
            <p>Незабываемые эмоции для всей семьи! Более 2000 м² прыжковой зоны с профессиональным оборудованием</p>
        </div>
    </div>

    <div class="location-content">
        <h2 class="section-title" style="font-size: 32px; color: #333; margin-bottom: 30px; text-align: center;">Что вас ждёт</h2>
        <div class="services-grid" style="margin-bottom: 50px;">
            <div class="service-card">
                <div class="card-image" style="background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; font-size: 80px;">🏀</div>
                <div class="card-content">
                    <h3>Баскетбольные кольца</h3>
                    <p>Забрось мяч в кольцо во время прыжка и почувствуй себя профессионалом</p>
                </div>
            </div>
            <div class="service-card">
                <div class="card-image" style="background-image: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); display: flex; align-items: center; justify-content: center; font-size: 80px;">🤸</div>
                <div class="card-content">
                    <h3>Поролоновая яма</h3>
                    <p>Безопасное приземление после сложных трюков и сальто</p>
                </div>
            </div>
            <div class="service-card">
                <div class="card-image" style="background-image: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); display: flex; align-items: center; justify-content: center; font-size: 80px;">🎯</div>
                <div class="card-content">
                    <h3>Ниндзя-паркур</h3>
                    <p>Преодолей полосу препятствий и проверь свою ловкость</p>
                </div>
            </div>
            <div class="service-card">
                <div class="card-image" style="background-image: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); display: flex; align-items: center; justify-content: center; font-size: 80px;">👶</div>
                <div class="card-content">
                    <h3>Детская зона</h3>
                    <p>Специальная безопасная зона для детей от 3 до 7 лет</p>
                </div>
            </div>
        </div>

        <?php if(!empty($products)): ?>
        <div class="products-section" style="margin-top: 50px;">
            <h2 class="section-title" style="font-size: 32px; color: #333; margin-bottom: 30px; text-align: center;">Абонементы и услуги</h2>
            <div class="services-grid">
                <?php foreach($products as $product): ?>
                    <div class="service-card">
                        <div class="card-image" style="background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; font-size: 80px; position: relative;">
                            🎫
                            <span class="card-badge">Хит!</span>
                        </div>
                        <div class="card-content">
                            <h3><?= htmlspecialchars($product['name']) ?></h3>
                            <p><?= htmlspecialchars($product['description'] ?: 'Отличный выбор для активного отдыха!') ?></p>
                            <span class="price-tag"><?= number_format($product['price'], 0, '', ' ') ?> ₽</span>
                            <form action="<?= site_url('cart_action.php') ?>" method="POST" style="margin:0;">
                                <input type="hidden" name="action" value="add">
                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                <button type="submit" class="btn-add-cart">В корзину</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="cta-section" style="text-align: center; padding: 60px 20px; background: #f8f9fa; margin-top: 50px; border-radius: 15px;">
            <h2 style="font-size: 28px; margin-bottom: 15px; color: #2c3e50;">Готовы к прыжкам?</h2>
            <p style="color: #666; font-size: 16px; margin-bottom: 25px;">Приходите сами или берите друзей — будет весело!</p>
            <a href="<?= site_url('contacts.php') ?>" class="btn-add-cart" style="display: inline-block; width: auto; padding: 15px 40px;">Узнать адрес</a>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
