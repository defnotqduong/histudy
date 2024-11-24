import { method } from 'lodash'

export default {
  // Authorized User
  LOGIN_AUTHORIZED_USER_API: {
    method: 'post',
    url: '/auth/login/authorized-user'
  },
  REFRESH_TOKEN_API: {
    method: 'post',
    url: '/auth/refresh'
  },
  GET_USER_PROFILE_API: {
    method: 'get',
    url: '/auth/profile'
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

  // Notification Routes

  GET_LIST_NOTI_BY_USER: {
    method: 'get',
    url: '/notifications'
  },

  // Instructor Routes

  // User

  GET_ALL_USER_API: {
    method: 'get',
    url: '/users'
  },

  GET_USER_API: {
    method: 'get',
    url: '/users'
  },

  CREATE_USER_API: {
    method: 'post',
    url: '/users'
  },

  UPDATE_USER_API: {
    method: 'patch',
    url: '/users'
  },

  DELETE_USER_API: {
    method: 'deleted',
    url: '/users'
  },

  // Permission
  GET_ALL_PERMISSION_API: {
    method: 'get',
    url: '/permission'
  },

  GET_PERMISSION_API: {
    method: 'get',
    url: '/permission'
  },

  CREATE_PERMISSION_API: {
    method: 'post',
    url: '/permission'
  },

  UPDATE_PERMISSION_API: {
    method: 'patch',
    url: '/permission'
  },

  DELETE_PERMISSION_API: {
    method: 'deleted',
    url: '/permission'
  },

  // Role
  GET_ALL_ROLE_API: {
    method: 'get',
    url: '/role'
  },

  GET_ROLE_API: {
    method: 'get',
    url: '/role'
  },

  CREATE_ROLE_API: {
    method: 'post',
    url: '/role'
  },

  UPDATE_ROLE_API: {
    method: 'patch',
    url: '/role'
  },

  DELETE_ROLE_API: {
    method: 'deleted',
    url: '/role'
  },

  // Category
  GET_ALL_CATEGORY_FOR_INSTRUCTOR_API: {
    method: 'get',
    url: '/instructor/category'
  },

  GET_CATEGORY_FOR_INSTRUCTOR_API: {
    method: 'get',
    url: '/instructor/category'
  },

  CREATE_CATEGORY_API: {
    method: 'post',
    url: '/instructor/category'
  },

  UPDATE_CATEGORY_API: {
    method: 'patch',
    url: '/instructor/category'
  },

  UPDATE_LOGO_CATEGORY_API: {
    method: 'post',
    url: '/instructor/category'
  },

  PUBLISH_CATEGORY_API: {
    method: 'patch',
    url: '/instructor/category/publish'
  },

  UNPUBLISH_CATEGORY_API: {
    method: 'patch',
    url: '/instructor/category/unpublish'
  },

  DELETE_CATEGORY_API: {
    method: 'deleted',
    url: '/instructor/category'
  },

  // Invoice

  GET_ALL_INVOICE_FOR_INSTRUCTOR_API: {
    method: 'get',
    url: '/instructor/invoice'
  },

  // Course
  GET_AUTHORED_COURSES_API: {
    method: 'get',
    url: '/instructor/course/authored'
  },
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
  }
}
