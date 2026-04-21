<template>
  <div class="order-detail">
    <h1>Детали заказа #{{ order.id }}</h1>
    <div class="order-info">
      <p><strong>Пользователь:</strong> {{ order.user_name }}</p>
      <p><strong>Email:</strong> {{ order.user_email }}</p>
      <p><strong>Сумма:</strong> {{ order.total_amount }} ₽</p>
      <p><strong>Статус:</strong> {{ order.status }}</p>
      <p><strong>Дата:</strong> {{ order.created_at }}</p>
    </div>
    <div class="order-items">
      <h2>Товары</h2>
      <table>
        <thead>
          <tr>
            <th>Название</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Сумма</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in order.items" :key="item.id">
            <td>{{ item.product_name }}</td>
            <td>{{ item.price }} ₽</td>
            <td>{{ item.quantity }}</td>
            <td>{{ item.price * item.quantity }} ₽</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="actions">
      <button @click="updateStatus('confirmed')" class="btn">Подтвердить</button>
      <button @click="updateStatus('completed')" class="btn">Завершить</button>
      <button @click="updateStatus('cancelled')" class="btn btn-danger">Отменить</button>
      <router-link to="/orders" class="btn btn-secondary">Назад</router-link>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { useRoute } from 'vue-router'

const route = useRoute()

const order = ref({
  id: route.params.id,
  user_name: 'Тест Тестов',
  user_email: 'test@test.ru',
  total_amount: 1300,
  status: 'pending',
  created_at: '2026-03-01',
  items: [
    { id: 1, product_name: 'Час прыжков', price: 800, quantity: 1 },
    { id: 2, product_name: 'Ниндзя-полоса', price: 500, quantity: 1 }
  ]
})

const updateStatus = (status: string) => {
  order.value.status = status
  alert(`Статус заказа изменен на: ${status}`)
}
</script>