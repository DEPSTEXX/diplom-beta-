<template>
  <div class="profile">
    <h1>Личный кабинет</h1>
    <div class="profile-info">
      <h2>Информация о пользователе</h2>
      <p><strong>Имя:</strong> {{ user?.first_name }} {{ user?.last_name }}</p>
      <p><strong>Email:</strong> {{ user?.email }}</p>
      <p><strong>Телефон:</strong> {{ user?.phone }}</p>
    </div>
    <div class="profile-actions">
      <router-link to="/profile/orders" class="btn">Мои заказы</router-link>
      <router-link to="/profile/bookings" class="btn">Мои бронирования</router-link>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed } from 'vue'
import { useAuthStore } from '../../stores/auth'

const authStore = useAuthStore()
const user = computed(() => authStore.user)
</script>