import axios from 'axios'
import { TIMEOUT } from '@/configs/constantTypes'
import { refTokenUserStore, localEnUserStore, localEnRefreshUserStore, gtka } from '@/helpers/localStorageHelper'
import { useUserStore } from '@/stores'
import { BASE_API_URL } from '@/configs/baseUrl'

const connectServer = (config = {}) => {
  const userStore = useUserStore()

  let headersDefault = {
    'Content-Type': 'application/json; charset=utf-8'
  }
  let headers = config.headers ? { ...headersDefault, ...config.headers } : headersDefault

  const token = gtka()
  if (token) {
    headers.Authorization = `Bearer ${token}`
  }

  const api = axios.create({
    ...config,
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

        const tokens = await refTokenUserStore()

        if (!tokens.access_token) {
          userStore.logout()
          window.location.href = '/auth/login'
        } else {
          localEnUserStore(tokens.access_token)
          localEnRefreshUserStore(tokens.refresh_token)
          originalRequest.headers.Authorization = `Bearer ${tokens.access_token}`
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
  return `${BASE_API_URL}${path}`
}

export const get = async (path, data = {}, config = {}) => {
  try {
    path = endpointAccess(path)
    const res = await connectServer(config).get(path, data)
    return res.data
  } catch (err) {
    return err.response
  }
}

export const post = async (path, data = {}, config = {}) => {
  try {
    path = endpointAccess(path)
    const res = await connectServer(config).post(path, data)
    return res.data
  } catch (err) {
    return err.response
  }
}

export const put = async (path, data = {}, config = {}) => {
  try {
    path = endpointAccess(path)
    const res = await connectServer(config).put(path, data)
    return res.data
  } catch (err) {
    return err.response
  }
}

export const patch = async (path, data = {}, config = {}) => {
  try {
    path = endpointAccess(path)
    const res = await connectServer(config).patch(path, data)
    return res.data
  } catch (err) {
    return err.response
  }
}

export const deleted = async (path, data = {}, config = {}) => {
  try {
    path = endpointAccess(path)
    const res = await connectServer(config).delete(path, data)
    return res.data
  } catch (err) {
    return err.response
  }
}

export default { get, post, put, patch, deleted, endpointAccess }
