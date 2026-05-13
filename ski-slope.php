<?php
require_once __DIR__ . '/init.php';

$db = Database::getInstance();
// Получаем продукты для горнолыжного склона (категория 2 - горнолыжка)
$stmt = $db->prepare('SELECT * FROM products WHERE category_id = 2 AND is_active = 1 LIMIT 6');
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
.ski-hero {
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= site_url("public/горнолыжка.jpg") ?>');
}
</style>

<div class="location-page">
    <div class="location-hero ski-hero">
        <div class="hero-content">
            <h1>⛷️ Горнолыжный склон</h1>
            <p>Профессиональные трассы для новичков и опытных лыжников! Современное оборудование и живописные виды</p>
        </div>
    </div>

    <div class="location-content">
        <h2 class="section-title" style="font-size: 32px; color: #333; margin-bottom: 30px; text-align: center;">Особенности склона</h2>
        <div class="services-grid" style="margin-bottom: 50px;">
            <div class="service-card">
                <div class="card-image" style="background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; font-size: 80px;">🎿</div>
                <div class="card-content">
                    <h3>Трассы для всех</h3>
                    <p>От зеленых учебных до черных экстремальных — найди свой уровень</p>
                </div>
            </div>
            <div class="service-card">
                <div class="card-image" style="background-image: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); display: flex; align-items: center; justify-content: center; font-size: 80px;">🚡</div>
                <div class="card-content">
                    <h3>Подъемники</h3>
                    <p>Современные кресельные подъемники с подогревом сидений</p>
                </div>
            </div>
            <div class="service-card">
                <div class="card-image" style="background-image: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); display: flex; align-items: center; justify-content: center; font-size: 80px;">🏂</div>
                <div class="card-content">
                    <h3>Сноуборд-парк</h3>
                    <p>Рейлы, трамплины и другие фигуры для фристайла</p>
                </div>
            </div>
            <div class="service-card">
                <div class="card-image" style="background-image: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); display: flex; align-items: center; justify-content: center; font-size: 80px;">👨‍🏫</div>
                <div class="card-content">
                    <h3>Инструкторы</h3>
                    <p>Профессиональное обучение для детей и взрослых</p>
                </div>
            </div>
        </div>

        <?php if(!empty($products)): ?>
        <div class="products-section" style="margin-top: 50px;">
            <h2 class="section-title" style="font-size: 32px; color: #333; margin-bottom: 30px; text-align: center;">Абонементы и прокат</h2>
            <div class="services-grid">
                <?php foreach($products as $product): ?>
                    <div class="service-card">
                        <div class="card-image" style="background-image: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); display: flex; align-items: center; justify-content: center; font-size: 80px; position: relative;">
                            🎫
                            <span class="card-badge">Популярное!</span>
                        </div>
                        <div class="card-content">
                            <h3><?= htmlspecialchars($product['name']) ?></h3>
                            <p><?= htmlspecialchars($product['description'] ?: 'Отличный выбор для зимнего отдыха!') ?></p>
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
            <h2 style="font-size: 28px; margin-bottom: 15px; color: #2c3e50;">Готовы покорить вершины?</h2>
            <p style="color: #666; font-size: 16px; margin-bottom: 25px;">Ждем вас на наших склонах каждый день с 9:00 до 22:00</p>
            <a href="<?= site_url('contacts.php') ?>" class="btn-add-cart" style="display: inline-block; width: auto; padding: 15px 40px;">Узнать адрес</a>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
