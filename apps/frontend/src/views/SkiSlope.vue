<template>
  <div class="ski-page">
    <!-- Hero Section -->
    <section class="hero">
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <h1 class="hero-title">⛷️ Горнолыжный склон "Ярко Парк"</h1>
        <p class="hero-subtitle">Покоряйте вершины! Лучший горнолыжный склон в городе</p>
        <div class="hero-buttons">
          <router-link to="/booking" class="btn-primary">Забронировать</router-link>
          <router-link to="/prices" class="btn-secondary">Смотреть цены</router-link>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="features">
      <div class="container">
        <h2 class="section-title">Почему выбирают нас?</h2>
        <div class="features-grid">
          <div class="feature-card">
            <div class="feature-icon">🏔️</div>
            <h3>Искусственный склон</h3>
            <p>Современный искусственный склон с различными уровнями сложности</p>
          </div>
          <div class="feature-card">
            <div class="feature-icon">🎿</div>
            <h3>Прокат оборудования</h3>
            <p>Полный комплект профессионального горнолыжного снаряжения</p>
          </div>
          <div class="feature-card">
            <div class="feature-icon">👨‍🏫</div>
            <h3>Инструкторы</h3>
            <p>Опытные инструкторы для всех уровней подготовки</p>
          </div>
          <div class="feature-card">
            <div class="feature-icon">☕</div>
            <h3>Теплые комнаты</h3>
            <p>Уютные комнаты отдыха с горячими напитками</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing">
      <div class="container">
        <h2 class="section-title">Наши тарифы</h2>
        <div class="pricing-grid">
          <div class="price-card">
            <div class="price-header">
              <h3>1 спуск</h3>
              <div class="price">300 ₽</div>
            </div>
            <ul class="price-features">
              <li>✓ 1 спуск с любого склона</li>
              <li>✓ Прокат лыж и ботинок</li>
              <li>✓ Шлем в комплекте</li>
              <li>✓ Инструктаж безопасности</li>
            </ul>
            <router-link to="/booking" class="price-btn">Забронировать</router-link>
          </div>
          
          <div class="price-card popular">
            <div class="popular-badge">Популярный</div>
            <div class="price-header">
              <h3>Абонемент 10 спусков</h3>
              <div class="price">2500 ₽</div>
            </div>
            <ul class="price-features">
              <li>✓ 10 спусков с любого склона</li>
              <li>✓ Прокат лыж и ботинок</li>
              <li>✓ Шлем в комплекте</li>
              <li>✓ Инструктаж безопасности</li>
              <li>✓ Скидка 17%</li>
            </ul>
            <router-link to="/booking" class="price-btn">Забронировать</router-link>
          </div>
          
          <div class="price-card">
            <div class="price-header">
              <h3>Дневной абонемент</h3>
              <div class="price">1500 ₽</div>
            </div>
            <ul class="price-features">
              <li>✓ Безлимитные спуски</li>
              <li>✓ Прокат лыж и ботинок</li>
              <li>✓ Шлем в комплекте</li>
              <li>✓ Инструктаж безопасности</li>
              <li>✓ Приоритетный вход</li>
            </ul>
            <router-link to="/booking" class="price-btn">Забронировать</router-link>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section class="contact">
      <div class="container">
        <h2 class="section-title">Контакты</h2>
        <div class="contact-grid">
          <div class="contact-info">
            <div class="contact-item">
              <div class="contact-icon">📍</div>
              <div>
                <h4>Адрес</h4>
                <p>г. Москва, ул. Горная, д. 5</p>
                <p>ТЦ "Яркий Парк", 2 этаж</p>
              </div>
            </div>
            <div class="contact-item">
              <div class="contact-icon">📞</div>
              <div>
                <h4>Телефон</h4>
                <p>+7 (999) 222-33-44</p>
                <p>Бесплатно по России</p>
              </div>
            </div>
            <div class="contact-item">
              <div class="contact-icon">🕐</div>
              <div>
                <h4>Режим работы</h4>
                <p>Пн-Пт: 10:00 - 21:00</p>
                <p>Сб-Вс: 09:00 - 22:00</p>
              </div>
            </div>
            <div class="contact-item">
              <div class="contact-icon">✉️</div>
              <div>
                <h4>Email</h4>
                <p>ski@yarko-park.ru</p>
                <p>Ответим в течение 24 часов</p>
              </div>
            </div>
          </div>
          <div class="contact-map">
            <div class="map-placeholder">
              <div class="map-icon">🗺️</div>
              <h4>Карта проезда</h4>
              <p>г. Москва, ул. Горная, д. 5</p>
              <p>ТЦ "Яркий Парк", 2 этаж</p>
              <button class="map-btn">Открыть в Яндекс.Картах</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
      <div class="container">
        <h2>Готовы кататься?</h2>
        <p>Забронируйте время прямо сейчас и получите скидку 10% на первое посещение!</p>
        <router-link to="/booking" class="cta-btn">Забронировать сейчас</router-link>
      </div>
    </section>
  </div>
</template>

<script setup lang="ts">
</script>

<style scoped>
.ski-page {
  min-height: 100vh;
  background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

/* Hero Section */
.hero {
  height: 100vh;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  background: linear-gradient(135deg, #262420 0%, #1a1a1a 100%);
}

.hero-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.5);
  z-index: 1;
}

.hero-content {
  position: relative;
  z-index: 2;
  color: white;
  padding: 40px;
}

.hero-title {
  font-size: 64px;
  margin-bottom: 20px;
  text-transform: uppercase;
  letter-spacing: 2px;
  text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
}

.hero-subtitle {
  font-size: 24px;
  margin-bottom: 40px;
  opacity: 0.9;
  text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
}

.hero-buttons {
  display: flex;
  gap: 20px;
  justify-content: center;
  flex-wrap: wrap;
}

.btn-primary,
.btn-secondary {
  display: inline-block;
  padding: 15px 30px;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 600;
  font-size: 16px;
  transition: all 0.3s ease;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.btn-primary {
  background: #2979ff;
  color: white;
}

.btn-primary:hover {
  background: #1565c0;
  transform: translateY(-2px);
}

.btn-secondary {
  background: transparent;
  color: white;
  border: 2px solid white;
}

.btn-secondary:hover {
  background: white;
  color: #1a1a1a;
}

/* Features Section */
.features {
  padding: 80px 0;
  background: #262420;
}

.section-title {
  text-align: center;
  color: white;
  font-size: 48px;
  margin-bottom: 50px;
  text-transform: uppercase;
  letter-spacing: 2px;
}

.features-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 30px;
}

.feature-card {
  background: #1a1a1a;
  padding: 30px;
  border-radius: 16px;
  text-align: center;
  transition: transform 0.3s ease;
}

.feature-card:hover {
  transform: translateY(-5px);
}

.feature-icon {
  font-size: 50px;
  margin-bottom: 20px;
}

.feature-card h3 {
  color: white;
  font-size: 24px;
  margin-bottom: 15px;
}

.feature-card p {
  color: #b0b0b0;
  font-size: 16px;
  line-height: 1.6;
}

/* Pricing Section */
.pricing {
  padding: 80px 0;
  background: #1a1a1a;
}

.pricing-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
  max-width: 1000px;
  margin: 0 auto;
}

.price-card {
  background: #262420;
  border-radius: 16px;
  padding: 30px;
  text-align: center;
  position: relative;
  transition: transform 0.3s ease;
}

.price-card:hover {
  transform: translateY(-5px);
}

.price-card.popular {
  border: 2px solid #2979ff;
  transform: scale(1.05);
}

.popular-badge {
  position: absolute;
  top: -15px;
  left: 50%;
  transform: translateX(-50%);
  background: #2979ff;
  color: white;
  padding: 8px 20px;
  border-radius: 20px;
  font-size: 14px;
  font-weight: 600;
  text-transform: uppercase;
}

.price-header {
  margin-bottom: 30px;
}

.price-header h3 {
  color: white;
  font-size: 24px;
  margin-bottom: 15px;
}

.price {
  color: #2979ff;
  font-size: 48px;
  font-weight: 700;
}

.price-features {
  list-style: none;
  padding: 0;
  margin-bottom: 30px;
}

.price-features li {
  color: #b0b0b0;
  font-size: 16px;
  padding: 10px 0;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.price-btn {
  display: block;
  width: 100%;
  padding: 15px;
  background: #2979ff;
  color: white;
  text-decoration: none;
  border-radius: 8px;
  font-weight: 600;
  transition: background 0.3s ease;
}

.price-btn:hover {
  background: #1565c0;
}

/* Contact Section */
.contact {
  padding: 80px 0;
  background: #262420;
}

.contact-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 40px;
}

.contact-info {
  display: flex;
  flex-direction: column;
  gap: 25px;
}

.contact-item {
  display: flex;
  align-items: flex-start;
  gap: 20px;
}

.contact-icon {
  font-size: 30px;
  background: rgba(255, 255, 255, 0.1);
  padding: 15px;
  border-radius: 50%;
  min-width: 60px;
  text-align: center;
}

.contact-item h4 {
  color: white;
  font-size: 18px;
  margin-bottom: 5px;
}

.contact-item p {
  color: #b0b0b0;
  font-size: 16px;
  margin-bottom: 3px;
}

.contact-map {
  background: #1a1a1a;
  border-radius: 16px;
  overflow: hidden;
}

.map-placeholder {
  height: 100%;
  min-height: 300px;
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

.map-placeholder h4 {
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

/* CTA Section */
.cta {
  padding: 80px 0;
  background: linear-gradient(135deg, #2979ff 0%, #1565c0 100%);
  text-align: center;
}

.cta h2 {
  color: white;
  font-size: 48px;
  margin-bottom: 20px;
  text-transform: uppercase;
  letter-spacing: 2px;
}

.cta p {
  color: rgba(255, 255, 255, 0.9);
  font-size: 20px;
  margin-bottom: 30px;
}

.cta-btn {
  display: inline-block;
  padding: 18px 40px;
  background: white;
  color: #2979ff;
  text-decoration: none;
  border-radius: 8px;
  font-weight: 600;
  font-size: 18px;
  transition: transform 0.3s ease;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.cta-btn:hover {
  transform: translateY(-3px);
}

/* Responsive Design */
@media (max-width: 768px) {
  .hero-title {
    font-size: 36px;
  }
  
  .hero-subtitle {
    font-size: 18px;
  }
  
  .section-title {
    font-size: 36px;
  }
  
  .contact-grid {
    grid-template-columns: 1fr;
  }
  
  .hero-buttons {
    flex-direction: column;
    align-items: center;
  }
  
  .btn-primary,
  .btn-secondary {
    width: 100%;
    max-width: 300px;
  }
}

@media (max-width: 480px) {
  .hero-title {
    font-size: 28px;
  }
  
  .hero-subtitle {
    font-size: 16px;
  }
  
  .section-title {
    font-size: 28px;
  }
  
  .price-card.popular {
    transform: none;
  }
}
</style>