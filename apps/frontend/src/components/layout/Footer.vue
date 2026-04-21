<template>
  <footer class="footer">
    <div class="container">
      <div class="footer-content">
        <div class="footer-section">
          <h3>Ярко Парк</h3>
          <p>Парк развлечений для всей семьи</p>
        </div>
        <div class="footer-section">
          <h4>Локации</h4>
          <ul>
            <li><router-link to="/trampoline-park">Батутный парк</router-link></li>
            <li><router-link to="/ski-slope">Горнолыжный склон</router-link></li>
            <li><router-link to="/wakeboarding">Вейкбординг</router-link></li>
          </ul>
        </div>
        <div class="footer-section">
          <h4>Контакты</h4>
          <p>Телефон: +7-999-000-00-00</p>
          <p>Email: info@yarko-park.ru</p>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2026 Ярко Парк. Все права защищены.</p>
      </div>
    </div>
  </footer>
</template>

<style scoped>
.footer {
  background: #1a1a1a;
  color: white;
  padding: 40px 0 20px;
  margin-top: auto;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

.footer-content {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 40px;
  margin-bottom: 40px;
}

.footer-section h3 {
  font-size: 20px;
  margin-bottom: 15px;
  color: #2979ff;
}

.footer-section h4 {
  font-size: 16px;
  margin-bottom: 15px;
  color: #ccc;
}

.footer-section p {
  color: #888;
  line-height: 1.6;
  margin-bottom: 10px;
}

.footer-section ul {
  list-style: none;
  padding: 0;
}

.footer-section ul li {
  color: #888;
  margin-bottom: 8px;
}

.footer-section ul li a {
  color: #888;
  text-decoration: none;
  transition: color 0.3s ease;
}

.footer-section ul li a:hover {
  color: #2979ff;
}

.footer-bottom {
  border-top: 1px solid #333;
  padding-top: 20px;
  text-align: center;
  color: #666;
}
</style>