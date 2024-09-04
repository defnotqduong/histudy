import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const getCart = dataPost => {
  return connectServer[api.GET_CART_API.method](api.GET_CART_API.url, dataPost)
}

export const addCourseToCart = dataPost => {
  return connectServer[api.ADD_COURSE_TO_CART_API.method](api.ADD_COURSE_TO_CART_API.url, dataPost)
}

export const removeCourseFromCart = id => {
  return connectServer[api.REMOVE_COURSE_FROM_CART_API.method](api.REMOVE_COURSE_FROM_CART_API.url + '/' + id)
}
