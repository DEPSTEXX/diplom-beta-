<template>
  <div class="booking-list">
    <h1>Управление бронированиями</h1>
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Пользователь</th>
            <th>Локация</th>
            <th>Дата</th>
            <th>Время</th>
            <th>Статус</th>
            <th>Действия</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="booking in bookings" :key="booking.id">
            <td>{{ booking.id }}</td>
            <td>{{ booking.user_name }}</td>
            <td>{{ booking.location_name }}</td>
            <td>{{ booking.date }}</td>
            <td>{{ booking.time_slot }}</td>
            <td>{{ booking.status }}</td>
            <td>
              <button @click="updateStatus(booking.id, 'confirmed')" class="btn-small">Подтвердить</button>
              <button @click="updateStatus(booking.id, 'cancelled')" class="btn-small btn-danger">Отменить</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const bookings = ref([
  { id: 1, user_name: 'Тест Тестов', location_name: 'Батутный парк', date: '2026-03-10', time_slot: '10:00-11:00', status: 'pending' },
  { id: 2, user_name: 'Иван Иванов', location_name: 'Горнолыжный склон', date: '2026-03-15', time_slot: '14:00-16:00', status: 'confirmed' },
  { id: 3, user_name: 'Петр Петров', location_name: 'Вейкбординг', date: '2026-03-20', time_slot: '11:00-12:00', status: 'pending' }
])

const updateStatus = (id: number, status: string) => {
  const booking = bookings.value.find(b => b.id === id)
  if (booking) {
    booking.status = status
    alert(`Статус бронирования изменен на: ${status}`)
  }
}
</script>