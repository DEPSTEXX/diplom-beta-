<template>
  <div class="category-list">
    <h1>Управление категориями</h1>
    <div class="actions">
      <router-link to="/categories/new" class="btn">Добавить категорию</router-link>
    </div>
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Slug</th>
            <th>Локация</th>
            <th>Статус</th>
            <th>Действия</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="category in categories" :key="category.id">
            <td>{{ category.id }}</td>
            <td>{{ category.name }}</td>
            <td>{{ category.slug }}</td>
            <td>{{ category.location_name }}</td>
            <td>{{ category.is_active ? 'Активна' : 'Неактивна' }}</td>
            <td>
              <router-link :to="`/categories/${category.id}`" class="btn-small">Редактировать</router-link>
              <button @click="deleteCategory(category.id)" class="btn-small btn-danger">Удалить</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const categories = ref([
  { id: 1, name: 'Батуты', slug: 'trampolines', location_name: 'Батутный парк', is_active: true },
  { id: 2, name: 'Ниндзя-парк', slug: 'ninja-park', location_name: 'Батутный парк', is_active: true },
  { id: 3, name: 'Горные лыжи', slug: 'downhill-ski', location_name: 'Горнолыжный склон', is_active: true }
])

const deleteCategory = (id: number) => {
  if (confirm('Удалить категорию?')) {
    categories.value = categories.value.filter(c => c.id !== id)
  }
}
</script>