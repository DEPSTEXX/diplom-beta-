<template>
  <div class="booking-page">
    <div class="container">
      <h1 class="page-title">Бронирование</h1>
      <p class="page-subtitle">Забронируйте время для активного отдыха</p>
      
      <div class="booking-content">
        <!-- Форма бронирования -->
        <div class="booking-form-section">
          <form @submit.prevent="handleBooking" class="booking-form">
            <!-- Выбор локации -->
            <div class="form-section">
              <h3>📍 Выберите локацию</h3>
              <div class="location-options">
                <label class="location-option" :class="{ active: form.locationId === '1' }">
                  <input type="radio" v-model="form.locationId" value="1" />
                  <div class="location-card">
                    <div class="location-icon">🎯</div>
                    <div class="location-info">
                      <h4>Батутный парк</h4>
                      <p>Прыжки и развлечения</p>
                    </div>
                  </div>
                </label>
                <label class="location-option" :class="{ active: form.locationId === '2' }">
                  <input type="radio" v-model="form.locationId" value="2" />
                  <div class="location-card">
                    <div class="location-icon">⛷️</div>
                    <div class="location-info">
                      <h4>Горнолыжный склон</h4>
                      <p>Катание на лыжах</p>
                    </div>
                  </div>
                </label>
                <label class="location-option" :class="{ active: form.locationId === '3' }">
                  <input type="radio" v-model="form.locationId" value="3" />
                  <div class="location-card">
                    <div class="location-icon">🏄</div>
                    <div class="location-info">
                      <h4>Вейкбординг</h4>
                      <p>Водные развлечения</p>
                    </div>
                  </div>
                </label>
              </div>
            </div>

            <!-- Выбор даты -->
            <div class="form-section">
              <h3>📅 Выберите дату</h3>
              <div class="date-picker">
                <input type="date" v-model="form.date" required :min="minDate" />
              </div>
            </div>

            <!-- Выбор времени -->
            <div class="form-section">
              <h3>🕐 Выберите время</h3>
              <div class="time-slots">
                <label 
                  v-for="slot in timeSlots" 
                  :key="slot.value" 
                  class="time-slot" 
                  :class="{ active: form.timeSlot === slot.value }"
                >
                  <input type="radio" v-model="form.timeSlot" :value="slot.value" />
                  <span>{{ slot.label }}</span>
                </label>
              </div>
            </div>

            <!-- Выбор услуги -->
            <div class="form-section">
              <h3>🎫 Выберите услугу</h3>
              <div class="service-options">
                <label 
                  v-for="service in services" 
                  :key="service.id" 
                  class="service-option" 
                  :class="{ active: form.productId === service.id }"
                >
                  <input type="radio" v-model="form.productId" :value="service.id" />
                  <div class="service-card">
                    <div class="service-name">{{ service.name }}</div>
                    <div class="service-price">{{ service.price }} ₽</div>
                  </div>
                </label>
              </div>
            </div>

            <!-- Количество гостей -->
            <div class="form-section">
              <h3>👥 Количество гостей</h3>
              <div class="guests-counter">
                <button type="button" @click="decreaseGuests" :disabled="form.guests <= 1">-</button>
                <span class="guests-count">{{ form.guests }}</span>
                <button type="button" @click="increaseGuests" :disabled="form.guests >= 10">+</button>
              </div>
              <p class="guests-hint">Максимум 10 человек</p>
            </div>

            <!-- Контактная информация -->
            <div class="form-section">
              <h3>📞 Контактная информация</h3>
              <div class="contact-fields">
                <div class="form-group">
                  <label>Имя *</label>
                  <input type="text" v-model="form.name" required placeholder="Ваше имя" />
                </div>
                <div class="form-group">
                  <label>Телефон *</label>
                  <input type="tel" v-model="form.phone" required placeholder="+7 (999) 111-22-33" />
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" v-model="form.email" placeholder="example@email.com" />
                </div>
              </div>
            </div>

            <!-- Комментарий -->
            <div class="form-section">
              <h3>💬 Комментарий к заказу</h3>
              <div class="form-group">
                <textarea v-model="form.comment" rows="3" placeholder="Особые пожелания или вопросы..."></textarea>
              </div>
            </div>

            <!-- Промокод -->
            <div class="form-section">
              <h3>🎁 Промокод</h3>
              <div class="promo-code">
                <input type="text" v-model="form.promoCode" placeholder="Введите промокод" />
                <button type="button" @click="applyPromoCode" class="promo-btn">Применить</button>
              </div>
              <p v-if="promoApplied" class="promo-success">Промокод применен! Скидка 20%</p>
            </div>

            <!-- Итого -->
            <div class="booking-summary">
              <div class="summary-row">
                <span>Услуга:</span>
                <span>{{ selectedService?.name || 'Не выбрано' }}</span>
              </div>
              <div class="summary-row">
                <span>Дата:</span>
                <span>{{ form.date || 'Не выбрано' }}</span>
              </div>
              <div class="summary-row">
                <span>Время:</span>
                <span>{{ form.timeSlot || 'Не выбрано' }}</span>
              </div>
              <div class="summary-row">
                <span>Гости:</span>
                <span>{{ form.guests }} чел.</span>
              </div>
              <div v-if="promoApplied" class="summary-row discount">
                <span>Скидка:</span>
                <span>-20%</span>
              </div>
              <div class="summary-total">
                <span>Итого:</span>
                <span>{{ totalPrice }} ₽</span>
              </div>
            </div>

            <!-- Согласие на обработку ПД -->
            <div class="form-section consent-section">
              <label class="consent-label">
                <input type="checkbox" v-model="consentGiven" />
                <span>
                  Я согласен(на) на обработку персональных данных в соответствии с
                  <router-link to="/privacy" target="_blank" class="privacy-link">Политикой конфиденциальности</router-link>
                </span>
              </label>
            </div>

            <button type="submit" class="submit-btn" :disabled="!isFormValid">
              Забронировать
            </button>
          </form>
        </div>

        <!-- Информация о бронировании -->
        <div class="booking-info">
          <div class="info-card">
            <h3>📋 Условия бронирования</h3>
            <ul>
              <li>Бронирование можно отменить за 24 часа</li>
              <li>При опоздании более чем на 15 минут бронь аннулируется</li>
              <li>Обязательно наличие сменной обуви</li>
              <li>Дети до 12 лет только в сопровождении взрослых</li>
            </ul>
          </div>
          
          <div class="info-card">
            <h3>📞 Нужна помощь?</h3>
            <p>Позвоните нам для уточнения деталей:</p>
            <p class="phone">+7 (999) 111-22-33</p>
            <p class="work-hours">Работаем ежедневно с 10:00 до 22:00</p>
          </div>
          
          <div class="info-card">
            <h3>🎁 Скидки</h3>
            <ul>
              <li>Утренний тариф (10:00-12:00) -20%</li>
              <li>Студенческая скидка -15%</li>
              <li>Детский день (воскресенье) -30%</li>
              <li>Семейный пакет (от 3 человек) -25%</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue'

const form = ref({
  locationId: '',
  date: '',
  timeSlot: '',
  productId: '',
  guests: 1,
  name: '',
  phone: '',
  email: '',
  comment: '',
  promoCode: ''
})

const promoApplied = ref(false)
const consentGiven = ref(false)

const timeSlots = [
  { value: '10:00-11:00', label: '10:00-11:00' },
  { value: '11:00-12:00', label: '11:00-12:00' },
  { value: '12:00-13:00', label: '12:00-13:00' },
  { value: '14:00-15:00', label: '14:00-15:00' },
  { value: '15:00-16:00', label: '15:00-16:00' },
  { value: '16:00-17:00', label: '16:00-17:00' },
  { value: '17:00-18:00', label: '17:00-18:00' },
  { value: '18:00-19:00', label: '18:00-19:00' },
  { value: '19:00-20:00', label: '19:00-20:00' },
  { value: '20:00-21:00', label: '20:00-21:00' }
]

const services = [
  { id: '1', name: 'Час прыжков', price: 800 },
  { id: '2', name: '2 часа прыжков', price: 1400 },
  { id: '3', name: 'Безлимит на день', price: 2000 },
  { id: '4', name: 'Ниндзя-полоса', price: 500 },
  { id: '5', name: 'Детская зона', price: 400 }
]

const minDate = computed(() => {
  const today = new Date()
  return today.toISOString().split('T')[0]
})

const selectedService = computed(() => {
  return services.find(s => s.id === form.value.productId)
})

const totalPrice = computed(() => {
  if (!selectedService.value) return 0
  let price = selectedService.value.price * form.value.guests
  if (promoApplied.value) {
    price = price * 0.8
  }
  return price
})

const isFormValid = computed(() => {
  return form.value.locationId && 
         form.value.date && 
         form.value.timeSlot && 
         form.value.productId && 
         form.value.name && 
         form.value.phone &&
         consentGiven.value
})

const increaseGuests = () => {
  if (form.value.guests < 10) {
    form.value.guests++
  }
}

const decreaseGuests = () => {
  if (form.value.guests > 1) {
    form.value.guests--
  }
}

const applyPromoCode = () => {
  if (form.value.promoCode.toLowerCase() === 'promo20') {
    promoApplied.value = true
  } else {
    alert('Промокод не найден')
  }
}

const handleBooking = () => {
  if (!isFormValid.value) {
    alert('Пожалуйста, заполните все обязательные поля')
    return
  }
  
  alert(`Бронирование успешно создано!\n\nЛокация: ${form.value.locationId === '1' ? 'Батутный парк' : form.value.locationId === '2' ? 'Горнолыжный склон' : 'Вейкбординг'}\nДата: ${form.value.date}\nВремя: ${form.value.timeSlot}\nУслуга: ${selectedService.value?.name}\nГости: ${form.value.guests} чел.\nИтого: ${totalPrice.value} ₽\n\nМы свяжемся с вами для подтверждения.`)
}
</script>

<style scoped>
.booking-page {
  min-height: 100vh;
  background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
  padding: 40px 20px;
}

.container {
  max-width: 1400px;
  margin: 0 auto;
}

.page-title {
  text-align: center;
  color: white;
  font-size: 48px;
  margin-bottom: 10px;
  text-transform: uppercase;
  letter-spacing: 2px;
}

.page-subtitle {
  text-align: center;
  color: #b0b0b0;
  font-size: 18px;
  margin-bottom: 50px;
}

.booking-content {
  display: grid;
  grid-template-columns: 1fr 350px;
  gap: 40px;
}

.booking-form-section {
  background: #262420;
  border-radius: 16px;
  padding: 40px;
}

.booking-form {
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.form-section {
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  padding-bottom: 25px;
}

.form-section:last-child {
  border-bottom: none;
}

.form-section h3 {
  color: white;
  font-size: 20px;
  margin-bottom: 20px;
}

.location-options {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.location-option {
  cursor: pointer;
}

.location-option input {
  display: none;
}

.location-card {
  display: flex;
  align-items: center;
  gap: 15px;
  padding: 20px;
  background: rgba(255, 255, 255, 0.05);
  border: 2px solid transparent;
  border-radius: 12px;
  transition: all 0.3s ease;
}

.location-option.active .location-card {
  border-color: #2979ff;
  background: rgba(41, 121, 255, 0.1);
}

.location-icon {
  font-size: 30px;
}

.location-info h4 {
  color: white;
  font-size: 16px;
  margin-bottom: 5px;
}

.location-info p {
  color: #b0b0b0;
  font-size: 14px;
}

.date-picker input {
  width: 100%;
  padding: 12px 16px;
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 8px;
  color: white;
  font-size: 16px;
}

.time-slots {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
  gap: 10px;
}

.time-slot {
  cursor: pointer;
}

.time-slot input {
  display: none;
}

.time-slot span {
  display: block;
  padding: 12px 16px;
  background: rgba(255, 255, 255, 0.05);
  border: 2px solid transparent;
  border-radius: 8px;
  color: white;
  text-align: center;
  transition: all 0.3s ease;
}

.time-slot.active span {
  border-color: #2979ff;
  background: rgba(41, 121, 255, 0.1);
}

.service-options {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.service-option {
  cursor: pointer;
}

.service-option input {
  display: none;
}

.service-card {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 20px;
  background: rgba(255, 255, 255, 0.05);
  border: 2px solid transparent;
  border-radius: 8px;
  transition: all 0.3s ease;
}

.service-option.active .service-card {
  border-color: #2979ff;
  background: rgba(41, 121, 255, 0.1);
}

.service-name {
  color: white;
  font-size: 16px;
}

.service-price {
  color: #2979ff;
  font-size: 18px;
  font-weight: 600;
}

.guests-counter {
  display: flex;
  align-items: center;
  gap: 20px;
}

.guests-counter button {
  width: 40px;
  height: 40px;
  background: #2979ff;
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 20px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.guests-counter button:hover:not(:disabled) {
  background: #1565c0;
}

.guests-counter button:disabled {
  background: #555;
  cursor: not-allowed;
}

.guests-count {
  color: white;
  font-size: 24px;
  font-weight: 600;
  min-width: 40px;
  text-align: center;
}

.guests-hint {
  color: #888;
  font-size: 14px;
  margin-top: 10px;
}

.contact-fields {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

.form-group {
  margin-bottom: 15px;
}

.form-group label {
  display: block;
  color: white;
  font-size: 14px;
  margin-bottom: 8px;
  font-weight: 600;
}

.form-group input,
.form-group textarea {
  width: 100%;
  padding: 12px 16px;
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 8px;
  color: white;
  font-size: 16px;
}

.form-group input:focus,
.form-group textarea:focus {
  outline: none;
  border-color: #2979ff;
}

.form-group input::placeholder,
.form-group textarea::placeholder {
  color: #888;
}

.promo-code {
  display: flex;
  gap: 10px;
}

.promo-code input {
  flex: 1;
  padding: 12px 16px;
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 8px;
  color: white;
  font-size: 16px;
}

.promo-btn {
  padding: 12px 20px;
  background: #2979ff;
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 14px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.promo-btn:hover {
  background: #1565c0;
}

.promo-success {
  color: #4caf50;
  font-size: 14px;
  margin-top: 10px;
}

.booking-summary {
  background: rgba(255, 255, 255, 0.05);
  border-radius: 12px;
  padding: 25px;
  margin-bottom: 20px;
}

.summary-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 0;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.summary-row:last-child {
  border-bottom: none;
}

.summary-row span {
  color: #b0b0b0;
  font-size: 16px;
}

.summary-row.discount span:last-child {
  color: #4caf50;
}

.summary-total {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 0 0 0;
  margin-top: 10px;
  border-top: 2px solid #2979ff;
}

.summary-total span {
  color: white;
  font-size: 20px;
  font-weight: 600;
}

.submit-btn {
  display: block;
  width: 100%;
  padding: 18px;
  background: #2979ff;
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 18px;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.3s ease;
}

.submit-btn:hover:not(:disabled) {
  background: #1565c0;
}

.submit-btn:disabled {
  background: #555;
  cursor: not-allowed;
}

.consent-section {
  border-bottom: none !important;
  padding-bottom: 0 !important;
}

.consent-label {
  display: flex;
  align-items: flex-start;
  gap: 12px;
  cursor: pointer;
  font-size: 14px;
  color: #b0b0b0;
  line-height: 1.6;
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

.booking-info {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.info-card {
  background: #262420;
  border-radius: 12px;
  padding: 25px;
}

.info-card h3 {
  color: white;
  font-size: 18px;
  margin-bottom: 15px;
}

.info-card ul {
  color: #b0b0b0;
  font-size: 14px;
  line-height: 1.8;
  padding-left: 20px;
}

.info-card li {
  margin-bottom: 8px;
}

.info-card p {
  color: #b0b0b0;
  font-size: 14px;
  margin-bottom: 10px;
}

.info-card .phone {
  color: #2979ff;
  font-size: 18px;
  font-weight: 600;
}

.info-card .work-hours {
  color: #888;
  font-size: 14px;
}

@media (max-width: 1024px) {
  .booking-content {
    grid-template-columns: 1fr;
  }
  
  .contact-fields {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 768px) {
  .booking-page {
    padding: 30px 10px;
  }

  .page-title {
    font-size: 32px;
    word-break: break-word;
    hyphens: auto;
  }
  
  .booking-form-section {
    padding: 20px 15px;
  }
  
  .time-slots {
    grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
  }
}

@media (max-width: 480px) {
  .page-title {
    font-size: 24px;
    letter-spacing: 1px;
  }

  .page-subtitle {
    font-size: 15px;
    margin-bottom: 30px;
  }

  .location-card {
    padding: 15px;
    gap: 10px;
  }

  .location-icon {
    font-size: 24px;
  }

  .service-card {
    padding: 12px 15px;
    flex-direction: column;
    align-items: flex-start;
    gap: 5px;
  }
  
  .time-slots {
    grid-template-columns: repeat(2, 1fr);
  }
  
  .guests-counter {
    gap: 15px;
  }

  .promo-code {
    flex-direction: column;
  }
  
  .submit-btn {
    padding: 15px;
    font-size: 16px;
  }
}
</style>