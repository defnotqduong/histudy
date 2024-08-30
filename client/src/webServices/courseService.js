import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const createCourse = dataPost => {
  return connectServer[api.CREATE_COURSE_API.method](api.CREATE_COURSE_API.url, dataPost)
}

export const getCourse = (slug, dataPost) => {
  return connectServer[api.GET_COURSE_API.method](api.GET_COURSE_API.url + '/' + slug, dataPost)
}

export const getCourseForGuest = (slug, dataPost) => {
  return connectServer[api.GET_COURSE_FOR_GUEST_API.method](api.GET_COURSE_FOR_GUEST_API.url + '/' + slug, dataPost)
}

export const getPopularCourses = dataPost => {
  return connectServer[api.GET_POPULAR_COURSES_API.method](api.GET_POPULAR_COURSES_API.url, dataPost)
}

export const searchCourses = keyword => {
  const url = `${api.SEARCH_COURSES_API.url}?keyword=${encodeURIComponent(keyword)}`
  return connectServer[api.SEARCH_COURSES_API.method](url)
}

export const updateCourse = (slug, dataPost) => {
  return connectServer[api.UPDATE_COURSE_API.method](api.UPDATE_COURSE_API.url + '/' + slug, dataPost)
}

export const updateCourseThumbnail = (slug, dataPost, uploadProgress) => {
  const url = `/instructor/course/${slug}/thumbnail`
  const config = {
    headers: {
      'Content-Type': 'multipart/form-data'
    },
    onUploadProgress: progressEvent => {
      const progress = Math.round((progressEvent.loaded * 100) / progressEvent.total)
      uploadProgress(progress)
    }
  }
  return connectServer[api.UPDATE_THUMB_COURSE_API.method](url, dataPost, config)
}

export const publishCourse = (slug, dataPost) => {
  const url = `/instructor/course/${slug}/publish`
  return connectServer[api.PUBLISH_COURSE_API.method](url, dataPost)
}

export const unpublishCourse = (slug, dataPost) => {
  const url = `/instructor/course/${slug}/unpublish`
  return connectServer[api.UNPUBLISH_COURSE_API.method](url, dataPost)
}

export const deleteCourse = (slug, dataPost) => {
  const url = `/instructor/course/${slug}`
  return connectServer[api.DELETE_COURSE_API.method](url, dataPost)
}
