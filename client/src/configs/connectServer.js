import axios from 'axios'
import { TIMEOUT } from '@/configs/constantTypes'
import { refTokenUserStore, gtka } from '@/helpers/localStorageHelper'

const connectServer = config => {
  let headersDefault = {
    'Content-Type': 'application/json; charset=utf-8'
  }
  let headers = config.headers ? { ...headersDefault, ...config.headers } : headersDefault

  const token = gtka()
  if (token) {
    headers.Authorization = `Bearer ${token}`
  }

  const api = axios.create({
    headers: headers
  })

  api.interceptors.response.use(
    response => {
      return response
    },
    async error => {
      const originalRequest = error.config
      if (error.response?.status === 401 && !originalRequest._retry) {
        originalRequest._retry = true

        const { access_token, refresh_token } = await refTokenUserStore()

        if (!access_token) {
          window.location.href = '/auth/login'
        } else {
          originalRequest.headers.Authorization = `Bearer ${access_token}`
          return api(originalRequest)
        }
      } else {
        return Promise.reject(error)
      }
    }
  )

  return api
}

export const endpointAccess = path => {
  const endpoint = import.meta.env.PROD == true ? import.meta.env.VITE_API_PROD : import.meta.env.VITE_API_DEV
  return `${endpoint}${path}`
}

export const get = async (path, data = {}, config = {}) => {
  try {
    path = endpointAccess(path)
    const res = await connectServer(config).get(path, data)
    return res.data
  } catch (err) {
    console.log('catch api GET:', err)
    return err.response
  }
}

export const post = async (path, data = {}, config = {}) => {
  try {
    path = endpointAccess(path)
    const res = await connectServer(config).post(path, data)
    return res.data
  } catch (err) {
    console.log('catch api POST: ', err)
    return err.response
  }
}

export const put = async (path, data = {}, config = {}) => {
  try {
    path = endpointAccess(path)
    const res = await connectServer(config).put(path, data)
    return res.data
  } catch (err) {
    console.log('catch api PUT: ', err)
    return err.response
  }
}

export const deleted = async (path, data = {}, config = {}) => {
  try {
    path = endpointAccess(path)
    const res = await connectServer(config).delete(path, data)
    return res.data
  } catch (err) {
    console.log('catch api DELETE: ', err)
    return err.response
  }
}

export default { get, post, put, deleted, endpointAccess }