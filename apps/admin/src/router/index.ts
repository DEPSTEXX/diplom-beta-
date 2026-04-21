import { createRouter, createWebHistory } from 'vue-router'
import Dashboard from '../views/Dashboard.vue'
import ProductList from '../views/products/ProductList.vue'
import ProductForm from '../views/products/ProductForm.vue'
import CategoryList from '../views/categories/CategoryList.vue'
import CategoryForm from '../views/categories/CategoryForm.vue'
import OrderList from '../views/orders/OrderList.vue'
import OrderDetail from '../views/orders/OrderDetail.vue'
import UserList from '../views/users/UserList.vue'
import UserForm from '../views/users/UserForm.vue'
import LocationList from '../views/locations/LocationList.vue'
import LocationForm from '../views/locations/LocationForm.vue'
import PromotionList from '../views/promotions/PromotionList.vue'
import PromotionForm from '../views/promotions/PromotionForm.vue'
import BookingList from '../views/bookings/BookingList.vue'

const routes = [
  { path: '/', name: 'Dashboard', component: Dashboard },
  { path: '/products', name: 'ProductList', component: ProductList },
  { path: '/products/new', name: 'ProductNew', component: ProductForm },
  { path: '/products/:id', name: 'ProductEdit', component: ProductForm },
  { path: '/categories', name: 'CategoryList', component: CategoryList },
  { path: '/categories/new', name: 'CategoryNew', component: CategoryForm },
  { path: '/categories/:id', name: 'CategoryEdit', component: CategoryForm },
  { path: '/orders', name: 'OrderList', component: OrderList },
  { path: '/orders/:id', name: 'OrderDetail', component: OrderDetail },
  { path: '/users', name: 'UserList', component: UserList },
  { path: '/users/:id', name: 'UserEdit', component: UserForm },
  { path: '/locations', name: 'LocationList', component: LocationList },
  { path: '/locations/new', name: 'LocationNew', component: LocationForm },
  { path: '/locations/:id', name: 'LocationEdit', component: LocationForm },
  { path: '/promotions', name: 'PromotionList', component: PromotionList },
  { path: '/promotions/new', name: 'PromotionNew', component: PromotionForm },
  { path: '/promotions/:id', name: 'PromotionEdit', component: PromotionForm },
  { path: '/bookings', name: 'BookingList', component: BookingList }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router