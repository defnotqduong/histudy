import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const getCourseForCheckout = id => {
  return connectServer[api.GET_COURSE_FOR_CHECKOUT_API.method](api.GET_COURSE_FOR_CHECKOUT_API.url + '/' + id)
}

export const checkoutCourse = id => {
  return connectServer[api.CHECKOUT_COURSE_API.method](api.CHECKOUT_COURSE_API.url + '/' + id)
}

export const getAllOrder = () => {
  return connectServer[api.GET_ALL_ORDER_API.method](api.GET_ALL_ORDER_API.url)
}

export const getAllInvoiceForInstructor = () => {
  return connectServer[api.GET_ALL_INVOICE_FOR_INSTRUCTOR_API.method](api.GET_ALL_INVOICE_FOR_INSTRUCTOR_API.url)
}
