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
  REFRESH_TOKEN_API: {
    method: 'post',
    url: '/auth/refresh'
  },
  GET_USER_PROFILE_API: {
    method: 'post',
    url: '/auth/profile'
  },
  LOGOUT_USER_API: {
    method: 'post',
    url: '/auth/logout'
  },

  // Course
  CREATE_COURSE_API: {
    method: 'post',
    url: '/course'
  },
  GET_COURSE_API: {
    method: 'get',
    url: '/course'
  },
  UPDATE_COURSE_API: {
    method: 'patch',
    url: '/course'
  },
  UPDATE_THUMB_COURSE_API: {
    method: 'post',
    url: '/course/thumbnail'
  },

  // Attachment
  CREATE_ATTACHMENT_COURSE_API: {
    method: 'post',
    url: '/course/attachment'
  },
  DELETE_ATTACHMENT_COURSE_API: {
    method: 'deleted',
    url: '/course/attachment'
  },

  // Chapter
  CREATE_CHAPTER_COURSE_API: {
    method: 'post',
    url: '/course/chapter'
  },
  GET_CHAPTER_COURSE_API: {
    method: 'get',
    url: '/course/chapter'
  },
  REORDER_CHAPTER_COURSE_API: {
    method: 'put',
    url: '/course/chapter'
  },

  // Category
  GET_ALL_CATEGORY_API: {
    method: 'get',
    url: '/category'
  }
}
