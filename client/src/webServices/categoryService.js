import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const getAllCategories = dataPost => {
  return connectServer[api.GET_ALL_CATEGORY_API.method](api.GET_ALL_CATEGORY_API.url, dataPost)
}

export const getPopularCategories = dataPost => {
  return connectServer[api.GET_POPULAR_CATEGORIES_API.method](api.GET_POPULAR_CATEGORIES_API.url, dataPost)
}
