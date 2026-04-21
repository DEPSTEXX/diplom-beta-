<template>
  <div class="trampoline-page">
    <!-- Hero Section -->
    <section class="hero">
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <h1 class="hero-title">🎯 Батутный парк "Ярко Парк"</h1>
        <p class="hero-subtitle">Прыгай выше облаков! Лучший батутный парк в городе</p>
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
            <div class="feature-icon">🎯</div>
            <h3>Более 50 батутов</h3>
            <p>Профессиональные батуты разных размеров для прыжков любой сложности</p>
          </div>
          <div class="feature-card">
            <div class="feature-icon">🛡️</div>
            <h3>Безопасность</h3>
            <p>Сертифицированное оборудование и профессиональные инструкторы</p>
          </div>
          <div class="feature-card">
            <div class="feature-icon">🎪</div>
            <h3>Развлечения</h3>
            <p>Ниндзя-парк, скалодром, бассейн с губками и многое другое</p>
          </div>
          <div class="feature-card">
            <div class="feature-icon">🍕</div>
            <h3>Кафе</h3>
            <p>Уютное кафе с вкусной едой и напитками для всей семьи</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Zones Section -->
    <section class="zones">
      <div class="container">
        <h2 class="section-title">Наши зоны</h2>
        <div class="zones-grid">
          <div class="zone-card">
            <div class="zone-image">
              <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=600&h=400&fit=crop" alt="Батутная арена">
            </div>
            <div class="zone-content">
              <h3>Батутная арена</h3>
              <p>Большая площадка с профессиональными батутами для свободных прыжков и трюков</p>
              <ul>
                <li>Площадь: 500 м²</li>
                <li>Высота прыжков: до 3 метров</li>
                <li>Возраст: от 5 лет</li>
              </ul>
            </div>
          </div>
          
          <div class="zone-card">
            <div class="zone-image">
              <img src="https://images.unsplash.com/photo-1551698618-1dfe5d97d256?w=600&h=400&fit=crop" alt="Ниндзя-парк">
            </div>
            <div class="zone-content">
              <h3>Ниндзя-парк</h3>
              <p>Полоса препятствий для настоящих воинов с разными уровнями сложности</p>
              <ul>
                <li>20+ препятствий</li>
                <li>3 уровня сложности</li>
                <li>Таймер прохождения</li>
              </ul>
            </div>
          </div>
          
          <div class="zone-card">
            <div class="zone-image">
              <img src="https://images.unsplash.com/photo-1530549387789-4c1017266635?w=600&h=400&fit=crop" alt="Детская зона">
            </div>
            <div class="zone-content">
              <h3>Детская зона</h3>
              <p>Безопасная игровая площадка для малышей с мягкими батутами и игрушками</p>
              <ul>
                <li>Возраст: от 2 до 7 лет</li>
                <li>Мягкое покрытие</li>
                <li>Безопасные игрушки</li>
              </ul>
            </div>
          </div>
          
          <div class="zone-card">
            <div class="zone-image">
              <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=600&h=400&fit=crop" alt="Бассейн с губками">
            </div>
            <div class="zone-content">
              <h3>Бассейн с губками</h3>
              <p>Мягкий бассейн с поролоновыми кубиками для безопасных приземлений</p>
              <ul>
                <li>Глубина: 1.5 метра</li>
                <li>10 000+ губок</li>
                <li>Идеально для трюков</li>
              </ul>
            </div>
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
              <h3>Час прыжков</h3>
              <div class="price">800 ₽</div>
            </div>
            <ul class="price-features">
              <li>✓ 1 час прыжков</li>
              <li>✓ Все зоны парка</li>
              <li>✓ Носки в подарок</li>
              <li>✓ Инструктаж</li>
            </ul>
            <router-link to="/booking" class="price-btn">Забронировать</router-link>
          </div>
          
          <div class="price-card popular">
            <div class="popular-badge">Популярный</div>
            <div class="price-header">
              <h3>2 часа прыжков</h3>
              <div class="price">1400 ₽</div>
            </div>
            <ul class="price-features">
              <li>✓ 2 часа прыжков</li>
              <li>✓ Все зоны парка</li>
              <li>✓ Носки в подарок</li>
              <li>✓ Инструктаж</li>
              <li>✓ Скидка 15%</li>
            </ul>
            <router-link to="/booking" class="price-btn">Забронировать</router-link>
          </div>
          
          <div class="price-card">
            <div class="price-header">
              <h3>Безлимит</h3>
              <div class="price">2000 ₽</div>
            </div>
            <ul class="price-features">
              <li>✓ Безлимит прыжков</li>
              <li>✓ Все зоны парка</li>
              <li>✓ Носки в подарок</li>
              <li>✓ Инструктаж</li>
              <li>✓ Приоритетный вход</li>
            </ul>
            <router-link to="/booking" class="price-btn">Забронировать</router-link>
          </div>
        </div>
      </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery">
      <div class="container">
        <h2 class="section-title">Галерея</h2>
        <div class="gallery-grid">
          <div class="gallery-item">
            <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=400&h=300&fit=crop" alt="Прыжки на батуте">
          </div>
          <div class="gallery-item">
            <img src="https://images.unsplash.com/photo-1551698618-1dfe5d97d256?w=400&h=300&fit=crop" alt="Ниндзя-парк">
          </div>
          <div class="gallery-item">
            <img src="https://images.unsplash.com/photo-1530549387789-4c1017266635?w=400&h=300&fit=crop" alt="Дети прыгают">
          </div>
          <div class="gallery-item">
            <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=400&h=300&fit=crop" alt="Бассейн с губками">
          </div>
          <div class="gallery-item">
            <img src="https://images.unsplash.com/photo-1551698618-1dfe5d97d256?w=400&h=300&fit=crop" alt="Скалодром">
          </div>
          <div class="gallery-item">
            <img src="https://images.unsplash.com/photo-1530549387789-4c1017266635?w=400&h=300&fit=crop" alt="Кафе">
          </div>
        </div>
      </div>
    </section>

    <!-- Reviews Section -->
    <section class="reviews">
      <div class="container">
        <h2 class="section-title">Отзывы</h2>
        <div class="reviews-grid">
          <div class="review-card">
            <div class="review-header">
              <div class="review-avatar">👨‍👩‍👧‍👦</div>
              <div class="review-info">
                <h4>Семья Ивановых</h4>
                <div class="review-rating">⭐⭐⭐⭐⭐</div>
              </div>
            </div>
            <p>"Отличное место для семейного отдыха! Дети в восторге, а родители могут отдохнуть в кафе. Обязательно вернемся!"</p>
          </div>
          
          <div class="review-card">
            <div class="review-header">
              <div class="review-avatar">👩</div>
              <div class="review-info">
                <h4>Анна Петрова</h4>
                <div class="review-rating">⭐⭐⭐⭐⭐</div>
              </div>
            </div>
            <p>"Провели день рождения дочери - все было организовано на высшем уровне! Аниматоры, торт, прыжки - лучший праздник!"</p>
          </div>
          
          <div class="review-card">
            <div class="review-header">
              <div class="review-avatar">👨</div>
              <div class="review-info">
                <h4>Максим Козлов</h4>
                <div class="review-rating">⭐⭐⭐⭐⭐</div>
              </div>
            </div>
            <p>"Тренируюсь здесь каждый день! Отличные батуты, профессиональное оборудование. Рекомендую всем спортсменам!"</p>
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
                <p>г. Москва, ул. Спортивная, д. 1</p>
                <p>ТЦ "Яркий Парк", 3 этаж</p>
              </div>
            </div>
            <div class="contact-item">
              <div class="contact-icon">📞</div>
              <div>
                <h4>Телефон</h4>
                <p>+7 (999) 111-22-33</p>
                <p>Бесплатно по России</p>
              </div>
            </div>
            <div class="contact-item">
              <div class="contact-icon">🕐</div>
              <div>
                <h4>Режим работы</h4>
                <p>Пн-Пт: 10:00 - 22:00</p>
                <p>Сб-Вс: 09:00 - 23:00</p>
              </div>
            </div>
            <div class="contact-item">
              <div class="contact-icon">✉️</div>
              <div>
                <h4>Email</h4>
                <p>info@yarko-park.ru</p>
                <p>Ответим в течение 24 часов</p>
              </div>
            </div>
          </div>
          <div class="contact-map">
            <div class="map-placeholder">
              <div class="map-icon">🗺️</div>
              <h4>Карта проезда</h4>
              <p>г. Москва, ул. Спортивная, д. 1</p>
              <p>ТЦ "Яркий Парк", 3 этаж</p>
              <button class="map-btn">Открыть в Яндекс.Картах</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
      <div class="container">
        <h2>Готовы прыгать?</h2>
        <p>Забронируйте время прямо сейчас и получите скидку 10% на первое посещение!</p>
        <router-link to="/booking" class="cta-btn">Забронировать сейчас</router-link>
      </div>
    </section>
  </div>
</template>

<script setup lang="ts">
</script>

<style scoped>
.trampoline-page {
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

/* Zones Section */
.zones {
  padding: 80px 0;
  background: #1a1a1a;
}

.zones-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
}

.zone-card {
  background: #262420;
  border-radius: 16px;
  overflow: hidden;
  transition: transform 0.3s ease;
}

.zone-card:hover {
  transform: translateY(-5px);
}

.zone-image {
  height: 200px;
  overflow: hidden;
}

.zone-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.zone-card:hover .zone-image img {
  transform: scale(1.05);
}

.zone-content {
  padding: 25px;
}

.zone-content h3 {
  color: white;
  font-size: 24px;
  margin-bottom: 15px;
}

.zone-content p {
  color: #b0b0b0;
  font-size: 16px;
  line-height: 1.6;
  margin-bottom: 20px;
}

.zone-content ul {
  color: #b0b0b0;
  font-size: 14px;
  line-height: 1.8;
  padding-left: 20px;
}

/* Pricing Section */
.pricing {
  padding: 80px 0;
  background: #262420;
}

.pricing-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
  max-width: 1000px;
  margin: 0 auto;
}

.price-card {
  background: #1a1a1a;
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

/* Gallery Section */
.gallery {
  padding: 80px 0;
  background: #1a1a1a;
}

.gallery-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 20px;
}

.gallery-item {
  border-radius: 12px;
  overflow: hidden;
  transition: transform 0.3s ease;
}

.gallery-item:hover {
  transform: scale(1.05);
}

.gallery-item img {
  width: 100%;
  height: 250px;
  object-fit: cover;
}

/* Reviews Section */
.reviews {
  padding: 80px 0;
  background: #262420;
}

.reviews-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
}

.review-card {
  background: #1a1a1a;
  padding: 30px;
  border-radius: 16px;
}

.review-header {
  display: flex;
  align-items: center;
  gap: 15px;
  margin-bottom: 20px;
}

.review-avatar {
  font-size: 40px;
}

.review-info h4 {
  color: white;
  font-size: 18px;
  margin-bottom: 5px;
}

.review-rating {
  color: #ffc107;
  font-size: 16px;
}

.review-card p {
  color: #b0b0b0;
  font-size: 16px;
  line-height: 1.6;
  font-style: italic;
}

/* Contact Section */
.contact {
  padding: 80px 0;
  background: #1a1a1a;
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
  background: #262420;
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