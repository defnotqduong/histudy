import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const getWishlist = dataPost => {
  return connectServer[api.GET_WISHLIST_API.method](api.GET_WISHLIST_API.url, dataPost)
}

export const addCourseToWishlist = dataPost => {
  return connectServer[api.ADD_COURSE_TO_WISHLIST_API.method](api.ADD_COURSE_TO_WISHLIST_API.url, dataPost)
}

export const removeCourseFromWishlist = id => {
  return connectServer[api.REMOVE_COURSE_FROM_WISHLIST_API.method](api.REMOVE_COURSE_FROM_WISHLIST_API.url + '/' + id)
}
