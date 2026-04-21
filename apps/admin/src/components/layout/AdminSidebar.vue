<template>
  <aside class="sidebar">
    <div class="sidebar-header">
      <h2>Ярко Парк</h2>
      <p>Админка</p>
    </div>
    <nav class="sidebar-nav">
      <router-link to="/">Дашборд</router-link>
      <router-link to="/products">Товары</router-link>
      <router-link to="/categories">Категории</router-link>
      <router-link to="/orders">Заказы</router-link>
      <router-link to="/users">Пользователи</router-link>
      <router-link to="/locations">Локации</router-link>
      <router-link to="/promotions">Акции</router-link>
      <router-link to="/bookings">Бронирования</router-link>
    </nav>
  </aside>
</template>

<style scoped>
.sidebar {
  width: 250px;
  background-color: #2c3e50;
  color: white;
  padding: 20px;
}

.sidebar-header h2 {
  margin: 0;
  color: #ff6b35;
}

.sidebar-nav {
  display: flex;
  flex-direction: column;
  gap: 10px;
  margin-top: 30px;
}

.sidebar-nav a {
  color: white;
  padding: 10px;
  border-radius: 5px;
  transition: background-color 0.3s;
}

.sidebar-nav a:hover,
.sidebar-nav a.router-link-active {
  background-color: #34495e;
}
</style>