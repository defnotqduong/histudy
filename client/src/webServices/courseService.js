import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const createCourse = dataPost => {
  return connectServer[api.CREATE_COURSE_API.method](api.CREATE_COURSE_API.url, dataPost)
}

export const getCourse = (slug, dataPost) => {
  return connectServer[api.GET_COURSE_API.method](api.GET_COURSE_API.url + '/' + slug, dataPost)
}

export const updateCourse = (slug, dataPost) => {
  return connectServer[api.UPDATE_COURSE_API.method](api.UPDATE_COURSE_API.url + '/' + slug, dataPost)
}

export const updateCourseThumbnail = (slug, dataPost) => {
  const url = `/course/${slug}/update-thumbnail`
  const config = {
    headers: {
      'Content-Type': 'multipart/form-data'
    }
  }

  return connectServer[api.UPDATE_THUMB_COURSE_API.method](url, dataPost, config)
}