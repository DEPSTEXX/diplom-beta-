<template>
  <div class="product-list">
    <h1>Управление товарами</h1>
    <div class="actions">
      <router-link to="/products/new" class="btn">Добавить товар</router-link>
    </div>
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Категория</th>
            <th>Статус</th>
            <th>Действия</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="product in products" :key="product.id">
            <td>{{ product.id }}</td>
            <td>{{ product.name }}</td>
            <td>{{ product.price }} ₽</td>
            <td>{{ product.category_name }}</td>
            <td>{{ product.is_active ? 'Активен' : 'Неактивен' }}</td>
            <td>
              <router-link :to="`/products/${product.id}`" class="btn-small">Редактировать</router-link>
              <button @click="deleteProduct(product.id)" class="btn-small btn-danger">Удалить</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const products = ref([
  { id: 1, name: 'Час прыжков', price: 800, category_name: 'Батуты', is_active: true },
  { id: 2, name: '2 часа прыжков', price: 1400, category_name: 'Батуты', is_active: true },
  { id: 3, name: 'Ниндзя-полоса', price: 500, category_name: 'Ниндзя-парк', is_active: true }
])

const deleteProduct = (id: number) => {
  if (confirm('Удалить товар?')) {
    products.value = products.value.filter(p => p.id !== id)
  }
}
</script>