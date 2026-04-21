<template>
  <div class="login">
    <h1>Вход</h1>
    <form @submit.prevent="handleLogin">
      <div class="form-group">
        <label>Email:</label>
        <input type="email" v-model="email" required>
      </div>
      <div class="form-group">
        <label>Пароль:</label>
        <input type="password" v-model="password" required>
      </div>
      <button type="submit" class="btn">Войти</button>
    </form>
    <p>Нет аккаунта? <router-link to="/register">Зарегистрироваться</router-link></p>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from '../stores/auth'

const email = ref('')
const password = ref('')
const router = useRouter()
const authStore = useAuthStore()

const handleLogin = async () => {
  try {
    await authStore.login(email.value, password.value)
    router.push('/')
  } catch (error) {
    alert('Ошибка входа')
  }
}
</script>