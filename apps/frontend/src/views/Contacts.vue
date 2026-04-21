<template>
  <div class="contacts-page">
    <div class="container">
      <h1 class="page-title">Контакты</h1>
      <p class="page-subtitle">Свяжитесь с нами любым удобным способом</p>
      
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
        <form class="contact-form" @submit.prevent="handleSubmit">
          <div class="form-row">
            <div class="form-group">
              <label>Ваше имя *</label>
              <input type="text" v-model="form.name" required placeholder="Введите ваше имя">
            </div>
            <div class="form-group">
              <label>Email *</label>
              <input type="email" v-model="form.email" required placeholder="example@email.com">
            </div>
          </div>
          <div class="form-group">
            <label>Телефон</label>
            <input type="tel" v-model="form.phone" placeholder="+7 (999) 111-22-33">
          </div>
          <div class="form-group">
            <label>Тема обращения *</label>
            <select v-model="form.subject" required>
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
            <textarea v-model="form.message" required rows="5" placeholder="Опишите ваш вопрос или предложение..."></textarea>
          </div>
          <div class="form-group consent-group">
            <label class="consent-label">
              <input type="checkbox" v-model="consentGiven" />
              <span>
                Я согласен(на) на обработку персональных данных в соответствии с
                <router-link to="/privacy" target="_blank" class="privacy-link">Политикой конфиденциальности</router-link>
              </span>
            </label>
          </div>
          <button type="submit" class="submit-btn" :disabled="!consentGiven">Отправить сообщение</button>
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
          <router-link to="/faq" class="faq-link">Все вопросы и ответы →</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const consentGiven = ref(false)

const form = ref({
  name: '',
  email: '',
  phone: '',
  subject: '',
  message: ''
})

const handleSubmit = () => {
  alert('Спасибо за ваше сообщение! Мы свяжемся с вами в ближайшее время.')
  form.value = {
    name: '',
    email: '',
    phone: '',
    subject: '',
    message: ''
  }
  consentGiven.value = false
}
</script>

<style scoped>
.contacts-page {
  min-height: 100vh;
  background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
  padding: 40px 20px;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
}

.page-title {
  text-align: center;
  color: white;
  font-size: 48px;
  margin-bottom: 10px;
  text-transform: uppercase;
  letter-spacing: 2px;
}

.page-subtitle {
  text-align: center;
  color: #b0b0b0;
  font-size: 18px;
  margin-bottom: 50px;
}

.contacts-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 40px;
  margin-bottom: 60px;
}

.contact-info {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

.info-card {
  background: #262420;
  border-radius: 12px;
  padding: 25px;
  text-align: center;
  transition: transform 0.3s ease;
}

.info-card:hover {
  transform: translateY(-5px);
}

.info-icon {
  font-size: 40px;
  margin-bottom: 15px;
}

.info-card h3 {
  color: white;
  font-size: 18px;
  margin-bottom: 10px;
}

.info-card p {
  color: #b0b0b0;
  font-size: 16px;
  margin-bottom: 5px;
}

.info-card .details {
  font-size: 14px;
  color: #888;
}

.map-section {
  background: #262420;
  border-radius: 16px;
  overflow: hidden;
}

.map-container {
  height: 400px;
}

.map-placeholder {
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, #2f2e2e 0%, #1a1a1a 100%);
  border: 2px dashed #555;
  border-radius: 16px;
  text-align: center;
  padding: 40px;
}

.map-icon {
  font-size: 60px;
  margin-bottom: 20px;
}

.map-placeholder h3 {
  color: white;
  font-size: 24px;
  margin-bottom: 10px;
}

.map-placeholder p {
  color: #b0b0b0;
  font-size: 16px;
  margin-bottom: 10px;
}

.map-btn {
  margin-top: 20px;
  padding: 12px 24px;
  background: #2979ff;
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 14px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.map-btn:hover {
  background: #1565c0;
}

.contact-form-section {
  background: #262420;
  border-radius: 16px;
  padding: 40px;
  margin-bottom: 60px;
}

.contact-form-section h2 {
  text-align: center;
  color: white;
  font-size: 36px;
  margin-bottom: 40px;
}

.contact-form {
  max-width: 800px;
  margin: 0 auto;
}

.form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

.form-group {
  margin-bottom: 25px;
}

.form-group label {
  display: block;
  color: white;
  font-size: 14px;
  margin-bottom: 8px;
  font-weight: 600;
}

.form-group input,
.form-group select,
.form-group textarea {
  width: 100%;
  padding: 12px 16px;
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 8px;
  color: white;
  font-size: 16px;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
  outline: none;
  border-color: #2979ff;
}

.form-group input::placeholder,
.form-group textarea::placeholder {
  color: #888;
}

.form-group select option {
  background: #262420;
  color: white;
}

.submit-btn {
  display: block;
  width: 100%;
  padding: 15px;
  background: #2979ff;
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.3s ease;
}

.submit-btn:hover {
  background: #1565c0;
}

.consent-group {
  margin-top: 5px;
}

.consent-label {
  display: flex;
  align-items: flex-start;
  gap: 10px;
  cursor: pointer;
  font-size: 14px;
  color: #b0b0b0;
  line-height: 1.6;
}

.consent-label input[type="checkbox"] {
  width: 18px;
  height: 18px;
  min-width: 18px;
  margin-top: 2px;
  accent-color: #2979ff;
  cursor: pointer;
}

.privacy-link {
  color: #2979ff;
  text-decoration: underline;
  font-weight: 600;
  transition: color 0.2s;
}

.privacy-link:hover {
  color: #5ba3ff;
}

.submit-btn:disabled {
  background: #555;
  cursor: not-allowed;
  opacity: 0.7;
}

.social-section {
  background: #262420;
  border-radius: 16px;
  padding: 40px;
  text-align: center;
  margin-bottom: 60px;
}

.social-section h2 {
  color: white;
  font-size: 36px;
  margin-bottom: 15px;
}

.social-section p {
  color: #b0b0b0;
  font-size: 16px;
  margin-bottom: 30px;
}

.social-links {
  display: flex;
  justify-content: center;
  gap: 30px;
  flex-wrap: wrap;
}

.social-link {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
  text-decoration: none;
  color: white;
  transition: transform 0.3s ease;
}

.social-link:hover {
  transform: translateY(-5px);
}

.social-icon {
  font-size: 40px;
  background: rgba(255, 255, 255, 0.1);
  padding: 15px;
  border-radius: 50%;
}

.social-link span {
  font-size: 14px;
  font-weight: 600;
}

.additional-info {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
}

.info-block {
  background: #262420;
  border-radius: 16px;
  padding: 30px;
}

.info-block h3 {
  color: white;
  font-size: 20px;
  margin-bottom: 20px;
}

.info-block p {
  color: #b0b0b0;
  font-size: 16px;
  line-height: 1.6;
  margin-bottom: 10px;
}

.info-block ul {
  color: #b0b0b0;
  font-size: 16px;
  line-height: 1.8;
  padding-left: 20px;
}

.info-block li {
  margin-bottom: 8px;
}

.faq-link {
  display: inline-block;
  color: #2979ff;
  text-decoration: none;
  font-size: 16px;
  margin-top: 15px;
  transition: color 0.3s ease;
}

.faq-link:hover {
  color: #1565c0;
}

@media (max-width: 768px) {
  .page-title {
    font-size: 36px;
  }
  
  .contacts-grid {
    grid-template-columns: 1fr;
  }
  
  .contact-info {
    grid-template-columns: 1fr;
  }
  
  .form-row {
    grid-template-columns: 1fr;
  }
  
  .social-links {
    flex-direction: column;
    align-items: center;
  }
  
  .additional-info {
    grid-template-columns: 1fr;
  }
}
</style>