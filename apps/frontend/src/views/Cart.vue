<template>
  <div class="cart">
    <h1>Корзина</h1>
    <div v-if="cartItems.length === 0">
      <p>Корзина пуста</p>
    </div>
    <div v-else>
      <div v-for="item in cartItems" :key="item.id" class="cart-item">
        <h3>{{ item.name }}</h3>
        <p>Цена: {{ item.price }} ₽</p>
        <p>Количество: {{ item.quantity }}</p>
      </div>
      <div class="cart-total">
        <h3>Итого: {{ totalPrice }} ₽</h3>
        <button class="btn" @click="checkout">Оформить заказ</button>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue'

const cartItems = ref([
  { id: 1, name: 'Час прыжков', price: 800, quantity: 1 },
  { id: 2, name: 'Ниндзя-полоса', price: 500, quantity: 2 }
])

const totalPrice = computed(() => {
  return cartItems.value.reduce((sum, item) => sum + item.price * item.quantity, 0)
})

const checkout = () => {
  alert('Заказ оформлен!')
}
</script>