<template>
  <div class="promotions-page">
    <div class="container">
      <h1 class="page-title">Акции</h1>
      <p class="page-subtitle">Специальные предложения и выгодные условия</p>
      
      <div class="promotions-grid">
        <!-- Акция 1 -->
        <div class="promo-card">
          <div class="promo-image">
            <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=600&h=400&fit=crop" alt="Утренний тариф" />
            <div class="promo-badge">-20%</div>
          </div>
          <div class="promo-content">
            <h3>Утренний тариф</h3>
            <p>Прыгайте по выгодной цене каждое утро! Скидка 20% на все услуги с 10:00 до 12:00 в будние дни.</p>
            <div class="promo-details">
              <span class="promo-date">Действует до 31.12.2026</span>
              <span class="promo-time">Пн-Пт 10:00-12:00</span>
            </div>
            <router-link to="/booking" class="promo-btn">Воспользоваться</router-link>
          </div>
        </div>

        <!-- Акция 2 -->
        <div class="promo-card">
          <div class="promo-image">
            <img src="https://images.unsplash.com/photo-1551698618-1dfe5d97d256?w=600&h=400&fit=crop" alt="Студенческая скидка" />
            <div class="promo-badge">-15%</div>
          </div>
          <div class="promo-content">
            <h3>Студенческая скидка</h3>
            <p>Покажите студенческий билет и получите скидку 15% на любые услуги батутного парка.</p>
            <div class="promo-details">
              <span class="promo-date">Бессрочно</span>
              <span class="promo-time">При предъявлении студенческого</span>
            </div>
            <router-link to="/booking" class="promo-btn">Воспользоваться</router-link>
          </div>
        </div>

        <!-- Акция 3 -->
        <div class="promo-card">
          <div class="promo-image">
            <img src="https://images.unsplash.com/photo-1530549387789-4c1017266635?w=600&h=400&fit=crop" alt="Детский день" />
            <div class="promo-badge">-30%</div>
          </div>
          <div class="promo-content">
            <h3>Детский день</h3>
            <p>Каждое воскресенье детям до 12 лет предоставляется скидка 30% на все услуги парка.</p>
            <div class="promo-details">
              <span class="promo-date">Каждое воскресенье</span>
              <span class="promo-time">Для детей до 12 лет</span>
            </div>
            <router-link to="/booking" class="promo-btn">Воспользоваться</router-link>
          </div>
        </div>

        <!-- Акция 4 -->
        <div class="promo-card">
          <div class="promo-image">
            <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=600&h=400&fit=crop" alt="Семейный пакет" />
            <div class="promo-badge">Пакет</div>
          </div>
          <div class="promo-content">
            <h3>Семейный пакет</h3>
            <p>Приведите семью из 3+ человек и получите скидку 25% на общую стоимость посещения.</p>
            <div class="promo-details">
              <span class="promo-date">Бессрочно</span>
              <span class="promo-time">От 3 человек</span>
            </div>
            <router-link to="/booking" class="promo-btn">Воспользоваться</router-link>
          </div>
        </div>

        <!-- Акция 5 -->
        <div class="promo-card">
          <div class="promo-image">
            <img src="https://images.unsplash.com/photo-1551698618-1dfe5d97d256?w=600&h=400&fit=crop" alt="День рождения" />
            <div class="promo-badge">Подарок</div>
          </div>
          <div class="promo-content">
            <h3>День рождения</h3>
            <p>В день рождения и 3 дня после именинник получает бесплатное посещение батутного парка!</p>
            <div class="promo-details">
              <span class="promo-date">Бессрочно</span>
              <span class="promo-time">В день рождения и 3 дня после</span>
            </div>
            <router-link to="/booking" class="promo-btn">Воспользоваться</router-link>
          </div>
        </div>

        <!-- Акция 6 -->
        <div class="promo-card">
          <div class="promo-image">
            <img src="https://images.unsplash.com/photo-1530549387789-4c1017266635?w=600&h=400&fit=crop" alt="Абонемент" />
            <div class="promo-badge">Выгодно</div>
          </div>
          <div class="promo-content">
            <h3>Абонемент на месяц</h3>
            <p>Купите абонемент на месяц и посещайте парк без ограничений! Экономия до 40%.</p>
            <div class="promo-details">
              <span class="promo-date">Бессрочно</span>
              <span class="promo-time">Безлимитные посещения</span>
            </div>
            <router-link to="/booking" class="promo-btn">Воспользоваться</router-link>
          </div>
        </div>
      </div>

      <!-- Баннер акции -->
      <div class="promo-banner">
        <div class="banner-content">
          <h2>🎁 Специальное предложение!</h2>
          <p>Приведи друга и получи скидку 50% на следующее посещение!</p>
          <router-link to="/booking" class="banner-btn">Забронировать сейчас</router-link>
        </div>
        <div class="banner-image">
          <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=400&h=300&fit=crop" alt="Специальное предложение" />
        </div>
      </div>

      <!-- Условия акций -->
      <div class="promo-terms">
        <h2>Условия акций</h2>
        <ul>
          <li>Скидки не суммируются друг с другом</li>
          <li>Акции действуют только при предъявлении соответствующих документов</li>
          <li>Администрация оставляет за собой право изменять условия акций</li>
          <li>Акции не распространяются на праздничные дни</li>
          <li>Для получения скидки необходимо сообщить о participation в акции до оплаты</li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
</script>

<style scoped>
.promotions-page {
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

.promotions-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 30px;
  margin-bottom: 60px;
}

.promo-card {
  background: #262420;
  border-radius: 16px;
  overflow: hidden;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.promo-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.promo-image {
  position: relative;
  height: 200px;
  overflow: hidden;
}

.promo-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.promo-card:hover .promo-image img {
  transform: scale(1.05);
}

.promo-badge {
  position: absolute;
  top: 15px;
  right: 15px;
  background: #2979ff;
  color: white;
  padding: 8px 15px;
  border-radius: 20px;
  font-size: 14px;
  font-weight: 600;
  text-transform: uppercase;
}

.promo-content {
  padding: 25px;
}

.promo-content h3 {
  color: white;
  font-size: 24px;
  margin-bottom: 15px;
}

.promo-content p {
  color: #b0b0b0;
  font-size: 16px;
  line-height: 1.6;
  margin-bottom: 20px;
}

.promo-details {
  display: flex;
  flex-direction: column;
  gap: 8px;
  margin-bottom: 20px;
}

.promo-date,
.promo-time {
  color: #888;
  font-size: 14px;
}

.promo-date::before,
.promo-time::before {
  content: '📅 ';
}

.promo-time::before {
  content: '🕐 ';
}

.promo-btn {
  display: block;
  width: 100%;
  padding: 12px;
  background: #2979ff;
  color: white;
  text-align: center;
  text-decoration: none;
  border-radius: 8px;
  font-weight: 600;
  transition: background 0.3s ease;
}

.promo-btn:hover {
  background: #1565c0;
}

.promo-banner {
  background: linear-gradient(135deg, #2979ff 0%, #1565c0 100%);
  border-radius: 16px;
  padding: 40px;
  display: flex;
  align-items: center;
  gap: 40px;
  margin-bottom: 60px;
}

.banner-content {
  flex: 1;
}

.banner-content h2 {
  color: white;
  font-size: 32px;
  margin-bottom: 15px;
}

.banner-content p {
  color: rgba(255, 255, 255, 0.9);
  font-size: 18px;
  margin-bottom: 25px;
}

.banner-btn {
  display: inline-block;
  padding: 15px 30px;
  background: white;
  color: #2979ff;
  text-decoration: none;
  border-radius: 8px;
  font-weight: 600;
  transition: transform 0.3s ease;
}

.banner-btn:hover {
  transform: translateY(-2px);
}

.banner-image {
  flex: 0 0 300px;
}

.banner-image img {
  width: 100%;
  border-radius: 12px;
}

.promo-terms {
  background: #262420;
  border-radius: 16px;
  padding: 40px;
}

.promo-terms h2 {
  color: white;
  font-size: 24px;
  margin-bottom: 25px;
  text-align: center;
}

.promo-terms ul {
  list-style: none;
  padding: 0;
}

.promo-terms li {
  color: #b0b0b0;
  font-size: 16px;
  padding: 12px 0;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.promo-terms li:last-child {
  border-bottom: none;
}

.promo-terms li::before {
  content: '• ';
  color: #2979ff;
  font-weight: bold;
}

@media (max-width: 768px) {
  .page-title {
    font-size: 36px;
  }
  
  .promotions-grid {
    grid-template-columns: 1fr;
  }
  
  .promo-banner {
    flex-direction: column;
    text-align: center;
  }
  
  .banner-image {
    flex: none;
    width: 100%;
  }
}
</style>