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
    meta: {
      isAuthenticated: true
    },
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
        path: 'customers',
        name: 'customers',
        component: () => import('@/pages/Dashboard/Customers.vue'),
        meta: {
          title: 'Customers - Online Courses & Education'
        }
      },
      {
        path: 'invoices',
        name: 'invoices',
        component: () => import('@/pages/Dashboard/Invoices.vue'),
        meta: {
          title: 'Invoices - Online Courses & Education'
        }
      },
      {
        path: 'courses',
        name: 'courses',
        component: () => import('@/pages/Dashboard/Courses.vue'),
        meta: {
          title: 'Courses - Online Courses & Education'
        }
      },
      {
        path: 'instructor/create-course',
        name: 'create-course',
        component: () => import('@/pages/Dashboard/CreateCourse/CreateCourse.vue'),
        meta: {
          title: 'Create Course - Online Courses & Education'
        }
      },
      {
        path: 'instructor/course/:slug',
        name: 'create-course-details',
        component: () => import('@/pages/Dashboard/CreateCourse/CreateCourseDetails.vue')
      },
      {
        path: 'instructor/course/:slug/chapter/:chapterId',
        name: 'create-course-chapter',
        component: () => import('@/pages/Dashboard/CreateCourse/CreateChapter.vue')
      },
      {
        path: 'instructor/course/:slug/chapter/:chapterId/lesson/:lessonId',
        name: 'create-course-lesson',
        component: () => import('@/pages/Dashboard/CreateCourse/CreateLesson.vue')
      },
      {
        path: 'categories',
        name: 'categories',
        component: () => import('@/pages/Dashboard/Category/Categories.vue'),
        meta: {
          title: 'Categories - Online Courses & Education'
        }
      },
      {
        path: 'instructor/category/:id',
        name: 'edit-category',
        component: () => import('@/pages/Dashboard/Category/EditCategory.vue'),
        meta: {
          title: 'Category - Online Courses & Education'
        }
      },
      {
        path: 'instructor/create-category',
        name: 'create-category',
        component: () => import('@/pages/Dashboard/Category/CreateCategory.vue'),
        meta: {
          title: 'Category - Online Courses & Education'
        }
      },
      {
        path: 'quiz',
        name: 'quiz',
        component: () => import('@/pages/Dashboard/Quiz.vue'),
        meta: {
          title: 'Quiz - Online Courses & Education'
        }
      },
      {
        path: 'certs',
        name: 'certs',
        component: () => import('@/pages/Dashboard/Certs.vue'),
        meta: {
          title: 'Certs - Online Courses & Education'
        }
      },
      {
        path: 'users',
        name: 'users',
        component: () => import('@/pages/Dashboard/Users.vue'),
        meta: {
          title: 'Users - Online Courses & Education'
        }
      },
      {
        path: 'roles',
        name: 'roles',
        component: () => import('@/pages/Dashboard/Role/Roles.vue'),
        meta: {
          title: 'Roles - Online Courses & Education'
        }
      },
      {
        path: 'permissions',
        name: 'permissions',
        component: () => import('@/pages/Dashboard/Permission/Permissions.vue'),
        meta: {
          title: 'Permissions - Online Courses & Education'
        }
      },
      {
        path: 'course-analytics',
        name: 'course-analytics',
        component: () => import('@/pages/Dashboard/CourseAnalytics.vue'),
        meta: {
          title: 'Course Analytics - Online Courses & Education'
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
