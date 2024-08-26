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

export const updateCourseThumbnail = (slug, dataPost, uploadProgress) => {
  const url = `/course/${slug}/thumbnail`
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

export const createCourseAttachment = (slug, dataPost, uploadProgress) => {
  const url = `/course/${slug}/attachment`
  const config = {
    headers: {
      'Content-Type': 'multipart/form-data'
    },
    onUploadProgress: progressEvent => {
      const progress = Math.round((progressEvent.loaded * 100) / progressEvent.total)
      uploadProgress(progress)
    }
  }
  return connectServer[api.CREATE_ATTACHMENT_COURSE_API.method](url, dataPost, config)
}

export const deleteCourseAttachment = (slug, id, dataPost) => {
  const url = `/course/${slug}/attachment/${id}`
  return connectServer[api.DELETE_ATTACHMENT_COURSE_API.method](url, dataPost)
}
