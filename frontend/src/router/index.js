import { createRouter, createWebHistory } from 'vue-router'
import LoginView from '../views/LoginView.vue'
import RegisterView from '../views/RegisterView.vue'
import DashboardView from '../views/DashboardView.vue'
import DoctorView from '../views/DoctorView.vue'
import PatientView from '../views/PatientView.vue'
import ProfileView from '../views/ProfileView.vue'
import AppointmentView from '../views/AppointmentView.vue'

const routes = [
  {
    path: '/login',
    name: 'login',
    component: LoginView
  },
  {
    path: '/register',
    name: 'register',
    component: RegisterView
  },
  {
    path: '/',
    name: 'dashboard',
    component: DashboardView,
    meta: {requiresAuth: true}
  },
  {
    path: '/doctor',
    name: 'doctor',
    component: DoctorView,
    meta: {requiresAuth: true}
  },
  {
    path: '/patient',
    name: 'patient',
    component: PatientView,
    meta: {requiresAuth: true}
  },
  {
    path: '/profile',
    name: 'profile',
    component: ProfileView,
    meta: {requiresAuth: true}
  },
  {
    path: '/appointment',
    name: 'appointment',
    component: AppointmentView,
    meta: {requiresAuth: true}
  },
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('token')
  console.log('Navigating to:', to.path)
  console.log('Token present:', !!token)

  if (to.matched.some(record => record.meta.requiresAuth) && !token) {
    console.log('No token found, redirecting to login')
    next({ name: 'login' })
  } else if ((to.name === 'login' || to.name === 'register') && token) {
    console.log('Token found, redirecting to dashboard')
    next({ name: 'dashboard' })
  } else {
    next()
  }
})

export default router
