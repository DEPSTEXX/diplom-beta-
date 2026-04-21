<template>
  <div class="bookings">
    <h1>Мои бронирования</h1>
    <div v-if="bookings.length === 0">
      <p>У вас пока нет бронирований</p>
    </div>
    <div v-else>
      <div v-for="booking in bookings" :key="booking.id" class="booking-item">
        <h3>Бронирование #{{ booking.id }}</h3>
        <p>Локация: {{ booking.location_name }}</p>
        <p>Дата: {{ booking.date }}</p>
        <p>Время: {{ booking.time_slot }}</p>
        <p>Статус: {{ booking.status }}</p>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const bookings = ref([
  { id: 1, location_name: 'Батутный парк', date: '2026-03-10', time_slot: '10:00-11:00', status: 'confirmed' },
  { id: 2, location_name: 'Горнолыжный склон', date: '2026-03-15', time_slot: '14:00-16:00', status: 'pending' }
])
</script>