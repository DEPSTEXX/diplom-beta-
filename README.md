# Ярко Парк - Парк развлечений

Проект представляет собой веб-сайт парка развлечений с тремя локациями:
1. **Батутный парк** 
2. **Горнолыжный склон** 
3. **Вейк парк** 

## Структура проекта

```

### Функционал:
- Публичные страницы локаций с описанием и фото
- Прайс-лист услуг
- Корзина товаров и оформление заказов
- Регистрация и авторизация пользователей
- Личный кабинет пользователя
- Админ-панель с дашбордом
- Управление товарами, заказами и пользователями
- Rate limiting и DDoS-защита
- Ролевая модель (admin/customer)

## Структура проекта

```
yarko-park/
├── admin/              # Админ-панель (PHP)
│   ├── includes/       # Шаблоны админки
│   ├── index.php       # Дашборд
│   ├── orders.php      # Управление заказами
│   ├── products.php    # Управление товарами
│   └── users.php       # Управление пользователями
├── core/               # Ядро приложения
│   ├── Database.php    # Singleton для подключения к БД
│   ├── RateLimit.php   # Защита от DDoS
│   └── auth_helpers.php # Функции аутентификации
├── includes/           # Общие шаблоны
│   ├── ddos_block.php  # Middleware защиты
│   ├── header.php      # Шапка сайта
│   └── footer.php      # Подвал сайта
├── public/             # Статические файлы
│   └── css/            # Стили
├── cart.php            # Корзина
├── cart_action.php     # Обработка действий корзины
├── config.php          # Конфигурация БД
├── contacts.php        # Контакты
├── faq.php             # FAQ
├── index.php           # Главная страница
├── init.php            # Инициализация приложения
├── login.php           # Вход
├── prices.php          # Прайс-лист
├── privacy.php         # Политика конфиденциальности
├── profile.php         # Личный кабинет
├── register.php        # Регистрация
├── ski-slope.php       # Страница горнолыжного склона
├── trampoline-park.php # Страница батутного парка
└── wakeboarding.php    # Страница вейкбординга
```

## Технологии

- **Бэкенд**: PHP 7.4+ (чистый PHP без фреймворков)
- **База данных**: MySQL 5.7+ / MariaDB
- **Стили**: CSS3 (адаптивная вёрстка)
- **Архитектура**: MVC-подобная структура, Singleton для БД

## Быстрый старт

### 1. Требования

- PHP 7.4 или выше
- MySQL 5.7 или выше
- Веб-сервер (Apache/Nginx) или встроенный сервер PHP

### 2. Установка

```bash
# Клонируйте репозиторий
git clone <repository-url>
cd yarko-park
```

### 3. Настройка базы данных

1. Создайте базу данных:
```sql
CREATE DATABASE yarko_park CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

2. Отредактируйте файл `config.php`:
```php
<?php
return [
    'db_host' => 'localhost',
    'db_port' => '3306',
    'db_name' => 'yarko_park',
    'db_user' => 'root',      // Ваш пользователь БД
    'db_pass' => '',          // Ваш пароль БД
    'db_charset' => 'utf8mb4',
    'site_url' => 'http://localhost/yarko-park', // URL вашего сайта
];
```

### 4. Создание таблиц БД

Выполните SQL-запросы для создания структуры базы данных:

```sql
-- Таблица пользователей
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    role ENUM('admin', 'customer') DEFAULT 'customer',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Таблица категорий товаров
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Таблица товаров
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);

-- Таблица заказов
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    total_amount DECIMAL(10, 2) NOT NULL,
    status ENUM('pending', 'paid', 'completed', 'cancelled') DEFAULT 'pending',
    customer_name VARCHAR(255),
    customer_phone VARCHAR(20),
    customer_email VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Таблица элементов заказа
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT,
    product_name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE SET NULL
);

-- Таблица посещений для rate limiting
CREATE TABLE rate_limits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ip_address VARCHAR(45) NOT NULL,
    request_count INT DEFAULT 1,
    last_request TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY unique_ip (ip_address)
);
```

### 5. Заполнение тестовыми данными

```sql
-- Администратор (пароль: admin123)
INSERT INTO users (email, password, name, role) VALUES
('admin@yarko-park.ru', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Администратор', 'admin');

-- Тестовый пользователь (пароль: test123)
INSERT INTO users (email, password, name, role) VALUES
('test@test.ru', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Тестовый пользователь', 'customer');

-- Категории
INSERT INTO categories (name, slug, description) VALUES
('Билеты', 'tickets', 'Входные билеты в парк'),
('Аренда', 'rental', 'Прокат оборудования'),
('Услуги', 'services', 'Дополнительные услуги'),
('Еда и напитки', 'food', 'Кафе и снеки');

-- Примеры товаров
INSERT INTO products (category_id, name, description, price, image) VALUES
(1, 'Взрослый билет', 'Полный доступ ко всем зонам', 1500.00, NULL),
(1, 'Детский билет', 'Для детей до 14 лет', 800.00, NULL),
(2, 'Аренда лыж', 'Комплект: лыжи + ботинки', 500.00, NULL),
(2, 'Аренда сноуборда', 'Сноуборд + крепления', 600.00, NULL);
```

### 6. Запуск проекта

#### Вариант 1: Встроенный сервер PHP (для разработки)

```bash
# Запуск на порту 8000
php -S localhost:8000
```

Откройте в браузере: `http://localhost:8000`

#### Вариант 2: Apache/Nginx

Настройте виртуальный хост, указав корневую директорию на папку проекта.

## Доступные страницы

### Публичная часть

| URL | Описание |
|-----|----------|
| `/` | Главная страница с выбором локации |
| `/trampoline-park.php` | Страница батутного парка |
| `/ski-slope.php` | Страница горнолыжного склона |
| `/wakeboarding.php` | Страница вейкбординга |
| `/prices.php` | Прайс-лист всех услуг |
| `/contacts.php` | Контакты и реквизиты |
| `/faq.php` | Часто задаваемые вопросы |
| `/privacy.php` | Политика конфиденциальности |
| `/login.php` | Вход в личный кабинет |
| `/register.php` | Регистрация нового пользователя |
| `/cart.php` | Корзина товаров |
| `/profile.php` | Личный кабинет пользователя |

### Админ-панель (`/admin/`)

| Страница | Описание |
|----------|----------|
| `/admin/` | Дашборд со статистикой |
| `/admin/products.php` | Управление товарами (CRUD) |
| `/admin/orders.php` | Просмотр и управление заказами |
| `/admin/users.php` | Управление пользователями |

## 👥 Тестовые учётные данные

| Email | Пароль | Роль |
|-------|--------|------|
| admin@yarko-park.ru | admin123 | Администратор |
| test@test.ru | test123 | Покупатель |

> ⚠️ **Важно**: После первого входа смените пароли!

## Безопасность

Проект включает следующие механизмы защиты:

- **Rate Limiting**: Ограничение количества запросов с одного IP (100 запросов в минуту)
- **DDoS Protection**: Автоматическая блокировка при превышении лимита
- **Password Hashing**: Хеширование паролей через `password_hash()` (bcrypt)
- **SQL Injection Protection**: Использование подготовленных выражений PDO
- **XSS Protection**: Экранирование вывода через `htmlspecialchars()`
- **Session Security**: Защита сессий, регенерация ID при входе

## Метрики проекта

- **Строк PHP кода**: ~2049
- **Файлов**: 20+
- **CSS файлов**: 6
- **Локаций**: 3

## Разработка

### Добавление новой страницы

1. Создайте файл `.php` в корне проекта
2. Подключите инициализацию:
   ```php
   <?php
   require_once __DIR__ . '/init.php';
   require_once __DIR__ . '/includes/header.php';
   ?>

   <!-- Ваш контент -->

   <?php
   require_once __DIR__ . '/includes/footer.php';
   ?>
   ```

### Работа с базой данных

```php
// Получение экземпляра БД
$db = Database::getInstance();

// Выборка данных
$stmt = $db->prepare("SELECT * FROM products WHERE is_active = ?");
$stmt->execute([true]);
$products = $stmt->fetchAll();

// Вставка данных
$stmt = $db->prepare("INSERT INTO orders (user_id, total_amount) VALUES (?, ?)");
$stmt->execute([$userId, $total]);
```

### Настройка Rate Limiting

Параметры защиты настроены в `core/RateLimit.php`:
- Лимит запросов: 100 в минуту
- Время блокировки: 15 минут

## Известные ограничения

- Отсутствуют миграции БД (структура создаётся вручную)
- Нет seeders для автоматического заполнения тестовыми данными
- Отсутствует REST API (все страницы рендерятся на сервере)
- Нет фронтенд-фреймворка (Vue/React) - чистый PHP + HTML

## Планы развития

См. файл `implementation_plan.md` с подробным планом доработок.

## Лицензия

Проект разработан в учебных целях.