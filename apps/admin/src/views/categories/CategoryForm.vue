 <template>
  <div class="category-form">
    <h1>{{ isEdit ? 'Редактировать категорию' : 'Добавить категорию' }}</h1>
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
        <label>Локация:</label>
        <select v-model="form.location_id">
          <option value="">Выберите локацию</option>
          <option value="1">Батутный парк</option>
          <option value="2">Горнолыжный склон</option>
          <option value="3">Вейкбординг</option>
        </select>
      </div>
      <div class="form-group">
        <label>Статус:</label>
        <select v-model="form.is_active">
          <option :value="true">Активна</option>
          <option :value="false">Неактивна</option>
        </select>
      </div>
      <button type="submit" class="btn">{{ isEdit ? 'Сохранить' : 'Создать' }}</button>
      <router-link to="/categories" class="btn btn-secondary">Отмена</router-link>
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
  location_id: '',
  is_active: true
})

const handleSubmit = () => {
  alert(isEdit.value ? 'Категория сохранена' : 'Категория создана')
  router.push('/categories')
}
</script>