# Ярко Парк - Парк развлечений

Проект представляет собой веб-сайт парка развлечений с тремя локациями:
1. **Батутный парк** - прыжки на батутах, ниндзя-парк
2. **Горнолыжный склон** - катание на лыжах и сноуборде
3. **Вейкбординг** - катание на вейкборде, прогулки на катамаранах

## Структура проекта

```
yarko-park/
├── apps/
│   ├── frontend/     # Клиентский сайт (Vue 3)
│   │   ├── src/
│   │   │   ├── api/           # API клиент
│   │   │   ├── components/    # Компоненты (Header, Footer)
│   │   │   ├── router/        # Маршрутизатор
│   │   │   ├── stores/        # Pinia хранилища
│   │   │   ├── styles/        # Стили
│   │   │   └── views/         # Страницы
│   │   ├── package.json
│   │   ├── vite.config.ts
│   │   └── tsconfig.json
│   ├── admin/        # Админка (Vue 3)
│   │   ├── src/
│   │   │   ├── api/           # API клиент
│   │   │   ├── components/    # Компоненты (Sidebar, Header)
│   │   │   ├── router/        # Маршрутизатор
│   │   │   ├── styles/        # Стили
│   │   │   └── views/         # Страницы
│   │   │       ├── products/      # Управление товарами
│   │   │       ├── categories/    # Управление категориями
│   │   │       ├── orders/        # Управление заказами
│   │   │       ├── users/         # Управление пользователями
│   │   │       ├── locations/     # Управление локациями
│   │   │       ├── promotions/    # Управление акциями
│   │   │       └── bookings/      # Управление бронированиями
│   │   ├── package.json
│   │   ├── vite.config.ts
│   │   └── tsconfig.json
│   └── backend/      # API (PHP)
│       ├── config/    # Конфигурация
│       ├── migrations/ # Миграции БД
│       ├── seeders/   # Сидеры
│       ├── src/       # Исходный код
│       └── public/    # Точка входа
├── packages/
│   └── types/        # Переиспользуемые TypeScript типы
├── start-all.bat     # Скрипт запуска для Windows CMD
├── start-all.ps1     # Скрипт запуска для PowerShell
└── README.md
```

## Технологии

- **Фронтенд**: Vue 3, Vue Router 5, Pinia 3, Axios
- **Админка**: Vue 3, Vue Router 5, Pinia 3, Axios
- **Бэкенд**: PHP 8.1+, MySQL
- **Монорепозиторий**: Turborepo 2

## Быстрый старт

### 1. Установка зависимостей

```bash
npm install
```

### 2. Настройка базы данных

1. Создайте базу данных MySQL `yarko_park`
2. Скопируйте `apps/backend/.env.example` в `apps/backend/.env`
3. Заполните настройки подключения к БД в `.env` файле

### 3. Установка PHP зависимостей

```bash
cd apps/backend
composer install
```

### 4. Запуск миграций

```bash
# В корне проекта или в apps/backend
php -r "
\$pdo = new PDO('mysql:host=localhost', 'root', '');
\$pdo->exec('CREATE DATABASE IF NOT EXISTS yarko_park');
\$pdo->exec('USE yarko_park');
foreach (glob('migrations/*.sql') as \$file) {
  \$pdo->exec(file_get_contents(\$file));
}
"
```

### 5. Заполнение тестовыми данными

```bash
cd apps/backend
php seeders/seed.php
```

### 6. Запуск проекта

#### Вариант 1: Автоматический запуск всех сервисов

**Windows CMD:**
```bash
start-all.bat
```

**PowerShell:**
```powershell
.\start-all.ps1
```

#### Вариант 2: Ручной запуск

**Бэкенд (PHP):**
```bash
cd apps/backend
php -S localhost:8000 -t public
```

**Фронтенд (Vue):**
```bash
cd apps/frontend
npm run dev
```

**Админка (Vue):**
```bash
cd apps/admin
npm run dev
```

## Доступные страницы

### Фронтенд (http://localhost:5173)
| URL | Описание |
|-----|----------|
| `/` | Главная страница с выбором локации |
| `/location/:slug` | Страница локации |
| `/prices` | Прайс-лист |
| `/promotions` | Акции |
| `/certificates` | Сертификаты |
| `/contacts` | Контакты |
| `/login` | Вход |
| `/register` | Регистрация |
| `/cart` | Корзина |
| `/booking` | Бронирование |
| `/profile` | Личный кабинет |
| `/profile/orders` | История заказов |
| `/profile/bookings` | История бронирований |

### Админка (http://localhost:5174)
| URL | Описание |
|-----|----------|
| `/` | Дашборд со статистикой |
| `/products` | Список товаров |
| `/products/new` | Добавить товар |
| `/products/:id` | Редактировать товар |
| `/categories` | Список категорий |
| `/categories/new` | Добавить категорию |
| `/categories/:id` | Редактировать категорию |
| `/orders` | Список заказов |
| `/orders/:id` | Детали заказа |
| `/users` | Список пользователей |
| `/users/:id` | Редактировать пользователя |
| `/locations` | Список локаций |
| `/locations/new` | Добавить локацию |
| `/locations/:id` | Редактировать локацию |
| `/promotions` | Список акций |
| `/promotions/new` | Добавить акцию |
| `/promotions/:id` | Редактировать акцию |
| `/bookings` | Список бронирований |

## Тестовые данные

### Пользователи
| Email | Пароль | Роль |
|-------|--------|------|
| admin@yarko-park.ru | admin123 | Администратор |
| test@test.ru | test123 | Покупатель |

### Локации
| Название | Slug |
|----------|------|
| Батутный парк | trampoline-park |
| Горнолыжный склон | ski-slope |
| Вейкбординг | wakeboarding |

## API эндпоинты

### Аутентификация
- `POST /api/auth/login` - Вход
- `POST /api/auth/register` - Регистрация
- `GET /api/auth/me` - Получить текущего пользователя

### Локации
- `GET /api/locations` - Список локаций
- `GET /api/locations/{slug}` - Информация о локации

### Товары
- `GET /api/products` - Список товаров
- `GET /api/products/{id}` - Информация о товаре

### Заказы
- `GET /api/orders` - Список заказов пользователя
- `POST /api/orders` - Создать заказ

### Бронирования (с аутентификацией)
- `GET /api/bookings` - Список бронирований пользователя
- `POST /api/bookings` - Создать бронирование
- `PUT /api/bookings/{id}/cancel` - Отменить бронирование
- `GET /api/bookings/slots` - Доступные временные слоты

## Структура типов

Все типы определены в `packages/types/src/`:
- `user.ts` - типы пользователей (User, LoginRequest, RegisterRequest)
- `product.ts` - типы товаров (Product, Category, Certificate)
- `order.ts` - типы заказов (Order, OrderItem)
- `booking.ts` - типы бронирований (Booking, TimeSlot)
- `location.ts` - типы локаций (Location, Promotion)
- `api.ts` - типы API ответов (ApiResponse, PaginatedResponse)

## Разработка

### Добавление новых страниц
1. Создайте Vue компонент в `apps/frontend/src/views/` или `apps/admin/src/views/`
2. Добавьте маршрут в соответствующий `src/router/index.ts`

### Работа с типами
Типы определены в `packages/types/src/` и автоматически доступны во всех приложениях.

## Лицензии

Проект разработан в учебных целях.