<template>
  <div class="promotion-form">
    <h1>{{ isEdit ? 'Редактировать акцию' : 'Добавить акцию' }}</h1>
    <form @submit.prevent="handleSubmit">
      <div class="form-group">
        <label>Название:</label>
        <input type="text" v-model="form.title" required>
      </div>
      <div class="form-group">
        <label>Описание:</label>
        <textarea v-model="form.description"></textarea>
      </div>
      <div class="form-group">
        <label>Локация:</label>
        <select v-model="form.location_id">
          <option value="">Выберите локацию</option>
          <option value="1">Батутный парк</option>
          <option value="2">Горнолыжный склон</option>
          <option value="3">Вейкбординг</option>
        </select>
      </div>
      <div class="form-group">
        <label>Дата начала:</label>
        <input type="date" v-model="form.start_date" required>
      </div>
      <div class="form-group">
        <label>Дата окончания:</label>
        <input type="date" v-model="form.end_date" required>
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
      <router-link to="/promotions" class="btn btn-secondary">Отмена</router-link>
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
  title: '',
  description: '',
  location_id: '',
  start_date: '',
  end_date: '',
  image_url: '',
  is_active: true
})

const handleSubmit = () => {
  alert(isEdit.value ? 'Акция сохранена' : 'Акция создана')
  router.push('/promotions')
}
</script>