<template>
  <div class="orders">
    <h1>Мои заказы</h1>
    <div v-if="orders.length === 0">
      <p>У вас пока нет заказов</p>
    </div>
    <div v-else>
      <div v-for="order in orders" :key="order.id" class="order-item">
        <h3>Заказ #{{ order.id }}</h3>
        <p>Сумма: {{ order.total_amount }} ₽</p>
        <p>Статус: {{ order.status }}</p>
        <p>Дата: {{ order.created_at }}</p>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const orders = ref([
  { id: 1, total_amount: 1300, status: 'completed', created_at: '2026-03-01' },
  { id: 2, total_amount: 800, status: 'pending', created_at: '2026-03-05' }
])
</script>