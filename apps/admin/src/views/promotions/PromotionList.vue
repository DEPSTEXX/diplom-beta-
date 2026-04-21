<template>
  <div class="promotion-list">
    <h1>Управление акциями</h1>
    <div class="actions">
      <router-link to="/promotions/new" class="btn">Добавить акцию</router-link>
    </div>
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Локация</th>
            <th>Даты</th>
            <th>Статус</th>
            <th>Действия</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="promotion in promotions" :key="promotion.id">
            <td>{{ promotion.id }}</td>
            <td>{{ promotion.title }}</td>
            <td>{{ promotion.location_name }}</td>
            <td>{{ promotion.start_date }} - {{ promotion.end_date }}</td>
            <td>{{ promotion.is_active ? 'Активна' : 'Неактивна' }}</td>
            <td>
              <router-link :to="`/promotions/${promotion.id}`" class="btn-small">Редактировать</router-link>
              <button @click="deletePromotion(promotion.id)" class="btn-small btn-danger">Удалить</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const promotions = ref([
  { id: 1, title: 'Скидка 20% на батуты', location_name: 'Батутный парк', start_date: '2026-01-01', end_date: '2026-12-31', is_active: true },
  { id: 2, title: 'Абонемент на месяц', location_name: 'Горнолыжный склон', start_date: '2026-01-01', end_date: '2026-12-31', is_active: true }
])

const deletePromotion = (id: number) => {
  if (confirm('Удалить акцию?')) {
    promotions.value = promotions.value.filter(p => p.id !== id)
  }
}
</script>