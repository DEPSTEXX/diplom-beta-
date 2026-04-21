<template>
  <header class="header" :class="{ 'scrolled': isScrolled }">
    <div class="container">
      <div class="header-content">
        <router-link to="/" class="logo">
          <span class="logo-text">Ярко Парк</span>
        </router-link>
        
        <nav class="nav" v-if="!isMobile">
          <router-link to="/" class="nav-link">Главная</router-link>
          <router-link to="/prices" class="nav-link">Цены</router-link>
          <router-link to="/promotions" class="nav-link">Акции</router-link>
          <router-link to="/certificates" class="nav-link">Сертификаты</router-link>
          <router-link to="/contacts" class="nav-link">Контакты</router-link>
        </nav>

        <button class="mobile-menu-btn" v-if="isMobile" @click="toggleMobileMenu">
          <div class="hamburger-menu" :class="{ 'active': mobileMenuOpen }">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
          </div>
        </button>

        <div class="header-actions" v-if="!isMobile">
          <router-link to="/booking" class="booking-btn">
            <span class="booking-text">Забронировать</span>
          </router-link>
          
          <template v-if="isLoggedIn">
            <div class="user-dropdown">
              <router-link to="/profile" class="user-link">
                <span class="user-name">{{ user?.first_name }}</span>
              </router-link>
              <div class="dropdown-menu">
                <router-link to="/profile" class="dropdown-item">Профиль</router-link>
                <router-link to="/profile/orders" class="dropdown-item">Заказы</router-link>
                <router-link to="/profile/bookings" class="dropdown-item">Бронирования</router-link>
                <button @click="logout" class="dropdown-item logout-item">Выйти</button>
              </div>
            </div>
          </template>
          <template v-else>
            <router-link to="/login" class="login-link">Войти</router-link>
          </template>
        </div>
      </div>

      <!-- Mobile Menu -->
      <div class="mobile-menu" v-if="isMobile && mobileMenuOpen">
        <router-link to="/" class="mobile-nav-link" @click="closeMobileMenu">Главная</router-link>
        <router-link to="/prices" class="mobile-nav-link" @click="closeMobileMenu">Цены</router-link>
        <router-link to="/promotions" class="mobile-nav-link" @click="closeMobileMenu">Акции</router-link>
        <router-link to="/certificates" class="mobile-nav-link" @click="closeMobileMenu">Сертификаты</router-link>
        <router-link to="/contacts" class="mobile-nav-link" @click="closeMobileMenu">Контакты</router-link>
        
        <div class="mobile-divider"></div>
        
        <router-link to="/booking" class="mobile-nav-link booking-mobile-link" @click="closeMobileMenu">Забронировать</router-link>
        
        <template v-if="isLoggedIn">
          <router-link to="/profile" class="mobile-nav-link" @click="closeMobileMenu">Профиль ({{ user?.first_name }})</router-link>
          <router-link to="/profile/orders" class="mobile-nav-link" @click="closeMobileMenu">Мои заказы</router-link>
          <router-link to="/profile/bookings" class="mobile-nav-link" @click="closeMobileMenu">Мои брони</router-link>
          <button @click="logout" class="mobile-nav-link logout-mobile-link">Выйти</button>
        </template>
        <template v-else>
          <router-link to="/login" class="mobile-nav-link" @click="closeMobileMenu">Войти в аккаунт</router-link>
        </template>
      </div>
    </div>
  </header>
</template>

<script setup lang="ts">
import { computed, ref, onMounted, onUnmounted } from 'vue'
import { useAuthStore } from '../../stores/auth'

const authStore = useAuthStore()
const isLoggedIn = computed(() => authStore.isLoggedIn)
const user = computed(() => authStore.user)

const isScrolled = ref(false)
const isMobile = ref(window.innerWidth <= 768)
const mobileMenuOpen = ref(false)

const handleScroll = () => {
  isScrolled.value = window.scrollY > 50
}

const handleResize = () => {
  isMobile.value = window.innerWidth <= 768
  if (!isMobile.value) {
    mobileMenuOpen.value = false
  }
}

const toggleMobileMenu = () => {
  mobileMenuOpen.value = !mobileMenuOpen.value
}

const closeMobileMenu = () => {
  mobileMenuOpen.value = false
}

const logout = () => {
  authStore.logout()
  closeMobileMenu()
}

onMounted(() => {
  window.addEventListener('scroll', handleScroll)
  window.addEventListener('resize', handleResize)
})

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll)
  window.removeEventListener('resize', handleResize)
})
</script>

<style scoped>
.header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 100;
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), transparent);
  padding: 20px 40px;
}

.header-content {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
}

.logo {
  font-size: 20px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 2px;
  color: white;
  text-decoration: none;
}

.nav {
  display: flex;
  gap: 30px;
}

.nav-link {
  color: white;
  text-decoration: none;
  font-size: 14px;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 1px;
  opacity: 0.8;
  transition: opacity 0.3s ease;
}

.nav-link:hover {
  opacity: 1;
}

.header-actions {
  display: flex;
  align-items: center;
  gap: 20px;
}

.user-link,
.login-link {
  color: white;
  text-decoration: none;
  font-size: 14px;
  opacity: 0.8;
  transition: opacity 0.3s ease;
}

.user-link:hover,
.login-link:hover {
  opacity: 1;
}

.logout-btn {
  background: none;
  border: 1px solid rgba(255, 255, 255, 0.3);
  color: white;
  padding: 8px 16px;
  border-radius: 4px;
  cursor: pointer;
  font-size: 14px;
  transition: all 0.3s ease;
}

.logout-btn:hover {
  background: rgba(255, 255, 255, 0.1);
  border-color: rgba(255, 255, 255, 0.5);
}

.mobile-menu {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 15px;
  padding: 20px;
  background: rgba(0, 0, 0, 0.95);
  border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.mobile-nav-link {
  color: white;
  text-decoration: none;
  padding: 12px 8px;
  text-align: center;
  border-radius: 8px;
  font-size: 13px;
  transition: background 0.2s ease;
}

.mobile-nav-link:hover {
  background: rgba(255, 255, 255, 0.1);
}

.mobile-divider {
  height: 1px;
  background: rgba(255, 255, 255, 0.1);
  grid-column: 1 / -1;
  margin: 5px 0;
}

.booking-mobile-link {
  color: #2979ff;
  font-weight: 600;
}

.logout-mobile-link {
  background: none;
  border: none;
  color: #ff5252;
  cursor: pointer;
  font-family: inherit;
  font-weight: 500;
}

@media (max-width: 768px) {
  .header {
    padding: 15px 20px;
  }
  
  .header-content {
    flex-wrap: wrap;
  }
  
  .logo {
    font-size: 18px;
  }
  
  .nav {
    display: none;
  }
  
  .mobile-menu-btn {
    display: flex;
    background: none;
    border: none;
    cursor: pointer;
    padding: 10px;
  }
  
  .hamburger-menu {
    display: flex;
    flex-direction: column;
    gap: 5px;
    width: 25px;
  }

  .hamburger-line {
    height: 2px;
    width: 100%;
    background: white;
    transition: all 0.3s ease;
  }
  
  .hamburger-menu.active .hamburger-line:nth-child(1) {
    transform: rotate(45deg) translate(5px, 5px);
  }
  
  .hamburger-menu.active .hamburger-line:nth-child(2) {
    opacity: 0;
  }
  
  .hamburger-menu.active .hamburger-line:nth-child(3) {
    transform: rotate(-45deg) translate(4px, -4px);
  }
}

@media (max-width: 576px) {
  .mobile-menu {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 400px) {
  .mobile-menu {
    grid-template-columns: 1fr;
  }
}
</style>