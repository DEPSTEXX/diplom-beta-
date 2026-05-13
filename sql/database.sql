-- Дамп базы данных для проекта "Ярко Парк"
-- Создание базы данных и таблиц

CREATE DATABASE IF NOT EXISTS yarko_park CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE yarko_park;

-- Таблица пользователей
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Таблица локаций
CREATE TABLE IF NOT EXISTS locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(100) UNIQUE NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Таблица категорий
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    location_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    sort_order INT DEFAULT 0,
    FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Таблица товаров/услуг
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    old_price DECIMAL(10, 2),
    image_url VARCHAR(255),
    duration_minutes INT,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Таблица временных слотов для бронирования
CREATE TABLE IF NOT EXISTS time_slots (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    slot_date DATE NOT NULL,
    slot_time TIME NOT NULL,
    capacity INT DEFAULT 10,
    booked INT DEFAULT 0,
    is_available BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    UNIQUE KEY unique_slot (product_id, slot_date, slot_time)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Таблица заказов
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    total_amount DECIMAL(10, 2) NOT NULL,
    status ENUM('pending', 'confirmed', 'paid', 'cancelled', 'completed') DEFAULT 'pending',
    payment_method ENUM('cash', 'card', 'online') DEFAULT 'cash',
    customer_name VARCHAR(255) NOT NULL,
    customer_email VARCHAR(255),
    customer_phone VARCHAR(20),
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Таблица элементов заказа
CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    price DECIMAL(10, 2) NOT NULL,
    slot_id INT,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE RESTRICT,
    FOREIGN KEY (slot_id) REFERENCES time_slots(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Таблица бронирований
CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT NOT NULL,
    slot_id INT NOT NULL,
    status ENUM('pending', 'confirmed', 'cancelled') DEFAULT 'pending',
    participants_count INT DEFAULT 1,
    total_price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    FOREIGN KEY (slot_id) REFERENCES time_slots(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Таблица акций и промокодов
CREATE TABLE IF NOT EXISTS promotions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    discount_percent INT DEFAULT 0,
    discount_fixed DECIMAL(10, 2),
    promo_code VARCHAR(50) UNIQUE,
    valid_from DATE,
    valid_until DATE,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Таблица сертификатов
CREATE TABLE IF NOT EXISTS certificates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    certificate_number VARCHAR(50) UNIQUE NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    purchaser_name VARCHAR(255) NOT NULL,
    purchaser_email VARCHAR(255),
    recipient_name VARCHAR(255),
    status ENUM('active', 'used', 'expired') DEFAULT 'active',
    valid_until DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Заполнение тестовыми данными

-- Пользователи (пароли хешированы: admin123 и test123)
INSERT INTO users (email, password, full_name, phone, role) VALUES
('admin@yarko-park.ru', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Администратор', '+7 (999) 000-00-00', 'admin'),
('test@test.ru', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Тестовый пользователь', '+7 (999) 111-11-11', 'user');

-- Локации
INSERT INTO locations (name, slug, description, image_url) VALUES
('Батутный парк', 'trampoline-park', 'Лучший батутный парк в городе! Более 50 батутов, поролоновая яма, скалодром и зона для самых маленьких.', '/assets/images/locations/trampoline.jpg'),
('Горнолыжный склон', 'ski-slope', 'Круглогодичный горнолыжный склон с искусственным снегом. Трассы для новичков и профессионалов.', '/assets/images/locations/ski.jpg'),
('Вейкбординг', 'wakeboarding', 'Экстремальный вейкбординг на современном оборудовании. Трассы различной сложности для всех уровней подготовки.', '/assets/images/locations/wake.jpg');

-- Категории
INSERT INTO categories (location_id, name, description, sort_order) VALUES
(1, 'Разовые посещения', 'Одноразовые билеты в батутный парк', 1),
(1, 'Абонементы', 'Выгодные абонементы на multiple посещений', 2),
(1, 'Детские праздники', 'Организация дней рождений и мероприятий', 3),
(2, 'Прокат оборудования', 'Лыжи, сноуборды, защита', 1),
(2, 'Подъемники', 'Билеты на подъемник', 2),
(2, 'Инструкторы', 'Занятия с инструктором', 3),
(3, 'Прокат снаряжения', 'Вейкборды, гидрокостюмы, жилеты', 1),
(3, 'Катание', 'Сеансы катания на вейкборде', 2),
(3, 'Обучение', 'Курсы обучения вейкбордингу', 3);

-- Товары
INSERT INTO products (category_id, name, description, price, old_price, duration_minutes, is_active) VALUES
(1, 'Взрослый билет', 'Безлимитное посещение батутного парка для взрослых (от 16 лет)', 800.00, 1000.00, 60, TRUE),
(1, 'Детский билет', 'Безлимитное посещение для детей от 6 до 15 лет', 600.00, 750.00, 60, TRUE),
(1, 'Малыш', 'Посещение для детей до 6 лет в сопровождении взрослого', 400.00, NULL, 45, TRUE),
(2, 'Абонемент "5 посещений"', '5 посещений батутного парка в любое время', 3500.00, 4000.00, NULL, TRUE),
(2, 'Абонемент "10 посещений"', '10 посещений с большой скидкой', 6500.00, 8000.00, NULL, TRUE),
(2, 'Безлимит на месяц', 'Неограниченное посещение в течение 30 дней', 12000.00, 15000.00, NULL, TRUE),
(3, 'День рождения', 'Празднование дня рождения (до 10 детей + 2 аниматора)', 15000.00, NULL, 180, TRUE),
(4, 'Комплект "Лыжи+"', 'Лыжи, ботинки, палки + защита', 500.00, NULL, NULL, TRUE),
(4, 'Комплект "Сноуборд+"', 'Сноуборд, ботинки + защита', 600.00, NULL, NULL, TRUE),
(5, 'Подъемник (взрослый)', 'Однократный подъем для взрослых', 300.00, NULL, NULL, TRUE),
(5, 'Подъемник (детский)', 'Однократный подъем для детей', 200.00, NULL, NULL, TRUE),
(5, 'Дневной ски-пасс', 'Безлимитные подъемы на весь день', 2000.00, 2500.00, NULL, TRUE),
(6, 'Групповое занятие', 'Занятие в группе до 5 человек (60 мин)', 1500.00, NULL, 60, TRUE),
(6, 'Индивидуальное занятие', 'Персональное занятие с инструктором (60 мин)', 3000.00, NULL, 60, TRUE),
(7, 'Вейкборд + жилет', 'Прокат вейкборда и спасательного жилета', 400.00, NULL, NULL, TRUE),
(7, 'Гидрокостюм', 'Прокат гидрокостюма (сезонно)', 200.00, NULL, NULL, TRUE),
(8, 'Сеанс 30 минут', '30 минут катания на вейкборде', 800.00, NULL, 30, TRUE),
(8, 'Сеанс 60 минут', '60 минут катания на вейкборде', 1400.00, 1600.00, 60, TRUE),
(8, 'Групповой сеанс', 'Групповое катание до 4 человек (60 мин)', 2000.00, NULL, 60, TRUE),
(9, 'Базовый курс', 'Курс из 4 занятий для начинающих', 8000.00, 10000.00, 240, TRUE),
(9, 'Продвинутый уровень', 'Курс для опытных райдеров (4 занятия)', 10000.00, NULL, 240, TRUE);

-- Акции
INSERT INTO promotions (name, description, discount_percent, promo_code, valid_from, valid_until, is_active) VALUES
('Первое посещение', 'Скидка 20% на первое посещение любой локации', 20, 'FIRST20', CURDATE(), DATE_ADD(CURDATE(), INTERVAL 3 MONTH), TRUE),
('Студенческая скидка', 'Скидка 15% для студентов при предъявлении билета', 15, 'STUDENT15', CURDATE(), DATE_ADD(CURDATE(), INTERVAL 6 MONTH), TRUE),
('День рождения', 'Скидка 30% именинникам в день рождения', 30, 'BDAY30', CURDATE(), DATE_ADD(CURDATE(), INTERVAL 1 YEAR), TRUE);
