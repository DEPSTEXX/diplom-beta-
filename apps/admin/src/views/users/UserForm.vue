<template>
  <div class="user-form">
    <h1>{{ isEdit ? 'Редактировать пользователя' : 'Добавить пользователя' }}</h1>
    <form @submit.prevent="handleSubmit">
      <div class="form-group">
        <label>Имя:</label>
        <input type="text" v-model="form.first_name" required>
      </div>
      <div class="form-group">
        <label>Фамилия:</label>
        <input type="text" v-model="form.last_name" required>
      </div>
      <div class="form-group">
        <label>Email:</label>
        <input type="email" v-model="form.email" required>
      </div>
      <div class="form-group">
        <label>Телефон:</label>
        <input type="tel" v-model="form.phone">
      </div>
      <div class="form-group">
        <label>Роль:</label>
        <select v-model="form.role" required>
          <option value="customer">Покупатель</option>
          <option value="admin">Администратор</option>
        </select>
      </div>
      <button type="submit" class="btn">{{ isEdit ? 'Сохранить' : 'Создать' }}</button>
      <router-link to="/users" class="btn btn-secondary">Отмена</router-link>
    </form>
  </div>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue'
import { useRoute, useRouter } from 'vue-router'

const route = useRoute()
const router = useRouter()
const isEdit = computed(() => !!route.params.id)

const form = ref({
  first_name: '',
  last_name: '',
  email: '',
  phone: '',
  role: 'customer'
})

const handleSubmit = () => {
  alert(isEdit.value ? 'Пользователь сохранен' : 'Пользователь создан')
  router.push('/users')
}
</script>