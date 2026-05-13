<?php
require_once __DIR__ . '/init.php';
$pageTitle = 'Главная';
require_once __DIR__ . '/includes/header.php';
?>

<section class="hero">
    <div class="container">
        <h1>Добро пожаловать в Ярко Парк!</h1>
        <p>Три уникальные локации для активного отдыха всей семьи. Выберите свое приключение!</p>
        <a href="#locations" class="btn btn-primary">Выбрать локацию</a>
    </div>
</section>

<section id="locations" class="container">
    <h2 class="section-title">Наши локации</h2>
    <div class="locations-grid">
        <div class="location-card fade-in">
            <img src="https://images.unsplash.com/photo-1596700095087-d324e0a7e5f9?w=600&h=400&fit=crop" alt="Батутный парк" class="location-image">
            <div class="location-content">
                <h3><i class="fas fa-person-jumping"></i> Батутный парк</h3>
                <p>Более 50 батутов, поролоновая яма, скалодром и зона для самых маленьких. Незабываемые эмоции для детей и взрослых!</p>
                <div class="location-footer">
                    <span class="price-tag">от 400 ₽</span>
                    <a href="<?= site_url('trampoline-park.php') ?>" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
        </div>

        <div class="location-card fade-in">
            <img src="https://images.unsplash.com/photo-1551698618-1dfe5d97d256?w=600&h=400&fit=crop" alt="Горнолыжный склон" class="location-image">
            <div class="location-content">
                <h3><i class="fas fa-mountain"></i> Горнолыжный склон</h3>
                <p>Круглогодичный склон с искусственным снегом. Трассы для новичков и профессионалов, прокат оборудования.</p>
                <div class="location-footer">
                    <span class="price-tag">от 200 ₽</span>
                    <a href="<?= site_url('ski-slope.php') ?>" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
        </div>

        <div class="location-card fade-in">
            <img src="https://images.unsplash.com/photo-1530915512336-36988ea5c616?w=600&h=400&fit=crop" alt="Вейкбординг" class="location-image">
            <div class="location-content">
                <h3><i class="fas fa-water"></i> Вейкбординг</h3>
                <p>Экстремальный вейкбординг на современном оборудовании. Трассы различной сложности для всех уровней.</p>
                <div class="location-footer">
                    <span class="price-tag">от 400 ₽</span>
                    <a href="<?= site_url('wakeboarding.php') ?>" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container" style="padding: 4rem 20px; text-align: center;">
    <h2 class="section-title">Почему выбирают нас</h2>
    <div class="locations-grid">
        <div class="fade-in">
            <i class="fas fa-shield-alt" style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;"></i>
            <h3 style="margin-bottom: 0.5rem;">Безопасность</h3>
            <p style="color: #666;">Профессиональное оборудование и инструктаж перед каждым занятием</p>
        </div>
        <div class="fade-in">
            <i class="fas fa-users" style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;"></i>
            <h3 style="margin-bottom: 0.5rem;">Для всех возрастов</h3>
            <p style="color: #666;">Развлечения для детей от 3 лет и взрослых любого возраста</p>
        </div>
        <div class="fade-in">
            <i class="fas fa-ticket-alt" style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;"></i>
            <h3 style="margin-bottom: 0.5rem;">Выгодные цены</h3>
            <p style="color: #666;">Скидки, абонементы и акции для постоянных клиентов</p>
        </div>
    </div>
</section>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
