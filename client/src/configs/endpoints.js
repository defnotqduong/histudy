import { method } from 'lodash'

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

  // Checkout
  GET_COURSE_FOR_CHECKOUT_API: {
    method: 'get',
    url: '/checkout/course'
  },

  CHECKOUT_COURSE_API: {
    method: 'post',
    url: '/checkout/course'
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

  GET_AUTHORED_COURSES_API: {
    method: 'get',
    url: '/course/authored'
  },

  GET_PURCHASED_COURSES_API: {
    method: 'get',
    url: '/course/purchased'
  },

  SEARCH_COURSES_API: {
    method: 'get',
    url: '/course/search'
  },

  // Instructor Routes
  // Course
  CREATE_COURSE_API: {
    method: 'post',
    url: '/instructor/course'
  },
  GET_COURSE_API: {
    method: 'get',
    url: '/instructor/course'
  },
  UPDATE_COURSE_API: {
    method: 'patch',
    url: '/instructor/course'
  },
  UPDATE_THUMB_COURSE_API: {
    method: 'post',
    url: '/instructor/course/thumbnail'
  },
  PUBLISH_COURSE_API: {
    method: 'patch',
    url: '/instructor/course/publish'
  },
  UNPUBLISH_COURSE_API: {
    method: 'patch',
    url: '/instructor/course/unpublish'
  },
  DELETE_COURSE_API: {
    method: 'deleted',
    url: '/instructor/course'
  },

  // Chapter
  CREATE_CHAPTER_API: {
    method: 'post',
    url: '/instructor/course/chapter'
  },
  GET_CHAPTER_API: {
    method: 'get',
    url: '/instructor/course/chapter'
  },
  REORDER_CHAPTER_API: {
    method: 'put',
    url: '/instructor/course/chapter'
  },
  UPDATE_CHAPTER_API: {
    method: 'patch',
    url: '/instructor/course/chapter'
  },
  UPLOAD_CHAPTER_VIDEO_API: {
    method: 'post',
    url: '/instructor/course/chapter'
  },
  PUBLISH_CHAPTER_API: {
    method: 'patch',
    url: '/instructor/course/chapter'
  },
  UNPUBLISH_CHAPTER_API: {
    method: 'patch',
    url: '/instructor/course/chapter'
  },
  DELETE_CHAPTER_API: {
    method: 'deleted',
    url: '/instructor/course/chapter'
  },
  // Lesson
  CREATE_LESSON_API: {
    method: 'post',
    url: '/instructor/course/chapter/lesson'
  },
  GET_LESSON_API: {
    method: 'get',
    url: '/instructor/course/chapter/lesson'
  },
  REORDER_LESSON_API: {
    method: 'put',
    url: '/instructor/course/chapter/lesson'
  },
  UPDATE_LESSON_API: {
    method: 'patch',
    url: '/instructor/course/chapter/lesson'
  },
  UPLOAD_LESSON_VIDEO_API: {
    method: 'post',
    url: '/instructor/course/chapter/lesson'
  },
  PUBLISH_LESSON_API: {
    method: 'patch',
    url: '/instructor/course/chapter/lesson'
  },
  UNPUBLISH_LESSON_API: {
    method: 'patch',
    url: '/instructor/course/chapter/lesson'
  },
  DELETE_LESSON_API: {
    method: 'deleted',
    url: '/instructor/course/chapter/lesson'
  },

  // Attachment
  CREATE_ATTACHMENT_API: {
    method: 'post',
    url: '/instructor/course/chapter/lesson/attachment'
  },
  DELETE_ATTACHMENT_API: {
    method: 'deleted',
    url: '/instructor/course/chapter/lesson/attachment'
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
  }
}
