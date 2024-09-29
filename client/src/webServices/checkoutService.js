import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const getCourseForCheckout = id => {
  return connectServer[api.GET_COURSE_FOR_CHECKOUT_API.method](api.GET_COURSE_FOR_CHECKOUT_API.url + '/' + id)
}

export const checkoutCourse = id => {
  return connectServer[api.CHECKOUT_COURSE_API.method](api.CHECKOUT_COURSE_API.url + '/' + id)
}
