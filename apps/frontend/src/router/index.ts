import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import Location from '../views/Location.vue'
import TrampolinePark from '../views/TrampolinePark.vue'
import SkiSlope from '../views/SkiSlope.vue'
import Wakeboarding from '../views/Wakeboarding.vue'
import Prices from '../views/Prices.vue'
import Promotions from '../views/Promotions.vue'
import Certificates from '../views/Certificates.vue'
import Contacts from '../views/Contacts.vue'
import Login from '../views/Login.vue'
import Register from '../views/Register.vue'
import Cart from '../views/Cart.vue'
import Booking from '../views/Booking.vue'
import Profile from '../views/profile/Profile.vue'
import Orders from '../views/profile/Orders.vue'
import Bookings from '../views/profile/Bookings.vue'
import PrivacyPolicy from '../views/PrivacyPolicy.vue'

const routes = [
  { path: '/', name: 'Home', component: Home },
  { path: '/location/:slug', name: 'Location', component: Location },
  { path: '/trampoline-park', name: 'TrampolinePark', component: TrampolinePark },
  { path: '/ski-slope', name: 'SkiSlope', component: SkiSlope },
  { path: '/wakeboarding', name: 'Wakeboarding', component: Wakeboarding },
  { path: '/prices', name: 'Prices', component: Prices },
  { path: '/promotions', name: 'Promotions', component: Promotions },
  { path: '/certificates', name: 'Certificates', component: Certificates },
  { path: '/contacts', name: 'Contacts', component: Contacts },
  { path: '/login', name: 'Login', component: Login },
  { path: '/register', name: 'Register', component: Register },
  { path: '/cart', name: 'Cart', component: Cart },
  { path: '/booking', name: 'Booking', component: Booking },
  { path: '/profile', name: 'Profile', component: Profile, meta: { requiresAuth: true } },
  { path: '/profile/orders', name: 'Orders', component: Orders, meta: { requiresAuth: true } },
  { path: '/profile/bookings', name: 'Bookings', component: Bookings, meta: { requiresAuth: true } },
  { path: '/privacy', name: 'PrivacyPolicy', component: PrivacyPolicy }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router