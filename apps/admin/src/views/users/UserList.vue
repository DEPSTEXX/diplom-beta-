<template>
  <div class="user-list">
    <h1>Управление пользователями</h1>
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Роль</th>
            <th>Дата регистрации</th>
            <th>Действия</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id">
            <td>{{ user.id }}</td>
            <td>{{ user.first_name }} {{ user.last_name }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.role }}</td>
            <td>{{ user.created_at }}</td>
            <td>
              <router-link :to="`/users/${user.id}`" class="btn-small">Редактировать</router-link>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const users = ref([
  { id: 1, first_name: 'Админ', last_name: 'Админов', email: 'admin@yarko-park.ru', role: 'admin', created_at: '2026-01-01' },
  { id: 2, first_name: 'Тест', last_name: 'Тестов', email: 'test@test.ru', role: 'customer', created_at: '2026-03-01' },
  { id: 3, first_name: 'Иван', last_name: 'Иванов', email: 'ivan@test.ru', role: 'customer', created_at: '2026-03-05' }
])
</script>