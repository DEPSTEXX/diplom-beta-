<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/includes/header.php';
?>

<link rel="stylesheet" href="<?= site_url('public/css/style.css') ?>">
<link rel="stylesheet" href="<?= site_url('public/css/service.css') ?>">

<div class="page-container">
    <div class="service-page">
        <div class="service-header">
            <h1>Горнолыжный склон</h1>
            <p class="service-subtitle">Искусственный склон с 2 трассами</p>
        </div>

        <div class="service-gallery">
            <div class="gallery-item">
                <img src="<?= site_url('public/горнолыжка.jpg') ?>" alt="Горнолыжный склон" class="gallery-image">
                <div class="gallery-overlay">
                    <h3>Снежный склон</h3>
                    <p>Искусственный снег круглый год</p>
                </div>
            </div>
        </div>

        <div class="service-features">
            <div class="feature-grid">
                <div class="feature-item">
                    <div class="feature-icon">🎿</div>
                    <h3>2 трассы</h3>
                    <p>Легкая и сложная трассы для всех уровней</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">❄️</div>
                    <h3>Искусственный снег</h3>
                    <p>Кататься круглый год в любых погодных условиях</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🎓</div>
                    <h3>Инструкторы</h3>
                    <p>Профессиональные тренеры для начинающих</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🎿</div>
                    <h3>Оборудование</h3>
                    <p>Все снаряжение предоставляется</p>
                </div>
            </div>
        </div>

        <div class="service-pricing">
            <h2>Цены и услуги</h2>
            <div class="price-grid">
                <div class="price-card">
                    <h3>1 час</h3>
                    <div class="price-value">2000 ₽</div>
                    <p>Базовый тариф</p>
                    <form action="cart_action.php" method="POST">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="product_id" value="4">
                        <button type="submit" class="buy-btn">В корзину</button>
                    </form>
                </div>
                <div class="price-card">
                    <h3>2 часа</h3>
                    <div class="price-value">3500 ₽</div>
                    <p>Экономия 500 ₽</p>
                    <form action="cart_action.php" method="POST">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="product_id" value="5">
                        <button type="submit" class="buy-btn">В корзину</button>
                    </form>
                </div>
                <div class="price-card">
                    <h3>С инструктором</h3>
                    <div class="price-value">3000 ₽</div>
                    <p>1 час + тренер</p>
                    <form action="cart_action.php" method="POST">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="product_id" value="6">
                        <button type="submit" class="buy-btn">В корзину</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="service-rules">
            <h2>Правила посещения</h2>
            <div class="rules-grid">
                <div class="rule-item">
                    <h3>🧤 Обязательно</h3>
                    <ul>
                        <li>Спортивная одежда</li>
                        <li>Перчатки</li>
                        <li>Сменная обувь</li>
                    </ul>
                </div>
                <div class="rule-item">
                    <h3>🚫 Запрещено</h3>
                    <ul>
                        <li>Алкоголь</li>
                        <li>Опасные маневры</li>
                        <li>Движение против трассы</li>
                    </ul>
                </div>
                <div class="rule-item">
                    <h3>👶 Возрастные ограничения</h3>
                    <ul>
                        <li>От 5 лет с родителями</li>
                        <li>От 12 лет без сопровождения</li>
                        <li>До 5 лет - только по согласованию</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>