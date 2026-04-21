# Implementation Plan: Ярко Парк

## [Overview]

Создание веб-сайта парка развлечений "Ярко Парк" с тремя локациями (батутный парк, горнолыжный склон, вейкбординг), системой бронирования, интернет-магазином абонементов и административной панелью для управления контентом. Проект реализуется как Turborepo монорепозиторий с Vue.js фронтендом, PHP бэкендом и MySQL базой данных.

## [Types]

Пакет переиспользуемых типов `@yarko-park/types` для синхронизации между фронтендом и бэкендом.

### Основные типы данных:

```typescript
// Пользователь
interface User {
  id: number;
  email: string;
  password_hash: string;
  first_name: string;
  last_name: string;
  phone: string;
  role: 'admin' | 'customer';
  created_at: string;
  updated_at: string;
}

// Локация
interface Location {
  id: number;
  name: string;
  slug: string;
  description: string;
  address: string;
  phone: string;
  image_url: string;
  is_active: boolean;
}

// Категория товаров
interface Category {
  id: number;
  name: string;
  slug: string;
  description: string;
  location_id: number;
  image_url: string;
  is_active: boolean;
}

// Товар/Абонемент
interface Product {
  id: number;
  name: string;
  slug: string;
  description: string;
  price: number;
  category_id: number;
  location_id: number;
  image_url: string;
  duration_minutes: number;
  is_active: boolean;
  stock: number;
}

// Заказ
interface Order {
  id: number;
  user_id: number;
  status: 'pending' | 'confirmed' | 'completed' | 'cancelled';
  total_amount: number;
  created_at: string;
  updated_at: string;
}

// Элемент заказа
interface OrderItem {
  id: number;
  order_id: number;
  product_id: number;
  quantity: number;
  price: number;
}

// Бронирование
interface Booking {
  id: number;
  user_id: number;
  product_id: number;
  location_id: number;
  date: string;
  time_slot: string;
  status: 'pending' | 'confirmed' | 'completed' | 'cancelled';
  created_at: string;
}

// Акция
interface Promotion {
  id: number;
  title: string;
  description: string;
  image_url: string;
  location_id: number;
  start_date: string;
  end_date: string;
  is_active: boolean;
}

// Сертификат
interface Certificate {
  id: number;
  name: string;
  description: string;
  price: number;
  image_url: string;
  location_id: number;
  is_active: boolean;
}

// Слой времени для бронирования
interface TimeSlot {
  id: number;
  location_id: number;
  start_time: string;
  end_time: string;
  max_capacity: number;
  is_available: boolean;
}
```

### API Response типы:

```typescript
interface ApiResponse<T> {
  success: boolean;
  data: T;
  message?: string;
}

interface PaginatedResponse<T> {
  success: boolean;
  data: T[];
  pagination: {
    page: number;
    per_page: number;
    total: number;
    total_pages: number;
  };
}

interface LoginRequest {
  email: string;
  password: string;
}

interface LoginResponse {
  user: User;
  token: string;
}

interface RegisterRequest {
  email: string;
  password: string;
  first_name: string;
  last_name: string;
  phone: string;
}
```

## [Files]

### Новые файлы для создания:

#### Корневая конфигурация Turborepo:
- `turbo.json` - конфигурация Turborepo
- `package.json` - корневой package.json
- `.gitignore` - игнорируемые файлы

#### Пакет типов:
- `packages/types/package.json`
- `packages/types/src/index.ts` - экспорт всех типов
- `packages/types/src/user.ts` - типы пользователей
- `packages/types/src/product.ts` - типы товаров
- `packages/types/src/order.ts` - типы заказов
- `packages/types/src/booking.ts` - типы бронирований
- `packages/types/src/location.ts` - типы локаций
- `packages/types/src/api.ts` - типы API ответов
- `packages/types/tsconfig.json`

#### Фронтенд (Vue):
- `apps/frontend/package.json`
- `apps/frontend/vite.config.ts`
- `apps/frontend/tsconfig.json`
- `apps/frontend/index.html`
- `apps/frontend/src/main.ts`
- `apps/frontend/src/App.vue`
- `apps/frontend/src/router/index.ts`
- `apps/frontend/src/stores/auth.ts` - Pinia store для аутентификации
- `apps/frontend/src/stores/cart.ts` - Pinia store для корзины
- `apps/frontend/src/stores/locations.ts` - Pinia store для локаций
- `apps/frontend/src/api/client.ts` - axios клиент
- `apps/frontend/src/api/auth.ts` - API аутентификации
- `apps/frontend/src/api/products.ts` - API товаров
- `apps/frontend/src/api/bookings.ts` - API бронирований
- `apps/frontend/src/api/orders.ts` - API заказов
- `apps/frontend/src/components/layout/Header.vue`
- `apps/frontend/src/components/layout/Footer.vue`
- `apps/frontend/src/components/layout/Nav.vue`
- `apps/frontend/src/components/common/Button.vue`
- `apps/frontend/src/components/common/Card.vue`
- `apps/frontend/src/components/common/Modal.vue`
- `apps/frontend/src/components/common/Input.vue`
- `apps/frontend/src/components/product/ProductCard.vue`
- `apps/frontend/src/components/product/ProductList.vue`
- `apps/frontend/src/components/booking/TimeSlotPicker.vue`
- `apps/frontend/src/components/booking/BookingForm.vue`
- `apps/frontend/src/components/cart/CartItem.vue`
- `apps/frontend/src/components/cart/CartSummary.vue`
- `apps/frontend/src/views/Home.vue` - главная с выбором локации
- `apps/frontend/src/views/Location.vue` - страница локации
- `apps/frontend/src/views/Prices.vue` - прайс-лист
- `apps/frontend/src/views/Promotions.vue` - акции
- `apps/frontend/src/views/Certificates.vue` - сертификаты
- `apps/frontend/src/views/Rent.vue` - аренда
- `apps/frontend/src/views/School.vue` - школа
- `apps/frontend/src/views/Contacts.vue` - контакты
- `apps/frontend/src/views/Booking.vue` - бронирование
- `apps/frontend/src/views/Cart.vue` - корзина
- `apps/frontend/src/views/Login.vue` - вход
- `apps/frontend/src/views/Register.vue` - регистрация
- `apps/frontend/src/views/profile/Profile.vue` - личный кабинет
- `apps/frontend/src/views/profile/Orders.vue` - мои заказы
- `apps/frontend/src/views/profile/Bookings.vue` - мои бронирования
- `apps/frontend/src/styles/main.css` - основные стили
- `apps/frontend/src/styles/variables.css` - CSS переменные

#### Админка (Vue):
- `apps/admin/package.json`
- `apps/admin/vite.config.ts`
- `apps/admin/src/main.ts`
- `apps/admin/src/App.vue`
- `apps/admin/src/router/index.ts`
- `apps/admin/src/stores/auth.ts`
- `apps/admin/src/views/Dashboard.vue`
- `apps/admin/src/views/products/ProductList.vue`
- `apps/admin/src/views/products/ProductForm.vue`
- `apps/admin/src/views/categories/CategoryList.vue`
- `apps/admin/src/views/categories/CategoryForm.vue`
- `apps/admin/src/views/orders/OrderList.vue`
- `apps/admin/src/views/orders/OrderDetail.vue`
- `apps/admin/src/views/users/UserList.vue`
- `apps/admin/src/views/users/UserForm.vue`
- `apps/admin/src/views/locations/LocationList.vue`
- `apps/admin/src/views/locations/LocationForm.vue`
- `apps/admin/src/views/promotions/PromotionList.vue`
- `apps/admin/src/views/promotions/PromotionForm.vue`
- `apps/admin/src/views/bookings/BookingList.vue`
- `apps/admin/src/components/layout/AdminSidebar.vue`
- `apps/admin/src/components/layout/AdminHeader.vue`

#### Бэкенд (PHP):
- `apps/backend/composer.json`
- `apps/backend/public/index.php` - точка входа
- `apps/backend/config/database.php` - конфигурация БД
- `apps/backend/config/app.php` - конфигурация приложения
- `apps/backend/src/Router.php` - роутер
- `apps/backend/src/Controller.php` - базовый контроллер
- `apps/backend/src/Request.php` - HTTP запрос
- `apps/backend/src/Response.php` - HTTP ответ
- `apps/backend/src/Auth.php` - аутентификация JWT
- `apps/backend/src/Middleware/AuthMiddleware.php`
- `apps/backend/src/Middleware/AdminMiddleware.php`
- `apps/backend/src/Middleware/CorsMiddleware.php`
- `apps/backend/src/Controllers/AuthController.php`
- `apps/backend/src/Controllers/UserController.php`
- `apps/backend/src/Controllers/LocationController.php`
- `apps/backend/src/Controllers/CategoryController.php`
- `apps/backend/src/Controllers/ProductController.php`
- `apps/backend/src/Controllers/OrderController.php`
- `apps/backend/src/Controllers/BookingController.php`
- `apps/backend/src/Controllers/PromotionController.php`
- `apps/backend/src/Controllers/CertificateController.php`
- `apps/backend/src/Models/User.php`
- `apps/backend/src/Models/Location.php`
- `apps/backend/src/Models/Category.php`
- `apps/backend/src/Models/Product.php`
- `apps/backend/src/Models/Order.php`
- `apps/backend/src/Models/OrderItem.php`
- `apps/backend/src/Models/Booking.php`
- `apps/backend/src/Models/Promotion.php`
- `apps/backend/src/Models/Certificate.php`
- `apps/backend/src/Models/TimeSlot.php`
- `apps/backend/src/Database/Connection.php`
- `apps/backend/src/Database/QueryBuilder.php`
- `apps/backend/migrations/001_create_users_table.sql`
- `apps/backend/migrations/002_create_locations_table.sql`
- `apps/backend/migrations/003_create_categories_table.sql`
- `apps/backend/migrations/004_create_products_table.sql`
- `apps/backend/migrations/005_create_orders_table.sql`
- `apps/backend/migrations/006_create_order_items_table.sql`
- `apps/backend/migrations/007_create_bookings_table.sql`
- `apps/backend/migrations/008_create_promotions_table.sql`
- `apps/backend/migrations/009_create_certificates_table.sql`
- `apps/backend/migrations/010_create_time_slots_table.sql`
- `apps/backend/seeders/seed.php` - сидер с тестовыми данными

## [Functions]

### Бэкенд PHP функции:

#### AuthController:
- `login(Request $request): Response` - аутентификация по email/паролю
- `register(Request $request): Response` - регистрация нового пользователя
- `logout(Request $request): Response` - выход из системы
- `me(Request $request): Response` - получение текущего пользователя

#### UserController (admin):
- `index(Request $request): Response` - список пользователей
- `show(Request $request, int $id): Response` - детали пользователя
- `update(Request $request, int $id): Response` - обновление пользователя
- `delete(Request $request, int $id): Response` - удаление пользователя

#### LocationController:
- `index(Request $request): Response` - список локаций
- `show(Request $request, string $slug): Response` - детали локации
- `store(Request $request): Response` - создание (admin)
- `update(Request $request, int $id): Response` - обновление (admin)
- `delete(Request $request, int $id): Response` - удаление (admin)

#### ProductController:
- `index(Request $request): Response` - список товаров с фильтрацией
- `show(Request $request, int $id): Response` - детали товара
- `store(Request $request): Response` - создание (admin)
- `update(Request $request, int $id): Response` - обновление (admin)
- `delete(Request $request, int $id): Response` - удаление (admin)

#### OrderController:
- `index(Request $request): Response` - список заказов пользователя
- `show(Request $request, int $id): Response` - детали заказа
- `store(Request $request): Response` - создание заказа
- `updateStatus(Request $request, int $id): Response` - обновление статуса (admin)

#### BookingController:
- `index(Request $request): Response` - список бронирований
- `availableSlots(Request $request): Response` - доступные слоты
- `store(Request $request): Response` - создание бронирования
- `cancel(Request $request, int $id): Response` - отмена бронирования

### Фронтенд Vue функции:

#### API клиент:
- `api.get(url, config)` - GET запрос
- `api.post(url, data, config)` - POST запрос
- `api.put(url, data, config)` - PUT запрос
- `api.delete(url, config)` - DELETE запрос

#### Stores (Pinia):
- `useAuthStore().login(email, password)` - вход
- `useAuthStore().register(data)` - регистрация
- `useAuthStore().logout()` - выход
- `useCartStore().addItem(product)` - добавление в корзину
- `useCartStore().removeItem(productId)` - удаление из корзины
- `useCartStore().clearCart()` - очистка корзины

## [Classes]

### Бэкенд PHP классы:

#### Базовые:
- `Router` - маршрутизация запросов
- `Controller` - базовый контроллер с общими методами
- `Request` - обертка над HTTP запросом
- `Response` - формирование HTTP ответа в JSON
- `Auth` - работа с JWT токенами

#### Middleware:
- `AuthMiddleware` - проверка аутентификации
- `AdminMiddleware` - проверка прав администратора
- `CorsMiddleware` - обработка CORS заголовков

#### Модели (наследуют базовый Model):
- `User` - методы: findById, findByEmail, create, update, delete
- `Location` - методы: findAll, findBySlug, findById, create, update, delete
- `Category` - методы: findAll, findByLocation, create, update, delete
- `Product` - методы: findAll, findByCategory, findById, create, update, delete
- `Order` - методы: findByUser, findById, create, updateStatus
- `Booking` - методы: findByUser, findAvailableSlots, create, cancel

#### Database:
- `Connection` - подключение к MySQL через PDO
- `QueryBuilder` - построение SQL запросов

## [Dependencies]

### Корневые зависимости:
- `turbo` - ^1.10.0

### Пакет типов:
- `typescript` - ^5.0.0

### Фронтенд (Vue):
- `vue` - ^3.4.0
- `vue-router` - ^4.2.0
- `pinia` - ^2.1.0
- `axios` - ^1.6.0
- `@vitejs/plugin-vue` - ^5.0.0
- `vite` - ^5.0.0
- `typescript` - ^5.0.0

### Бэкенд (PHP):
- PHP >= 8.1
- `firebase/php-jwt` - ^6.10 (JWT токены)
- `vlucas/phpdotenv` - ^5.6 (переменные окружения)

### База данных:
- MySQL >= 8.0

## [Testing]

### Стратегия тестирования:

1. **Ручное тестирование** - проверка всех функций через UI
2. **API тестирование** - проверка всех эндпоинтов через Postman/curl
3. **Интеграционное тестирование** - проверка связки фронт-бэк-БД

### Тестовые данные (сидер):
- 3 локации (батутный парк, горнолыжный склон, вейкбординг)
- По 2-3 категории для каждой локации
- По 5-10 товаров в каждой категории
- Админ пользователь (admin@yarko-park.ru / admin123)
- Тестовый покупатель (test@test.ru / test123)
- Примеры акций и сертификатов
- Слоты бронирования на 2 недели вперед

### Чек-лист тестирования:
- [ ] Регистрация нового пользователя
- [ ] Вход по email/паролю
- [ ] Просмотр списка локаций на главной
- [ ] Переход на страницу локации
- [ ] Просмотр прайс-листа
- [ ] Просмотр акций
- [ ] Просмотр сертификатов
- [ ] Добавление товара в корзину
- [ ] Оформление заказа
- [ ] Бронирование временного слота
- [ ] Просмотр личного кабинета
- [ ] Просмотр истории заказов
- [ ] Просмотр бронирований
- [ ] Админ: управление товарами
- [ ] Админ: управление категориями
- [ ] Админ: управление заказами
- [ ] Админ: управление пользователями

## [Implementation Order]

### Этап 1: Инфраструктура
1. Инициализация Turborepo монорепозитория
2. Создание пакета типов `@yarko-park/types`
3. Настройка конфигурационных файлов

### Этап 2: База данных
4. Создание миграций для всех таблиц
5. Настройка подключения к MySQL
6. Создание сидера с тестовыми данными

### Этап 3: Бэкенд
7. Базовый роутер и контроллеры
8. Middleware (CORS, Auth, Admin)
9. API аутентификации (регистрация, логин)
10. API для локаций
11. API для категорий и товаров
12. API для заказов
13. API для бронирований
14. API для акций и сертификатов

### Этап 4: Фронтенд
15. Настройка Vue проекта с Vite
16. Базовые компоненты (Header, Footer, Button, Card)
17. Маршрутизация
18. Главная страница с выбором локации
19. Страница локации
20. Прайс-лист
21. Страницы акций и сертификатов
22. Система корзины
23. Форма бронирования
24. Аутентификация (логин, регистрация)
25. Личный кабинет

### Этап 5: Админка
26. Настройка админки
27. Дашборд
28. Управление товарами (CRUD)
29. Управление категориями (CRUD)
30. Управление заказами
31. Управление пользователями
32. Управление локациями
33. Управление акциями

### Этап 6: Финальная интеграция
34. Интеграция всех компонентов
35. Тестирование всех сценариев
36. Исправление багов
37. Финальная проверка