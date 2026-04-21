<template>
  <div class="location-form">
    <h1>{{ isEdit ? 'Редактировать локацию' : 'Добавить локацию' }}</h1>
    <form @submit.prevent="handleSubmit">
      <div class="form-group">
        <label>Название:</label>
        <input type="text" v-model="form.name" required>
      </div>
      <div class="form-group">
        <label>Slug:</label>
        <input type="text" v-model="form.slug" required>
      </div>
      <div class="form-group">
        <label>Описание:</label>
        <textarea v-model="form.description"></textarea>
      </div>
      <div class="form-group">
        <label>Адрес:</label>
        <input type="text" v-model="form.address" required>
      </div>
      <div class="form-group">
        <label>Телефон:</label>
        <input type="tel" v-model="form.phone">
      </div>
      <div class="form-group">
        <label>Изображение URL:</label>
        <input type="url" v-model="form.image_url">
      </div>
      <div class="form-group">
        <label>Статус:</label>
        <select v-model="form.is_active">
          <option :value="true">Активна</option>
          <option :value="false">Неактивна</option>
        </select>
      </div>
      <button type="submit" class="btn">{{ isEdit ? 'Сохранить' : 'Создать' }}</button>
      <router-link to="/locations" class="btn btn-secondary">Отмена</router-link>
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
  name: '',
  slug: '',
  description: '',
  address: '',
  phone: '',
  image_url: '',
  is_active: true
})

const handleSubmit = () => {
  alert(isEdit.value ? 'Локация сохранена' : 'Локация создана')
  router.push('/locations')
}
</script>