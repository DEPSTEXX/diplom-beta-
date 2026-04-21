<template>
  <div class="location-list">
    <h1>Управление локациями</h1>
    <div class="actions">
      <router-link to="/locations/new" class="btn">Добавить локацию</router-link>
    </div>
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Slug</th>
            <th>Адрес</th>
            <th>Телефон</th>
            <th>Статус</th>
            <th>Действия</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="location in locations" :key="location.id">
            <td>{{ location.id }}</td>
            <td>{{ location.name }}</td>
            <td>{{ location.slug }}</td>
            <td>{{ location.address }}</td>
            <td>{{ location.phone }}</td>
            <td>{{ location.is_active ? 'Активна' : 'Неактивна' }}</td>
            <td>
              <router-link :to="`/locations/${location.id}`" class="btn-small">Редактировать</router-link>
              <button @click="deleteLocation(location.id)" class="btn-small btn-danger">Удалить</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const locations = ref([
  { id: 1, name: 'Батутный парк', slug: 'trampoline-park', address: 'ул. Спортивная, 1', phone: '+7-999-111-22-33', is_active: true },
  { id: 2, name: 'Горнолыжный склон', slug: 'ski-slope', address: 'ул. Горная, 5', phone: '+7-999-222-33-44', is_active: true },
  { id: 3, name: 'Вейкбординг', slug: 'wakeboarding', address: 'озеро Спортивное', phone: '+7-999-333-44-55', is_active: true }
])

const deleteLocation = (id: number) => {
  if (confirm('Удалить локацию?')) {
    locations.value = locations.value.filter(l => l.id !== id)
  }
}
</script>