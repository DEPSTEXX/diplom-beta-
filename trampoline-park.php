<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/includes/header.php';
?>

<link rel="stylesheet" href="<?= site_url('public/css/style.css') ?>">
<link rel="stylesheet" href="<?= site_url('public/css/service.css') ?>">

<div class="page-container">
    <div class="service-page">
        <div class="service-header">
            <h1>Батутный парк</h1>
            <p class="service-subtitle">Много разных развлечений в парке</p>
        </div>

        <div class="service-gallery">
            <div class="gallery-item">
                <img src="<?= site_url('public/батутка.jpg') ?>" alt="Батутный парк" class="gallery-image">
                <div class="gallery-overlay">
                    <h3>Основная зона</h3>
                    <p>Более 20 батутов различных размеров и форм</p>
                </div>
            </div>
        </div>

        <div class="service-features">
            <div class="feature-grid">
                <div class="feature-item">
                    <div class="feature-icon">🎯</div>
                    <h3>Тренировка</h3>
                    <p>Идеально для развития координации и физической подготовки</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🎪</div>
                    <h3>Развлечение</h3>
                    <p> веселье для всей семьи и друзей</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🏃</div>
                    <h3>Аэробика</h3>
                    <p>Увлекательные тренировки на батутах</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🎭</div>
                    <h3>Шоу</h3>
                    <p>Регулярные показательные выступления</p>
                </div>
            </div>
        </div>

        <div class="service-pricing">
            <h2>Цены и услуги</h2>
            <div class="price-grid">
                <div class="price-card">
                    <h3>1 час</h3>
                    <div class="price-value">1500 ₽</div>
                    <p>Базовый тариф</p>
                    <form action="cart_action.php" method="POST">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="product_id" value="1">
                        <button type="submit" class="buy-btn">В корзину</button>
                    </form>
                </div>
                <div class="price-card">
                    <h3>2 часа</h3>
                    <div class="price-value">2500 ₽</div>
                    <p>Экономия 500 ₽</p>
                    <form action="cart_action.php" method="POST">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="product_id" value="2">
                        <button type="submit" class="buy-btn">В корзину</button>
                    </form>
                </div>
                <div class="price-card">
                    <h3>Дневной билет</h3>
                    <div class="price-value">3500 ₽</div>
                    <p>Неограниченное время</p>
                    <form action="cart_action.php" method="POST">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="product_id" value="3">
                        <button type="submit" class="buy-btn">В корзину</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="service-rules">
            <h2>Правила посещения</h2>
            <div class="rules-grid">
                <div class="rule-item">
                    <h3>🧦 Обязательно</h3>
                    <ul>
                        <li>Носки для прыжков</li>
                        <li>Сменная обувь</li>
                        <li>Документы (для взрослых)</li>
                    </ul>
                </div>
                <div class="rule-item">
                    <h3>🚫 Запрещено</h3>
                    <ul>
                        <li>Еда и напитки в зоне прыжков</li>
                        <li>Алкоголь</li>
                        <li>Опасные трюки без инструктора</li>
                    </ul>
                </div>
                <div class="rule-item">
                    <h3>👶 Возрастные ограничения</h3>
                    <ul>
                        <li>От 3 лет с родителями</li>
                        <li>От 12 лет без сопровождения</li>
                        <li>До 3 лет - только по согласованию</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>