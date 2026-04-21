<?php
require_once __DIR__ . '/init.php';

$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // В реальном приложении здесь было бы сохранение в БД или отправка email
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    if ($name && $email && $subject && $message) {
        $success = true;
    }
}

require_once __DIR__ . '/includes/header.php';
?>
<link rel="stylesheet" href="<?= site_url('public/css/contacts.css') ?>">

<div class="contacts-page">
  <div class="container">
    <h1 class="page-title">Контакты</h1>
    <p class="page-subtitle">Свяжитесь с нами любым удобным способом</p>

    <!-- Сообщение об успехе отправки формы -->
    <?php if ($success): ?>
    <div style="background: #2e7d32; color: white; padding: 20px; border-radius: 8px; text-align: center; margin-bottom: 40px; font-weight: bold;">
        Спасибо за ваше сообщение! Мы свяжемся с вами в ближайшее время.
    </div>
    <?php endif; ?>

    <div class="contacts-grid">
      <!-- Контактная информация -->
      <div class="contact-info">
        <div class="info-card">
          <div class="info-icon">📍</div>
          <h3>Адрес</h3>
          <p>г. Москва, ул. Спортивная, д. 1</p>
          <p class="details">ТЦ "Яркий Парк", 3 этаж</p>
        </div>
        <div class="info-card">
          <div class="info-icon">📞</div>
          <h3>Телефон</h3>
          <p>+7 (999) 111-22-33</p>
          <p class="details">Бесплатно по России</p>
        </div>
        <div class="info-card">
          <div class="info-icon">✉️</div>
          <h3>Email</h3>
          <p>info@yarko-park.ru</p>
          <p class="details">Ответим в течение 24 часов</p>
        </div>
        <div class="info-card">
          <div class="info-icon">🕐</div>
          <h3>Режим работы</h3>
          <p>Пн-Пт: 10:00 - 22:00</p>
          <p>Сб-Вс: 09:00 - 23:00</p>
          <p class="details">Без перерывов и выходных</p>
        </div>
      </div>

      <!-- Карта -->
      <div class="map-section">
        <div class="map-container">
          <div class="map-placeholder">
            <div class="map-icon">🗺️</div>
            <h3>Карта проезда</h3>
            <p>г. Москва, ул. Спортивная, д. 1</p>
            <p>ТЦ "Яркий Парк", 3 этаж</p>
            <button class="map-btn">Открыть в Яндекс.Картах</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Форма обратной связи -->
    <div class="contact-form-section">
      <h2>Напишите нам</h2>
      <form class="contact-form" method="POST" action="">
        <div class="form-row">
          <div class="form-group">
            <label>Ваше имя *</label>
            <input type="text" name="name" required placeholder="Введите ваше имя">
          </div>
          <div class="form-group">
            <label>Email *</label>
            <input type="email" name="email" required placeholder="example@email.com">
          </div>
        </div>
        <div class="form-group">
          <label>Телефон</label>
          <input type="tel" name="phone" placeholder="+7 (999) 111-22-33">
        </div>
        <div class="form-group">
          <label>Тема обращения *</label>
          <select name="subject" required>
            <option value="">Выберите тему</option>
            <option value="booking">Бронирование</option>
            <option value="prices">Вопрос по ценам</option>
            <option value="certificates">Сертификаты</option>
            <option value="complaint">Жалоба</option>
            <option value="suggestion">Предложение</option>
            <option value="other">Другое</option>
          </select>
        </div>
        <div class="form-group">
          <label>Сообщение *</label>
          <textarea name="message" required rows="5" placeholder="Опишите ваш вопрос или предложение..."></textarea>
        </div>
        <div class="form-group consent-group">
          <label class="consent-label">
            <input type="checkbox" required name="consent" />
            <span>
              Я согласен(на) на обработку персональных данных в соответствии с
              <a href="<?= site_url('privacy.php') ?>" target="_blank" class="privacy-link">Политикой конфиденциальности</a>
            </span>
          </label>
        </div>
        <button type="submit" class="submit-btn" id="submitBtn">Отправить сообщение</button>
      </form>
    </div>

    <!-- Социальные сети -->
    <div class="social-section">
      <h2>Мы в социальных сетях</h2>
      <p>Подписывайтесь на наши аккаунты, чтобы быть в курсе новинок и акций</p>
      <div class="social-links">
        <a href="#" class="social-link">
          <div class="social-icon">📘</div>
          <span>ВКонтакте</span>
        </a>
        <a href="#" class="social-link">
          <div class="social-icon">📷</div>
          <span>Instagram</span>
        </a>
        <a href="#" class="social-link">
          <div class="social-icon">🎵</div>
          <span>TikTok</span>
        </a>
        <a href="#" class="social-link">
          <div class="social-icon">📺</div>
          <span>YouTube</span>
        </a>
      </div>
    </div>

    <!-- Дополнительная информация -->
    <div class="additional-info">
      <div class="info-block">
        <h3>🚗 Как добраться</h3>
        <p><strong>На автомобиле:</strong> ТЦ "Яркий Парк" имеет большую парковку. Въезд с ул. Спортивной.</p>
        <p><strong>На общественном транспорте:</strong> Стация метро "Спортивная", далее автобус №123 до остановки "ТЦ Яркий Парк".</p>
      </div>
      
      <div class="info-block">
        <h3>🎫 Правила посещения</h3>
        <ul>
          <li>Обязательное наличие носков для прыжков</li>
          <li>Дети до 12 лет только в сопровождении взрослых</li>
          <li>Запрещено проносить еду и напитки в зону прыжков</li>
          <li>Обязательная сменная обувь</li>
        </ul>
      </div>
      
      <div class="info-block">
        <h3>💡 Частые вопросы</h3>
        <ul>
          <li>Нужно ли бронировать заранее?</li>
          <li>Можно ли отменить бронирование?</li>
          <li>Есть ли ограничения по возрасту?</li>
          <li>Что входит в стоимость билета?</li>
        </ul>
        <a href="<?= site_url('faq.php') ?>" class="faq-link">Все вопросы и ответы →</a>
      </div>
    </div>
  </div>
</div>

<script>
// Простой валидатор чекбокса
document.querySelector('.contact-form').addEventListener('submit', function(e) {
    if(!this.consent.checked) {
        e.preventDefault();
        alert('Вы должны согласиться с политикой конфиденциальности.');
    }
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
