<template>
  <div class="order-list">
    <h1>Управление заказами</h1>
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Пользователь</th>
            <th>Сумма</th>
            <th>Статус</th>
            <th>Дата</th>
            <th>Действия</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="order in orders" :key="order.id">
            <td>{{ order.id }}</td>
            <td>{{ order.user_name }}</td>
            <td>{{ order.total_amount }} ₽</td>
            <td>{{ order.status }}</td>
            <td>{{ order.created_at }}</td>
            <td>
              <router-link :to="`/orders/${order.id}`" class="btn-small">Подробнее</router-link>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const orders = ref([
  { id: 1, user_name: 'Тест Тестов', total_amount: 1300, status: 'completed', created_at: '2026-03-01' },
  { id: 2, user_name: 'Иван Иванов', total_amount: 800, status: 'pending', created_at: '2026-03-05' },
  { id: 3, user_name: 'Петр Петров', total_amount: 2500, status: 'confirmed', created_at: '2026-03-10' }
])
</script>