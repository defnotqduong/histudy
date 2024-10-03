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
    path: '/auth/register',
    name: 'auth-register',
    component: () => import('@/pages/Auth/Register.vue'),
    meta: {
      title: 'Register - Online Courses & Education'
    }
  },
  {
    path: '/auth/forgot-password',
    name: 'auth-forgot-password',
    component: () => import('@/pages/Auth/ForgotPassword.vue'),
    meta: {
      title: 'Forgot Password - Online Courses & Education'
    }
  },
  {
    path: '/auth/reset-password',
    name: 'auth-reset-password',
    component: () => import('@/pages/Auth/ResetPassword.vue'),
    meta: {
      title: 'Reset Password - Online Courses & Education'
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
        path: '/courses',
        name: 'courses',
        component: () => import('@/pages/Course/Courses.vue'),
        meta: {
          title: 'Course - Online Courses & Education'
        }
      },
      {
        path: '/course-details/:slug',
        name: 'course-details',
        component: () => import('@/pages/Course/CourseDetails.vue'),
        meta: {
          title: 'Course Details - Online Courses & Education'
        }
      },
      {
        path: '/cart',
        name: 'cart',
        component: () => import('@/pages/Cart/Cart.vue'),
        meta: {
          title: 'Cart - Online Courses & Education'
        }
      },
      {
        path: '/payment/checkout/:courseId',
        name: 'checkout',
        component: () => import('@/pages/Checkout/Checkout.vue'),
        meta: {
          title: 'Checkout - Online Courses & Education',
          isAuthenticated: true
        }
      },
      {
        path: '/dashboard',
        name: 'dashboard-layout',
        component: () => import('@/layouts/DashboardLayout.vue'),
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
            path: '/profile',
            name: 'profile',
            component: () => import('@/pages/Dashboard/Profile.vue'),
            meta: {
              title: 'Profile - Online Courses & Education'
            }
          },
          {
            path: '/enrolled-course',
            name: 'enrolled-course',
            component: () => import('@/pages/Dashboard/EnrolledCourse.vue'),
            meta: {
              title: 'Enrolled Course - Online Courses & Education'
            }
          },
          {
            path: '/wishlist',
            name: 'wishlist',
            component: () => import('@/pages/Dashboard/Wishlist.vue'),
            meta: {
              title: 'Wishlist - Online Courses & Education'
            }
          },
          {
            path: '/cert',
            name: 'cert',
            component: () => import('@/pages/Dashboard/Cert.vue'),
            meta: {
              title: 'Certificate - Online Courses & Education'
            }
          },
          {
            path: '/order-history',
            name: 'order-history',
            component: () => import('@/pages/Dashboard/Order.vue'),
            meta: {
              title: 'Order - Online Courses & Education'
            }
          },
          {
            path: '/settings',
            name: 'settings',
            component: () => import('@/pages/Dashboard/Settings.vue'),
            meta: {
              title: 'Settings - Online Courses & Education'
            }
          }
        ]
      },
      {
        path: '/instructor',
        name: 'create-course',
        component: () => import('@/layouts/CreateCourseLayout.vue'),
        meta: {
          isAuthenticated: true,
          title: 'Create Course - Online Courses & Education'
        },
        children: [
          {
            path: 'create-course',
            name: 'create-course-overview',
            component: () => import('@/pages/Course/CreateCourse.vue')
          },
          {
            path: 'course/:slug',
            name: 'create-course-details',
            component: () => import('@/pages/Course/CreateCourseDetails.vue')
          },
          {
            path: 'course/:slug/chapter/:chapterId',
            name: 'create-course-chapter',
            component: () => import('@/pages/Course/CreateChapter.vue')
          },
          {
            path: 'course/:slug/chapter/:chapterId/lesson/:lessonId',
            name: 'create-course-lesson',
            component: () => import('@/pages/Course/CreateLesson.vue')
          }
        ]
      }
    ]
  },
  {
    path: '/:slug/learning',
    name: 'learning-layout',
    component: () => import('@/layouts/LearningLayout.vue'),
    meta: {
      isAuthenticated: true
    },
    children: [
      {
        path: '',
        name: 'learning',
        component: () => import('@/pages/Learning/Learning.vue'),
        meta: {
          title: 'Learning - Online Courses & Education'
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
  } else if (
    user &&
    token &&
    (to.path === '/auth/login' || to.path === '/auth/signup' || to.path === '/auth/forgot-password' || to.path === '/auth/reset-password')
  ) {
    next('/')
  } else {
    next()
  }
})

export default router
