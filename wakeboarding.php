<?php
require_once __DIR__ . '/init.php';

$db = Database::getInstance();
// Получаем продукты для вейкбординга (категория 3 - вейк)
$stmt = $db->prepare('SELECT * FROM products WHERE category_id = 3 AND is_active = 1 LIMIT 6');
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
.wake-hero {
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= site_url("public/вейкбординг.jpg") ?>');
}
</style>

<div class="location-page">
    <div class="location-hero wake-hero">
        <div class="hero-content">
            <h1>🏄 Вейкбординг</h1>
            <p>Экстремальный отдых на воде! Современная канатная дорога и безопасные трассы для любого уровня</p>
        </div>
    </div>

    <div class="location-content">
        <h2 class="section-title" style="font-size: 32px; color: #333; margin-bottom: 30px; text-align: center;">Преимущества парка</h2>
        <div class="services-grid" style="margin-bottom: 50px;">
            <div class="service-card">
                <div class="card-image" style="background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; font-size: 80px;">🚡</div>
                <div class="card-content">
                    <h3>Канатная дорога</h3>
                    <p>Современная система с регулируемой скоростью для новичков и профи</p>
                </div>
            </div>
            <div class="service-card">
                <div class="card-image" style="background-image: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); display: flex; align-items: center; justify-content: center; font-size: 80px;">🏆</div>
                <div class="card-content">
                    <h3>Фигуры и трамплины</h3>
                    <p>Разнообразные препятствия для отработки трюков</p>
                </div>
            </div>
            <div class="service-card">
                <div class="card-image" style="background-image: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); display: flex; align-items: center; justify-content: center; font-size: 80px;">👨‍🏫</div>
                <div class="card-content">
                    <h3>Обучение</h3>
                    <p>Опытные инструкторы поставят на доску за одно занятие</p>
                </div>
            </div>
            <div class="service-card">
                <div class="card-image" style="background-image: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); display: flex; align-items: center; justify-content: center; font-size: 80px;">🏊</div>
                <div class="card-content">
                    <h3>Безопасность</h3>
                    <p>Спасательная команда и современное снаряжение</p>
                </div>
            </div>
        </div>

        <?php if(!empty($products)): ?>
        <div class="products-section" style="margin-top: 50px;">
            <h2 class="section-title" style="font-size: 32px; color: #333; margin-bottom: 30px; text-align: center;">Абонементы и прокат</h2>
            <div class="services-grid">
                <?php foreach($products as $product): ?>
                    <div class="service-card">
                        <div class="card-image" style="background-image: linear-gradient(135deg, #00b4db 0%, #0083b0 100%); display: flex; align-items: center; justify-content: center; font-size: 80px; position: relative;">
                            🎫
                            <span class="card-badge">Сезон!</span>
                        </div>
                        <div class="card-content">
                            <h3><?= htmlspecialchars($product['name']) ?></h3>
                            <p><?= htmlspecialchars($product['description'] ?: 'Отличный выбор для водного экстрима!') ?></p>
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
            <h2 style="font-size: 28px; margin-bottom: 15px; color: #2c3e50;">Готовы поймать волну?</h2>
            <p style="color: #666; font-size: 16px; margin-bottom: 25px;">Работаем с мая по сентябрь, ежедневно с 10:00 до 20:00</p>
            <a href="<?= site_url('contacts.php') ?>" class="btn-add-cart" style="display: inline-block; width: auto; padding: 15px 40px;">Узнать адрес</a>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
