export default {
  // User
  REGISTER_USER_API: {
    method: 'post',
    url: '/auth/register'
  },
  LOGIN_USER_API: {
    method: 'post',
    url: '/auth/login'
  },
  LOGIN_GOOGLE_API: {
    method: 'post',
    url: '/auth/google'
  },
  REFRESH_TOKEN_API: {
    method: 'post',
    url: '/auth/refresh'
  },
  GET_USER_PROFILE_API: {
    method: 'get',
    url: '/auth/profile'
  },
  UPDATE_PROFILE_API: {
    method: 'patch',
    url: '/auth/update-profile'
  },
  UPDATE_AVATAR_API: {
    method: 'post',
    url: '/auth/update-avatar'
  },
  UPDATE_BGIMAGE_API: {
    method: 'post',
    url: '/auth/update-background-image'
  },
  CHANGE_PASSWORD_API: {
    method: 'post',
    url: '/auth/change-password'
  },
  FORGOT_PASSWORD_API: {
    method: 'post',
    url: '/auth/forgot-password'
  },
  CHECK_PASSWORD_RESET_TOKEN_API: {
    method: 'post',
    url: '/auth/check-password-reset-token'
  },
  RESET_PASSWORD_API: {
    method: 'post',
    url: '/auth/reset-password'
  },
  LOGOUT_USER_API: {
    method: 'post',
    url: '/auth/logout'
  },

  // Guest Routes
  // Category
  GET_ALL_CATEGORY_API: {
    method: 'get',
    url: '/category'
  },

  GET_POPULAR_CATEGORIES_API: {
    method: 'get',
    url: '/category/popular'
  },

  // Cart
  GET_CART_API: {
    method: 'get',
    url: '/cart'
  },

  ADD_COURSE_TO_CART_API: {
    method: 'post',
    url: '/cart'
  },

  REMOVE_COURSE_FROM_CART_API: {
    method: 'deleted',
    url: '/cart'
  },

  // Wishlist
  GET_WISHLIST_API: {
    method: 'get',
    url: '/wishlist'
  },

  ADD_COURSE_TO_WISHLIST_API: {
    method: 'post',
    url: '/wishlist'
  },

  REMOVE_COURSE_FROM_WISHLIST_API: {
    method: 'deleted',
    url: '/wishlist'
  },

  GET_ALL_CERT_API: {
    method: 'get',
    url: '/cert'
  },

  // Notification Routes

  GET_LIST_NOTI_BY_USER: {
    method: 'get',
    url: '/notifications'
  },

  // Order
  GET_ALL_ORDER_API: {
    method: 'get',
    url: '/order'
  },

  GET_COURSE_FOR_CHECKOUT_API: {
    method: 'get',
    url: '/order/checkout/course'
  },

  CHECKOUT_COURSE_API: {
    method: 'post',
    url: '/order/checkout/course'
  },

  // Course
  GET_ALL_COURSES_API: {
    method: 'get',
    url: '/course'
  },

  GET_POPULAR_COURSES_API: {
    method: 'get',
    url: '/course/popular'
  },

  GET_COURSE_FOR_GUEST_API: {
    method: 'get',
    url: '/course'
  },

  GET_PURCHASED_COURSES_API: {
    method: 'get',
    url: '/course/purchased'
  },

  SEARCH_COURSES_API: {
    method: 'get',
    url: '/course/search'
  },

  // Learning
  GET_LEARNING_INFO_API: {
    method: 'get',
    url: '/learning/learning-info'
  },
  GET_LESSON_INFO_API: {
    method: 'get',
    url: '/learning/lesson-info'
  },
  GET_FREE_LESSON_VIDEO_URL_API: {
    method: 'get',
    url: '/learning/free/lesson-video'
  },
  GET_ATTACHMENT_SIGNED_URL_API: {
    method: 'get',
    url: '/learning/attachment/get-signed-url'
  },
  UPDATE_COMPLETED_LESSON_API: {
    method: 'post',
    url: '/learning/lesson/update-completed'
  },
  CHECK_COURSE_COMPLETED_API: {
    method: 'get',
    url: '/learning/course/check-completed'
  },
  GET_CERT_API: {
    method: 'get',
    url: '/learning/course/cert'
  },
  CREATE_CERT_API: {
    method: 'post',
    url: '/learning/course/cert'
  },
  CREATE_DISCUSSION_API: {
    method: 'post',
    url: '/learning/lesson/discussion'
  },
  CREATE_NOTE_API: {
    method: 'post',
    url: '/learning/lesson/note'
  },
  DELETE_NOTE_API: {
    method: 'deleted',
    url: '/learning/lesson/note'
  },
  REVIEW_COURSE_API: {
    method: 'post',
    url: '/learning/course/review'
  }
}
