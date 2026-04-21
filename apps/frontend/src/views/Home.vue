<template>
  <div class="home-page">
    <!-- Header -->
    <header class="home-header">
      <div class="logo">
        <span class="logo-text">Ярко Парк</span>
      </div>
      <router-link to="/login" class="login-btn">Войти</router-link>
    </header>

    <!-- Main 3 Columns Section -->
    <main class="main-grid">
      <router-link to="/trampoline-park" class="column column-1">
        <div class="column-content">
          <h2 class="column-title">Батутный парк</h2>
          <p class="column-description">Много разных развлечений в парке</p>
          <span class="column-button">Открыть →</span>
        </div>
      </router-link>

      <router-link to="/ski-slope" class="column column-2">
        <div class="column-content">
          <h2 class="column-title">Горнолыжный склон</h2>
          <p class="column-description">Искусственный склон с 2 трассами</p>
          <span class="column-button">Открыть →</span>
        </div>
      </router-link>

      <router-link to="/wakeboarding" class="column column-3">
        <div class="column-content">
          <h2 class="column-title">Вейкбординг</h2>
          <p class="column-description">Катание на кабельной системе</p>
          <span class="column-button">Открыть →</span>
        </div>
      </router-link>
    </main>
  </div>
</template>

<script setup lang="ts">
</script>

<style scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.home-page {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  font-family: system-ui, -apple-system, sans-serif;
}

/* Header */
.home-header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 100;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px 40px;
  background: rgba(0, 0, 0, 0.7);
  backdrop-filter: blur(10px);
}

.logo {
  display: flex;
  align-items: center;
  gap: 10px;
  color: white;
  font-size: 22px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 2px;
}

.logo-icon {
  font-size: 28px;
}

.login-btn {
  padding: 10px 25px;
  background: transparent;
  border: 2px solid white;
  color: white;
  border-radius: 50px;
  text-decoration: none;
  font-size: 14px;
  font-weight: 600;
  transition: all 0.3s ease;
}

.login-btn:hover {
  background: white;
  color: #1a1a1a;
}

/* Main Grid */
.main-grid {
  flex: 1;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  min-height: 100vh;
}

.column {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  text-decoration: none;
  color: white;
  overflow: hidden;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.column::before {
  content: '';
  position: absolute;
  inset: 0;
  background-size: cover;
  background-position: center;
  transition: transform 0.6s ease;
}

.column-1::before {
  background-image: url('/батутка.jpg');
}

.column-2::before {
  background-image: url('/горнолыжка.jpg');
}

.column-3::before {
  background-image: url('/вейкбординг.jpg');
}

/* Затемнение поверх картинки чтобы текст был читаемым */
.column::after {
  content: '';
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.5);
  transition: background 0.3s ease;
}

.column:hover::after {
  background: rgba(0, 0, 0, 0.3);
}

.column:hover::before {
  transform: scale(1.1);
}

.column::after {
  content: '';
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.3);
  transition: background 0.3s ease;
}

.column:hover::after {
  background: rgba(0, 0, 0, 0.1);
}

.column-content {
  position: relative;
  z-index: 10;
  text-align: center;
  padding: 40px;
  transform: translateY(0);
  transition: transform 0.3s ease;
}

.column:hover .column-content {
  transform: translateY(-10px);
}

.column-icon {
  font-size: 80px;
  margin-bottom: 30px;
  display: block;
  transition: transform 0.3s ease;
}

.column:hover .column-icon {
  transform: scale(1.15);
}

.column-title {
  font-size: 32px;
  font-weight: 700;
  margin-bottom: 15px;
  text-transform: uppercase;
  letter-spacing: 2px;
}

.column-description {
  font-size: 16px;
  opacity: 0.9;
  margin-bottom: 40px;
  line-height: 1.5;
  max-width: 280px;
}

.column-button {
  display: inline-block;
  padding: 12px 35px;
  border: 2px solid white;
  border-radius: 50px;
  font-size: 14px;
  font-weight: 600;
  transition: all 0.3s ease;
  opacity: 0;
  transform: translateY(20px);
}

.column:hover .column-button {
  opacity: 1;
  transform: translateY(0);
}

.column-button:hover {
  background: white;
  color: #1a1a1a;
}

/* Responsive */
@media (max-width: 992px) {
  .main-grid {
    grid-template-columns: 1fr;
  }
  
  .column {
    min-height: 33.33vh;
  }
  
  .column-icon {
    font-size: 50px;
    margin-bottom: 15px;
  }
  
  .column-title {
    font-size: 24px;
  }
  
  .column-description {
    margin-bottom: 20px;
  }
  
  .column-button {
    opacity: 1;
    transform: translateY(0);
  }
}

@media (max-width: 576px) {
  .home-header {
    padding: 15px 20px;
  }
  
  .logo-text {
    display: none;
  }
  
  .column-title {
    font-size: 20px;
  }
  
  .column-description {
    font-size: 14px;
  }
}
</style>