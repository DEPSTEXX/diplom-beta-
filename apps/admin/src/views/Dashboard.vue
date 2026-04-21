<template>
  <div class="dashboard">
    <h1>Панель управления</h1>
    <div class="stats-grid">
      <div class="stat-card">
        <h3>Заказы</h3>
        <p class="stat-number">{{ stats.orders }}</p>
      </div>
      <div class="stat-card">
        <h3>Пользователи</h3>
        <p class="stat-number">{{ stats.users }}</p>
      </div>
      <div class="stat-card">
        <h3>Товары</h3>
        <p class="stat-number">{{ stats.products }}</p>
      </div>
      <div class="stat-card">
        <h3>Бронирования</h3>
        <p class="stat-number">{{ stats.bookings }}</p>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import api from '../api/client'

const stats = ref({
  orders: 0,
  users: 0,
  products: 0,
  bookings: 0
})

onMounted(async () => {
  const response = await api.get('/admin/stats')
  if (response.data.success) {
    stats.value = response.data.data
  }
})
</script>

<style scoped>
.dashboard {
  padding: 20px;
}

.stats-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  margin-top: 20px;
}

.stat-card {
  background: white;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.stat-number {
  font-size: 32px;
  font-weight: bold;
  color: #ff6b35;
}
</style>