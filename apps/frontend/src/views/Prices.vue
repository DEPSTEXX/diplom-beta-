<template>
  <div class="prices-page">
    <div class="container">
      <h1 class="page-title">Прайс-лист</h1>
      <p class="page-subtitle">Выберите подходящий тариф для вашего отдыха</p>
      
      <div class="prices-grid">
        <!-- Батутный парк -->
        <div class="price-card">
          <div class="price-header">
            <h3>🎯 Батутный парк</h3>
            <div class="price-badge">Популярное</div>
          </div>
          <div class="price-list">
            <div class="price-item">
              <span class="service">1 час прыжков</span>
              <span class="price">800 ₽</span>
            </div>
            <div class="price-item">
              <span class="service">2 часа прыжков</span>
              <span class="price">1400 ₽</span>
            </div>
            <div class="price-item">
              <span class="service">Безлимит на день</span>
              <span class="price">2000 ₽</span>
            </div>
            <div class="price-item">
              <span class="service">Ниндзя-полоса</span>
              <span class="price">500 ₽</span>
            </div>
            <div class="price-item">
              <span class="service">Детская зона (3-7 лет)</span>
              <span class="price">400 ₽/час</span>
            </div>
          </div>
          <router-link to="/booking" class="book-btn">Забронировать</router-link>
        </div>

        <!-- Горнолыжный склон -->
        <div class="price-card">
          <div class="price-header">
            <h3>⛷️ Горнолыжный склон</h3>
            <div class="price-badge">Сезон</div>
          </div>
          <div class="price-list">
            <div class="price-item">
              <span class="service">Спуск (1 раз)</span>
              <span class="price">300 ₽</span>
            </div>
            <div class="price-item">
              <span class="service">Абонемент 10 спусков</span>
              <span class="price">2500 ₽</span>
            </div>
            <div class="price-item">
              <span class="service">Прокат оборудования</span>
              <span class="price">800 ₽/день</span>
            </div>
            <div class="price-item">
              <span class="service">Инструктор</span>
              <span class="price">1500 ₽/час</span>
            </div>
            <div class="price-item">
              <span class="service">Ночное катание</span>
              <span class="price">500 ₽/час</span>
            </div>
          </div>
          <router-link to="/booking" class="book-btn">Забронировать</router-link>
        </div>

        <!-- Вейкбординг -->
        <div class="price-card">
          <div class="price-header">
            <h3>🏄 Вейкбординг</h3>
            <div class="price-badge">Лето</div>
          </div>
          <div class="price-list">
            <div class="price-item">
              <span class="service">1 катание (15 мин)</span>
              <span class="price">600 ₽</span>
            </div>
            <div class="price-item">
              <span class="service">3 катания</span>
              <span class="price">1500 ₽</span>
            </div>
            <div class="price-item">
              <span class="service">Час катания</span>
              <span class="price">2000 ₽</span>
            </div>
            <div class="price-item">
              <span class="service">Прокат гидрокостюма</span>
              <span class="price">300 ₽</span>
            </div>
            <div class="price-item">
              <span class="service">Обучение</span>
              <span class="price">1000 ₽/час</span>
            </div>
          </div>
          <router-link to="/booking" class="book-btn">Забронировать</router-link>
        </div>
      </div>

      <!-- Дополнительные услуги -->
      <div class="additional-services">
        <h2>Дополнительные услуги</h2>
        <div class="services-grid">
          <div class="service-item">
            <div class="service-icon">🎉</div>
            <h4>День рождения</h4>
            <p>Организация праздника до 10 человек</p>
            <span class="service-price">5000 ₽</span>
          </div>
          <div class="service-item">
            <div class="service-icon">👥</div>
            <h4>Корпоратив</h4>
            <p>Мероприятие до 20 человек</p>
            <span class="service-price">15000 ₽</span>
          </div>
          <div class="service-item">
            <div class="service-icon">📸</div>
            <h4>Фотосессия</h4>
            <p>Профессиональная съемка</p>
            <span class="service-price">3000 ₽</span>
          </div>
          <div class="service-item">
            <div class="service-icon">🍽️</div>
            <h4>Кафе</h4>
            <p>Напитки и закуски</p>
            <span class="service-price">от 200 ₽</span>
          </div>
        </div>
      </div>

      <!-- Скидки -->
      <div class="discounts-section">
        <h2>Скидки и акции</h2>
        <div class="discounts-list">
          <div class="discount-item">
            <span class="discount-badge">-20%</span>
            <div class="discount-info">
              <h4>Утренний тариф</h4>
              <p>Пн-Пт с 10:00 до 12:00</p>
            </div>
          </div>
          <div class="discount-item">
            <span class="discount-badge">-15%</span>
            <div class="discount-info">
              <h4>Студенческая скидка</h4>
              <p>При предъявлении студенческого</p>
            </div>
          </div>
          <div class="discount-item">
            <span class="discount-badge">-30%</span>
            <div class="discount-info">
              <h4>Детский день</h4>
              <p>Каждое воскресенье для детей до 12 лет</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
</script>

<style scoped>
.prices-page {
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

.prices-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 30px;
  margin-bottom: 60px;
}

.price-card {
  background: #262420;
  border-radius: 16px;
  padding: 30px;
  position: relative;
  overflow: hidden;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.price-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.price-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 25px;
}

.price-header h3 {
  color: white;
  font-size: 24px;
  margin: 0;
}

.price-badge {
  background: #2979ff;
  color: white;
  padding: 5px 12px;
  border-radius: 20px;
  font-size: 12px;
  font-weight: 600;
  text-transform: uppercase;
}

.price-list {
  margin-bottom: 30px;
}

.price-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 0;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.price-item:last-child {
  border-bottom: none;
}

.service {
  color: #b0b0b0;
  font-size: 16px;
}

.price {
  color: white;
  font-size: 18px;
  font-weight: 600;
}

.book-btn {
  display: block;
  width: 100%;
  padding: 15px;
  background: #2979ff;
  color: white;
  text-align: center;
  text-decoration: none;
  border-radius: 8px;
  font-weight: 600;
  transition: background 0.3s ease;
}

.book-btn:hover {
  background: #1565c0;
}

.additional-services {
  margin-bottom: 60px;
}

.additional-services h2 {
  text-align: center;
  color: white;
  font-size: 36px;
  margin-bottom: 40px;
}

.services-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 25px;
}

.service-item {
  background: #262420;
  border-radius: 12px;
  padding: 25px;
  text-align: center;
  transition: transform 0.3s ease;
}

.service-item:hover {
  transform: translateY(-3px);
}

.service-icon {
  font-size: 40px;
  margin-bottom: 15px;
}

.service-item h4 {
  color: white;
  font-size: 20px;
  margin-bottom: 10px;
}

.service-item p {
  color: #b0b0b0;
  font-size: 14px;
  margin-bottom: 15px;
}

.service-price {
  color: #2979ff;
  font-size: 18px;
  font-weight: 600;
}

.discounts-section {
  background: #262420;
  border-radius: 16px;
  padding: 40px;
}

.discounts-section h2 {
  text-align: center;
  color: white;
  font-size: 36px;
  margin-bottom: 40px;
}

.discounts-list {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 25px;
}

.discount-item {
  display: flex;
  align-items: center;
  gap: 20px;
  background: rgba(255, 255, 255, 0.05);
  border-radius: 12px;
  padding: 20px;
}

.discount-badge {
  background: #4caf50;
  color: white;
  padding: 10px 15px;
  border-radius: 8px;
  font-size: 18px;
  font-weight: 700;
  min-width: 60px;
  text-align: center;
}

.discount-info h4 {
  color: white;
  font-size: 18px;
  margin-bottom: 5px;
}

.discount-info p {
  color: #b0b0b0;
  font-size: 14px;
  margin: 0;
}

@media (max-width: 768px) {
  .page-title {
    font-size: 36px;
  }
  
  .prices-grid {
    grid-template-columns: 1fr;
  }
  
  .services-grid {
    grid-template-columns: 1fr;
  }
  
  .discounts-list {
    grid-template-columns: 1fr;
  }
}
</style>