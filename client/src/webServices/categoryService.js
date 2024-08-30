import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const getAllCategories = dataPost => {
  return connectServer[api.GET_ALL_CATEGORY_API.method](api.GET_ALL_CATEGORY_API.url, dataPost)
}
