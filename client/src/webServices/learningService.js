import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const getLearningInfo = slug => {
  return connectServer[api.GET_LEARNING_INFO_API.method](api.GET_LEARNING_INFO_API.url + '/' + slug)
}
