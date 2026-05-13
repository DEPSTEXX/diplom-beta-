<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/includes/header.php';
?>

<link rel="stylesheet" href="<?= site_url('public/css/style.css') ?>">
<link rel="stylesheet" href="<?= site_url('public/css/service.css') ?>">

<div class="page-container">
    <div class="service-page">
        <div class="service-header">
            <h1>Вейкбординг</h1>
            <p class="service-subtitle">Катание на кабельной системе</p>
        </div>

        <div class="service-gallery">
            <div class="gallery-item">
                <img src="<?= site_url('public/вейкбординг.jpg') ?>" alt="Вейкбординг" class="gallery-image">
                <div class="gallery-overlay">
                    <h3>Кабельная система</h3>
                    <p>Современное оборудование для катания</p>
                </div>
            </div>
        </div>

        <div class="service-features">
            <div class="feature-grid">
                <div class="feature-item">
                    <h3>Кабельная система</h3>
                    <p>Современная система для комфортного катания</p>
                </div>
                <div class="feature-item">
                    <h3>Искусственный водоем</h3>
                    <p>Специально оборудованная зона</p>
                </div>
                <div class="feature-item">
                    <h3>Инструкторы</h3>
                    <p>Профессиональное обучение с нуля</p>
                </div>
                <div class="feature-item">
                    <h3>Все снаряжение</h3>
                    <p>Доска, шлем, спасательный жилет</p>
                </div>
            </div>
        </div>

        <div class="service-pricing">
            <h2>Цены и услуги</h2>
            <div class="price-grid">
                <div class="price-card">
                    <h3>1 час</h3>
                    <div class="price-value">2500 ₽</div>
                    <p>Базовый тариф</p>
                    <form action="cart_action.php" method="POST">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="product_id" value="7">
                        <button type="submit" class="buy-btn">В корзину</button>
                    </form>
                </div>
                <div class="price-card">
                    <h3>2 часа</h3>
                    <div class="price-value">4500 ₽</div>
                    <p>Экономия 500 ₽</p>
                    <form action="cart_action.php" method="POST">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="product_id" value="8">
                        <button type="submit" class="buy-btn">В корзину</button>
                    </form>
                </div>
                <div class="price-card">
                    <h3>С инструктором</h3>
                    <div class="price-value">3500 ₽</div>
                    <p>1 час + тренер</p>
                    <form action="cart_action.php" method="POST">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="product_id" value="9">
                        <button type="submit" class="buy-btn">В корзину</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="service-rules">
            <h2>Правила посещения</h2>
            <div class="rules-grid">
                <div class="rule-item">
                    <h3>🧪 Обязательно</h3>
                    <ul>
                        <li>Купальник/Спортивная одежда</li>
                        <li>Резиновые тапочки</li>
                        <li>Сменная одежда</li>
                    </ul>
                </div>
                <div class="rule-item">
                    <h3>Запрещено</h3>
                    <ul>
                        <li>Алкоголь</li>
                        <li>Опасные трюки без разрешения</li>
                        <li>Масло и кремы</li>
                    </ul>
                </div>
                <div class="rule-item">
                    <h3>Возрастные ограничения</h3>
                    <ul>
                        <li>От 8 лет с родителями</li>
                        <li>От 14 лет без сопровождения</li>
                        <li>До 8 лет - только по согласованию</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>