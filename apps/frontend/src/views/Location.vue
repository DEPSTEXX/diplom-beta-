<template>
  <div class="location-page">
    <div v-if="loading" class="loading">Загрузка...</div>
    <div v-else-if="error" class="error">{{ error }}</div>
    <div v-else-if="location" class="location-details">
      <h1>{{ location.name }}</h1>
      <p class="address">{{ location.address }}</p>
      <p v-if="location.phone" class="phone">Телефон: {{ location.phone }}</p>
      <p v-if="location.description" class="description">{{ location.description }}</p>
      <router-link to="/" class="back-link">← Назад к списку локаций</router-link>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import api from '../api/client'

const route = useRoute()
const location = ref<any>(null)
const loading = ref(true)
const error = ref('')

onMounted(async () => {
  try {
    const slug = route.params.slug
    const response = await api.get(`/locations/${slug}`)
    location.value = response.data.data
  } catch (err: any) {
    error.value = err.response?.data?.error || 'Ошибка загрузки локации'
  } finally {
    loading.value = false
  }
})
</script>

<style scoped>
.location-page {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

.loading, .error {
  text-align: center;
  padding: 40px;
  font-size: 18px;
}

.error {
  color: #e74c3c;
}

.location-details {
  background: #fff;
  border-radius: 8px;
  padding: 30px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.location-details h1 {
  margin: 0 0 10px 0;
  color: #2c3e50;
}

.address {
  color: #7f8c8d;
  font-size: 16px;
  margin-bottom: 15px;
}

.phone {
  color: #3498db;
  font-size: 16px;
  margin-bottom: 15px;
}

.description {
  color: #34495e;
  line-height: 1.6;
  margin-bottom: 20px;
}

.back-link {
  display: inline-block;
  color: #3498db;
  text-decoration: none;
  font-size: 14px;
}

.back-link:hover {
  text-decoration: underline;
}
</style>