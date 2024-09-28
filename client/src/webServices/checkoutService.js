import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const getCourseForCheckout = id => {
  return connectServer[api.GET_COURSE_FOR_CHECKOUT_API.method](api.GET_COURSE_FOR_CHECKOUT_API.url + '/' + id)
}
