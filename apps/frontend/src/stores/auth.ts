import { defineStore } from 'pinia'
import { ref, computed } from 'vue'
import api from '../api/client'
import type { User } from '@yarko-park/types'

export const useAuthStore = defineStore('auth', () => {
  const user = ref<User | null>(null)
  const token = ref(localStorage.getItem('token'))
  const isLoggedIn = computed(() => !!token.value)

  async function login(email: string, password: string) {
    const response = await api.post('/auth/login', { email, password })
    if (response.data.success) {
      user.value = response.data.data.user
      token.value = response.data.data.token
      localStorage.setItem('token', token.value!)
    }
    return response.data
  }

  async function register(data: { email: string; password: string; first_name: string; last_name: string; phone: string }) {
    const response = await api.post('/auth/register', data)
    if (response.data.success) {
      user.value = response.data.data.user
      token.value = response.data.data.token
      localStorage.setItem('token', token.value!)
    }
    return response.data
  }

  function logout() {
    user.value = null
    token.value = null
    localStorage.removeItem('token')
  }

  return { user, token, isLoggedIn, login, register, logout }
})