<template>
  <header class="admin-header">
    <div class="header-title">
      <h1>{{ pageTitle }}</h1>
    </div>
    <div class="header-actions">
      <span>Администратор</span>
      <button @click="logout" class="btn btn-secondary">Выйти</button>
    </div>
  </header>
</template>

<script setup lang="ts">
import { computed } from 'vue'
import { useRoute, useRouter } from 'vue-router'

const route = useRoute()
const router = useRouter()

const pageTitle = computed(() => {
  return route.name as string || 'Панель управления'
})

const logout = () => {
  localStorage.removeItem('token')
  router.push('/login')
}
</script>