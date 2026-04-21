<template>
  <div class="certificates-page">
    <div class="container">
      <h1 class="page-title">Сертификаты</h1>
      <p class="page-subtitle">Подарочные сертификаты на яркие впечатления</p>
      
      <div class="certificates-grid">
        <!-- Сертификат 1 -->
        <div class="certificate-card">
          <div class="certificate-header">
            <div class="certificate-icon">🎁</div>
            <div class="certificate-badge">Популярный</div>
          </div>
          <div class="certificate-content">
            <h3>Сертификат на 1 час</h3>
            <p>Идеальный подарок для тех, кто хочет попробовать батутный парк</p>
            <div class="certificate-features">
              <span>✓ 1 час прыжков</span>
              <span>✓ Все зоны парка</span>
              <span>✓ Носки в подарок</span>
            </div>
            <div class="certificate-price">
              <span class="price">800 ₽</span>
              <span class="old-price">1000 ₽</span>
            </div>
            <button class="certificate-btn">Купить сертификат</button>
          </div>
        </div>

        <!-- Сертификат 2 -->
        <div class="certificate-card">
          <div class="certificate-header">
            <div class="certificate-icon">🎯</div>
            <div class="certificate-badge">Хит</div>
          </div>
          <div class="certificate-content">
            <h3>Сертификат на 2 часа</h3>
            <p>Отличный выбор для полноценного отдыха с друзьями</p>
            <div class="certificate-features">
              <span>✓ 2 часа прыжков</span>
              <span>✓ Все зоны парка</span>
              <span>✓ Носки в подарок</span>
              <span>✓ Скидка 15%</span>
            </div>
            <div class="certificate-price">
              <span class="price">1400 ₽</span>
              <span class="old-price">1800 ₽</span>
            </div>
            <button class="certificate-btn">Купить сертификат</button>
          </div>
        </div>

        <!-- Сертификат 3 -->
        <div class="certificate-card">
          <div class="certificate-header">
            <div class="certificate-icon">⭐</div>
            <div class="certificate-badge">Премиум</div>
          </div>
          <div class="certificate-content">
            <h3>Безлимитный сертификат</h3>
            <p>Для настоящих любителей батутов - неограниченное время</p>
            <div class="certificate-features">
              <span>✓ Безлимит прыжков</span>
              <span>✓ Все зоны парка</span>
              <span>✓ Носки в подарок</span>
              <span>✓ Приоритетный вход</span>
              <span>✓ Скидка 20%</span>
            </div>
            <div class="certificate-price">
              <span class="price">2000 ₽</span>
              <span class="old-price">2500 ₽</span>
            </div>
            <button class="certificate-btn">Купить сертификат</button>
          </div>
        </div>

        <!-- Сертификат 4 -->
        <div class="certificate-card">
          <div class="certificate-header">
            <div class="certificate-icon">👨‍👩‍👧‍👦</div>
            <div class="certificate-badge">Семейный</div>
          </div>
          <div class="certificate-content">
            <h3>Семейный сертификат</h3>
            <p>Для всей семьи - до 4 человек включительно</p>
            <div class="certificate-features">
              <span>✓ 2 часа прыжков</span>
              <span>✓ До 4 человек</span>
              <span>✓ Все зоны парка</span>
              <span>✓ Носки для всех</span>
              <span>✓ Общая скидка 25%</span>
            </div>
            <div class="certificate-price">
              <span class="price">3500 ₽</span>
              <span class="old-price">4500 ₽</span>
            </div>
            <button class="certificate-btn">Купить сертификат</button>
          </div>
        </div>

        <!-- Сертификат 5 -->
        <div class="certificate-card">
          <div class="certificate-header">
            <div class="certificate-icon">🎉</div>
            <div class="certificate-badge">Праздник</div>
          </div>
          <div class="certificate-content">
            <h3>День рождения</h3>
            <p>Организация праздника до 10 человек с аниматором</p>
            <div class="certificate-features">
              <span>✓ 3 часа прыжков</span>
              <span>✓ До 10 человек</span>
              <span>✓ Аниматор</span>
              <span>✓ Торт в подарок</span>
              <span>✓ Фотосессия</span>
            </div>
            <div class="certificate-price">
              <span class="price">8000 ₽</span>
              <span class="old-price">12000 ₽</span>
            </div>
            <button class="certificate-btn">Купить сертификат</button>
          </div>
        </div>

        <!-- Сертификат 6 -->
        <div class="certificate-card">
          <div class="certificate-header">
            <div class="certificate-icon">💑</div>
            <div class="certificate-badge">Романтика</div>
          </div>
          <div class="certificate-content">
            <h3>Романтический вечер</h3>
            <p>Ужин при свечах после активного отдыха</p>
            <div class="certificate-features">
              <span>✓ 2 часа прыжков</span>
              <span>✓ Романтический ужин</span>
              <span>✓ Винный сет</span>
              <span>✓ Приватная зона</span>
            </div>
            <div class="certificate-price">
              <span class="price">5000 ₽</span>
              <span class="old-price">7000 ₽</span>
            </div>
            <button class="certificate-btn">Купить сертификат</button>
          </div>
        </div>
      </div>

      <!-- Преимущества сертификатов -->
      <div class="certificates-benefits">
        <h2>Преимущества наших сертификатов</h2>
        <div class="benefits-grid">
          <div class="benefit-item">
            <div class="benefit-icon">📱</div>
            <h4>Удобный формат</h4>
            <p>Сертификат придет на email в виде красивой открытки</p>
          </div>
          <div class="benefit-item">
            <div class="benefit-icon">📅</div>
            <h4>Действует год</h4>
            <p>Сертификат можно использовать в течение года с момента покупки</p>
          </div>
          <div class="benefit-item">
            <div class="benefit-icon">🔄</div>
            <h4>Возврат</h4>
            <p>Возможность возврата в течение 30 дней без вопросов</p>
          </div>
          <div class="benefit-item">
            <div class="benefit-icon">💌</div>
            <h4>Персонализация</h4>
            <p>Можно добавить поздравление и имя получателя</p>
          </div>
        </div>
      </div>

      <!-- Как использовать -->
      <div class="how-to-use">
        <h2>Как использовать сертификат</h2>
        <div class="steps-grid">
          <div class="step-item">
            <div class="step-number">1</div>
            <h4>Покупка</h4>
            <p>Выберите сертификат и оплатите онлайн</p>
          </div>
          <div class="step-item">
            <div class="step-number">2</div>
            <h4>Получение</h4>
            <p>Сертификат придет на ваш email</p>
          </div>
          <div class="step-item">
            <div class="step-number">3</div>
            <h4>Подарок</h4>
            <p>Передайте сертификат получателю</p>
          </div>
          <div class="step-item">
            <div class="step-number">4</div>
            <h4>Использование</h4>
            <p>Покажите сертификат на кассе</p>
          </div>
        </div>
      </div>

      <!-- FAQ -->
      <div class="certificates-faq">
        <h2>Частые вопросы</h2>
        <div class="faq-list">
          <div class="faq-item">
            <h4>Можно ли использовать сертификат частями?</h4>
            <p>Нет, сертификат нужно использовать за одно посещение</p>
          </div>
          <div class="faq-item">
            <h4>Что делать, если сумма сертификата больше стоимости услуги?</h4>
            <p>Остаток можно использовать для покупки дополнительных услуг</p>
          </div>
          <div class="faq-item">
            <h4>Можно ли продлить срок действия сертификата?</h4>
            <p>Да, продление возможно за дополнительную плату</p>
          </div>
          <div class="faq-item">
            <h4>Что если я потерял сертификат?</h4>
            <p>Мы можем восстановить сертификат по номеру заказа</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
</script>

<style scoped>
.certificates-page {
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

.certificates-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 30px;
  margin-bottom: 60px;
}

.certificate-card {
  background: #262420;
  border-radius: 16px;
  overflow: hidden;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.certificate-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.certificate-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
  background: linear-gradient(135deg, #2979ff 0%, #1565c0 100%);
}

.certificate-icon {
  font-size: 40px;
}

.certificate-badge {
  background: rgba(255, 255, 255, 0.2);
  color: white;
  padding: 5px 12px;
  border-radius: 20px;
  font-size: 12px;
  font-weight: 600;
  text-transform: uppercase;
}

.certificate-content {
  padding: 25px;
}

.certificate-content h3 {
  color: white;
  font-size: 24px;
  margin-bottom: 15px;
}

.certificate-content p {
  color: #b0b0b0;
  font-size: 16px;
  line-height: 1.6;
  margin-bottom: 20px;
}

.certificate-features {
  margin-bottom: 20px;
}

.certificate-features span {
  display: block;
  color: #b0b0b0;
  font-size: 14px;
  padding: 5px 0;
}

.certificate-price {
  display: flex;
  align-items: center;
  gap: 15px;
  margin-bottom: 20px;
}

.price {
  color: white;
  font-size: 28px;
  font-weight: 700;
}

.old-price {
  color: #888;
  font-size: 18px;
  text-decoration: line-through;
}

.certificate-btn {
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

.certificate-btn:hover {
  background: #1565c0;
}

.certificates-benefits {
  background: #262420;
  border-radius: 16px;
  padding: 40px;
  margin-bottom: 60px;
}

.certificates-benefits h2 {
  text-align: center;
  color: white;
  font-size: 36px;
  margin-bottom: 40px;
}

.benefits-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 30px;
}

.benefit-item {
  text-align: center;
  padding: 20px;
}

.benefit-icon {
  font-size: 50px;
  margin-bottom: 15px;
}

.benefit-item h4 {
  color: white;
  font-size: 20px;
  margin-bottom: 10px;
}

.benefit-item p {
  color: #b0b0b0;
  font-size: 14px;
  line-height: 1.6;
}

.how-to-use {
  background: #262420;
  border-radius: 16px;
  padding: 40px;
  margin-bottom: 60px;
}

.how-to-use h2 {
  text-align: center;
  color: white;
  font-size: 36px;
  margin-bottom: 40px;
}

.steps-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 30px;
}

.step-item {
  text-align: center;
  padding: 20px;
}

.step-number {
  display: inline-block;
  width: 50px;
  height: 50px;
  background: #2979ff;
  color: white;
  border-radius: 50%;
  font-size: 24px;
  font-weight: 700;
  line-height: 50px;
  margin-bottom: 15px;
}

.step-item h4 {
  color: white;
  font-size: 20px;
  margin-bottom: 10px;
}

.step-item p {
  color: #b0b0b0;
  font-size: 14px;
  line-height: 1.6;
}

.certificates-faq {
  background: #262420;
  border-radius: 16px;
  padding: 40px;
}

.certificates-faq h2 {
  text-align: center;
  color: white;
  font-size: 36px;
  margin-bottom: 40px;
}

.faq-list {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
}

.faq-item {
  background: rgba(255, 255, 255, 0.05);
  border-radius: 12px;
  padding: 25px;
}

.faq-item h4 {
  color: white;
  font-size: 18px;
  margin-bottom: 10px;
}

.faq-item p {
  color: #b0b0b0;
  font-size: 14px;
  line-height: 1.6;
}

@media (max-width: 768px) {
  .page-title {
    font-size: 36px;
  }
  
  .certificates-grid {
    grid-template-columns: 1fr;
  }
  
  .benefits-grid {
    grid-template-columns: 1fr;
  }
  
  .steps-grid {
    grid-template-columns: 1fr;
  }
  
  .faq-list {
    grid-template-columns: 1fr;
  }
}
</style>