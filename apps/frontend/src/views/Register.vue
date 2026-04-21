<template>
  <div class="register">
    <h1>Регистрация</h1>
    <form @submit.prevent="handleRegister">
      <div class="form-group">
        <label>Email:</label>
        <input type="email" v-model="email" required>
      </div>
      <div class="form-group">
        <label>Пароль:</label>
        <input type="password" v-model="password" required>
      </div>
      <div class="form-group">
        <label>Имя:</label>
        <input type="text" v-model="firstName" required>
      </div>
      <div class="form-group">
        <label>Фамилия:</label>
        <input type="text" v-model="lastName" required>
      </div>
      <div class="form-group">
        <label>Телефон:</label>
        <input type="tel" v-model="phone">
      </div>
      <div class="form-group consent-group">
        <label class="consent-label">
          <input type="checkbox" v-model="consentGiven" required />
          <span>
            Я согласен(на) на обработку персональных данных в соответствии с
            <router-link to="/privacy" target="_blank" class="privacy-link">Политикой конфиденциальности</router-link>
          </span>
        </label>
      </div>
      <button type="submit" class="btn" :disabled="!consentGiven">Зарегистрироваться</button>
    </form>
    <p>Есть аккаунт? <router-link to="/login">Войти</router-link></p>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from '../stores/auth'

const email = ref('')
const password = ref('')
const firstName = ref('')
const lastName = ref('')
const phone = ref('')
const consentGiven = ref(false)
const router = useRouter()
const authStore = useAuthStore()

const handleRegister = async () => {
  try {
    await authStore.register({
      email: email.value,
      password: password.value,
      first_name: firstName.value,
      last_name: lastName.value,
      phone: phone.value
    })
    router.push('/')
  } catch (error) {
    alert('Ошибка регистрации')
  }
}
</script>

<style scoped>
.consent-group {
  margin-top: 10px;
}

.consent-label {
  display: flex;
  align-items: flex-start;
  gap: 10px;
  cursor: pointer;
  font-size: 14px;
  color: #b0b0b0;
  line-height: 1.5;
}

.consent-label input[type="checkbox"] {
  width: 18px;
  height: 18px;
  min-width: 18px;
  margin-top: 2px;
  accent-color: #2979ff;
  cursor: pointer;
}

.privacy-link {
  color: #2979ff;
  text-decoration: underline;
  font-weight: 600;
  transition: color 0.2s;
}

.privacy-link:hover {
  color: #5ba3ff;
}

.btn:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}
</style>