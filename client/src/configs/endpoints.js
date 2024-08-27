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

  // Guest Routes
  // Course
  GET_POPULAR_COURSES_API: {
    method: 'get',
    url: '/course/popular'
  },

  GET_COURSE_FOR_GUEST_API: {
    method: 'get',
    url: '/course'
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

  // Attachment
  CREATE_ATTACHMENT_COURSE_API: {
    method: 'post',
    url: '/instructor/course/attachment'
  },
  DELETE_ATTACHMENT_COURSE_API: {
    method: 'deleted',
    url: '/instructor/course/attachment'
  },

  // Chapter
  CREATE_CHAPTER_COURSE_API: {
    method: 'post',
    url: '/instructor/course/chapter'
  },
  GET_CHAPTER_COURSE_API: {
    method: 'get',
    url: '/instructor/course/chapter'
  },
  REORDER_CHAPTER_COURSE_API: {
    method: 'put',
    url: '/instructor/course/chapter'
  },
  UPDATE_CHAPTER_COURSE_API: {
    method: 'patch',
    url: '/instructor/course/chapter'
  },
  UPLOAD_CHAPTER_VIDEO_API: {
    method: 'post',
    url: '/instructor/course/chapter'
  },
  PUBLISH_CHAPTER_COURSE_API: {
    method: 'patch',
    url: '/instructor/course/chapter'
  },
  UNPUBLISH_CHAPTER_COURSE_API: {
    method: 'patch',
    url: '/instructor/course/chapter'
  },
  DELETE_CHAPTER_COURSE_API: {
    method: 'deleted',
    url: '/instructor/course/chapter'
  },
  // Category
  GET_ALL_CATEGORY_API: {
    method: 'get',
    url: '/category'
  }
}
