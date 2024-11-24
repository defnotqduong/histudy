import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const getAllCategories = dataPost => {
  return connectServer[api.GET_ALL_CATEGORY_API.method](api.GET_ALL_CATEGORY_API.url, dataPost)
}

export const getAllCategoryForInstructor = dataPost => {
  return connectServer[api.GET_ALL_CATEGORY_FOR_INSTRUCTOR_API.method](api.GET_ALL_CATEGORY_FOR_INSTRUCTOR_API.url, dataPost)
}

export const getCategoryForInstructor = id => {
  return connectServer[api.GET_CATEGORY_FOR_INSTRUCTOR_API.method](api.GET_CATEGORY_FOR_INSTRUCTOR_API.url + '/' + id)
}

export const createCategory = dataPost => {
  return connectServer[api.CREATE_CATEGORY_API.method](api.CREATE_CATEGORY_API.url, dataPost)
}

export const updateCategory = (id, dataPost) => {
  return connectServer[api.UPDATE_CATEGORY_API.method](api.UPDATE_CATEGORY_API.url + '/' + id, dataPost)
}

export const updateCategoryLogo = (id, dataPost, uploadProgress) => {
  const url = `/instructor/category/${id}/logo`
  const config = {
    headers: {
      'Content-Type': 'multipart/form-data'
    },
    onUploadProgress: progressEvent => {
      const progress = Math.round((progressEvent.loaded * 100) / progressEvent.total)
      uploadProgress(progress)
    }
  }
  return connectServer[api.UPDATE_LOGO_CATEGORY_API.method](url, dataPost, config)
}

export const publishCategory = id => {
  const url = `/instructor/category/${id}/publish`
  return connectServer[api.PUBLISH_CATEGORY_API.method](url)
}

export const unpublishCategory = id => {
  const url = `/instructor/category/${id}/unpublish`
  return connectServer[api.UNPUBLISH_CATEGORY_API.method](url)
}

export const deleteCategory = id => {
  return connectServer[api.DELETE_CATEGORY_API.method](api.DELETE_CATEGORY_API.url + '/' + id)
}
