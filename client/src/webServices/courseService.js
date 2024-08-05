import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const createCourse = dataPost => {
  return connectServer[api.CREATE_COURSE_API.method](api.CREATE_COURSE_API.url, dataPost)
}
