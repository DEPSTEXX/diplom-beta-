<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$config = require __DIR__ . '/../config/database.php';

try {
    $pdo = new PDO(
        sprintf('mysql:host=%s;port=%s;dbname=%s;charset=%s', $config['host'], $config['port'], $config['database'], $config['charset']),
        $config['username'],
        $config['password'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    // Insert locations
    $pdo->exec("INSERT INTO locations (name, slug, description, address, phone, image_url, is_active) VALUES
        ('Батутный парк', 'trampoline-park', 'Современный батутный парк с зонами для детей и взрослых', 'ул. Спортивная, 1', '+7-999-111-22-33', '/images/trampoline.jpg', 1),
        ('Горнолыжный склон', 'ski-slope', 'Искусственный горнолыжный склон для катания круглый год', 'ул. Горная, 5', '+7-999-222-33-44', '/images/ski.jpg', 1),
        ('Вейкбординг', 'wakeboarding', 'Катание на вейкборде с лодкой и катамаранами', 'озеро Спортивное', '+7-999-333-44-55', '/images/wakeboarding.jpg', 1)");

    // Insert admin user
    $passwordHash = password_hash('admin123', PASSWORD_DEFAULT);
    $pdo->exec("INSERT INTO users (email, password_hash, first_name, last_name, phone, role) VALUES
        ('admin@yarko-park.ru', '$passwordHash', 'Админ', 'Админов', '+7-999-000-00-00', 'admin')");

    // Insert test customer
    $customerHash = password_hash('test123', PASSWORD_DEFAULT);
    $pdo->exec("INSERT INTO users (email, password_hash, first_name, last_name, phone, role) VALUES
        ('test@test.ru', '$customerHash', 'Тест', 'Тестов', '+7-999-111-11-11', 'customer')");

    // Insert categories for each location
    $pdo->exec("INSERT INTO categories (name, slug, description, location_id, is_active) VALUES
        ('Батуты', 'trampolines', 'Прыжки на батаутах', 1, 1),
        ('Ниндзя-парк', 'ninja-park', 'Полоса препятствий', 1, 1),
        ('Горные лыжи', 'downhill-ski', 'Катание на горных лыжах', 2, 1),
        ('Сноуборд', 'snowboard', 'Катание на сноуборде', 2, 1),
        ('Вейкбординг', 'wakeboard', 'Катание на вейкборде', 3, 1),
        ('Катамараны', 'catamarans', 'Прогулка на катамаранах', 3, 1)");

    // Insert products
    $pdo->exec("INSERT INTO products (name, slug, description, price, category_id, location_id, duration_minutes, is_active, stock) VALUES
        ('Час прыжков', 'hour-jumps', 'Безлимитные прыжки на батутах в течение часа', 800.00, 1, 1, 60, 1, 100),
        ('2 часа прыжков', 'two-hours-jumps', 'Безлимитные прыжки на батутах в течение 2 часов', 1400.00, 1, 1, 120, 1, 100),
        ('Ниндзя-полоса', 'ninja-track', 'Прохождение полосы препятствий', 500.00, 2, 1, 30, 1, 50),
        ('Спуск на лыжах', 'ski-descent', 'Спуск с искусственного склона на лыжах', 1200.00, 3, 2, 120, 1, 30),
        ('Спуск на сноуборде', 'snowboard-descent', 'Спуск с искусственного склона на сноуборде', 1200.00, 4, 2, 120, 1, 30),
        ('Урок вейкбординга', 'wakeboarding-lesson', 'Урок катания на вейкборде с инструктором', 2500.00, 5, 3, 60, 1, 20),
        ('Прогулка на катамаране', 'catamaran-ride', 'Прогулка на катамаране по озеру', 600.00, 6, 3, 30, 1, 15)");

    // Insert promotions
    $pdo->exec("INSERT INTO promotions (title, description, location_id, start_date, end_date, is_active) VALUES
        ('Скидка 20% на батуты', 'Специальное предложение - скидка 20% на все прыжки!', 1, '2026-01-01', '2026-12-31', 1),
        ('Абонемент на месяц', 'Безлимитное катание на склоне за 5000 рублей', 2, '2026-01-01', '2026-12-31', 1)");

    // Insert certificates
    $pdo->exec("INSERT INTO certificates (name, description, price, location_id, is_active) VALUES
        ('Подарочный сертификат 1000', 'Сертификат на 1000 рублей на любые услуги', 1000.00, NULL, 1),
        ('Подарочный сертификат 2000', 'Сертификат на 2000 рублей на любые услуги', 2000.00, NULL, 1),
        ('Сертификат на батуты', 'Сертификат на час прыжков', 800.00, 1, 1)");

    // Insert time slots
    $pdo->exec("INSERT INTO time_slots (location_id, start_time, end_time, max_capacity, is_available) VALUES
        (1, '10:00:00', '11:00:00', 20, 1),
        (1, '11:00:00', '12:00:00', 20, 1),
        (1, '12:00:00', '13:00:00', 20, 1),
        (1, '14:00:00', '15:00:00', 20, 1),
        (1, '15:00:00', '16:00:00', 20, 1),
        (1, '16:00:00', '17:00:00', 20, 1),
        (2, '10:00:00', '12:00:00', 15, 1),
        (2, '12:00:00', '14:00:00', 15, 1),
        (2, '14:00:00', '16:00:00', 15, 1),
        (2, '16:00:00', '18:00:00', 15, 1),
        (3, '09:00:00', '10:00:00', 10, 1),
        (3, '10:00:00', '11:00:00', 10, 1),
        (3, '11:00:00', '12:00:00', 10, 1),
        (3, '14:00:00', '15:00:00', 10, 1),
        (3, '15:00:00', '16:00:00', 10, 1)");

    echo "Seed data inserted successfully!\n";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}