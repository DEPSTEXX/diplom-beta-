<template>
  <div class="product-form">
    <h1>{{ isEdit ? 'Редактировать товар' : 'Добавить товар' }}</h1>
    <form @submit.prevent="handleSubmit">
      <div class="form-group">
        <label>Название:</label>
        <input type="text" v-model="form.name" required>
      </div>
      <div class="form-group">
        <label>Описание:</label>
        <textarea v-model="form.description"></textarea>
      </div>
      <div class="form-group">
        <label>Цена:</label>
        <input type="number" v-model="form.price" required>
      </div>
      <div class="form-group">
        <label>Категория:</label>
        <select v-model="form.category_id" required>
          <option value="">Выберите категорию</option>
          <option value="1">Батуты</option>
          <option value="2">Ниндзя-парк</option>
          <option value="3">Горные лыжи</option>
          <option value="4">Сноуборд</option>
          <option value="5">Вейкбординг</option>
          <option value="6">Катамараны</option>
        </select>
      </div>
      <div class="form-group">
        <label>Локация:</label>
        <select v-model="form.location_id" required>
          <option value="">Выберите локацию</option>
          <option value="1">Батутный парк</option>
          <option value="2">Горнолыжный склон</option>
          <option value="3">Вейкбординг</option>
        </select>
      </div>
      <div class="form-group">
        <label>Длительность (минуты):</label>
        <input type="number" v-model="form.duration_minutes">
      </div>
      <div class="form-group">
        <label>Статус:</label>
        <select v-model="form.is_active">
          <option :value="true">Активен</option>
          <option :value="false">Неактивен</option>
        </select>
      </div>
      <button type="submit" class="btn">{{ isEdit ? 'Сохранить' : 'Создать' }}</button>
      <router-link to="/products" class="btn btn-secondary">Отмена</router-link>
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
  description: '',
  price: 0,
  category_id: '',
  location_id: '',
  duration_minutes: 60,
  is_active: true
})

const handleSubmit = () => {
  alert(isEdit.value ? 'Товар сохранен' : 'Товар создан')
  router.push('/products')
}
</script>