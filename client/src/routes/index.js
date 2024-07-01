import { createRouter, createWebHistory } from 'vue-router'

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
    path: '/auth/register',
    name: 'auth-register',
    component: () => import('@/pages/Auth/Register.vue'),
    meta: {
      title: 'Register - Online Courses & Education'
    }
  },
  {
    path: '/',
    name: 'global-layout',
    component: () => import('@/layouts/GlobalLayout.vue'),
    children: [
      {
        path: '',
        name: 'home',
        component: () => import('@/pages/Home/Home.vue'),
        meta: {
          title: 'Home - Online Courses & Education'
        }
      },
      {
        path: 'courses',
        name: 'courses',
        component: () => import('@/pages/Course/Course.vue'),
        meta: {
          title: 'Course - Online Courses & Education'
        }
      },
      {
        path: 'course-details/:slug',
        name: 'course-details',
        component: () => import('@/pages/Course/CourseDetail.vue'),
        meta: {
          title: 'Course Details - Online Courses & Education'
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
  document.title = to.meta.title || 'LMS'
  next()
})

export default router
