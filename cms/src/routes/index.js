import { createRouter, createWebHistory } from 'vue-router'
import { gtka } from '@/helpers/localStorageHelper'

const routes = [
  {
    path: '/auth/login',
    name: 'auth-login',
    component: () => import('@/pages/Auth/Login.vue'),
    meta: {
      title: 'Login - Online Courses & Education'
    }
  },
  {
    path: '/',
    name: 'global-layout',
    component: () => import('@/layouts/GlobalLayout.vue'),
    children: [
      {
        path: '',
        name: 'dashboard',
        component: () => import('@/pages/Dashboard/Dashboard.vue'),
        meta: {
          title: 'Dashboard - Online Courses & Education'
        }
      },
      {
        path: 'course',
        name: 'course',
        component: () => import('@/pages/Course/CreateCourse.vue'),
        meta: {
          title: 'Course - Online Courses & Education'
        }
      }
    ]
  },
  {
    path: '/:catchAll(.*)',
    name: 'error',
    component: () => import('@/pages/Error/Error.vue')
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes: routes
})

router.beforeEach((to, from, next) => {
  document.title = to.meta.title || 'Online Courses & Education'
  next()
})

router.beforeEach(async (to, from, next) => {
  const user = true
  const token = gtka()

  if (to.meta.isAuthenticated) {
    if (user && token) {
      next()
    } else {
      next('/auth/login')
    }
  } else if (user && token && to.path === '/auth/login') {
    next('/')
  } else {
    next()
  }
})

export default router
