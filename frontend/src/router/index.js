import { createRouter, createWebHistory } from 'vue-router'
import LoginView from '../views/LoginView.vue'
import RegisterView from '../views/RegisterView.vue'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'login',
    component: LoginView
  },
  {
    path: '/register',
    name: 'register',
    component: RegisterView
  },
  {
    path: '/home',
    name: 'home',
    component: HomeView,
    meta: {requiresAuth: true}
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  }
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
    console.log('Token found, redirecting to home')
    next({ name: 'home' })
  } else {
    next()
  }
})

export default router
