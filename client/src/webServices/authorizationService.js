import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const registerUser = dataPost => {
  return connectServer[api.REGISTER_USER_API.method](api.REGISTER_USER_API.url, dataPost)
}

export const loginUser = dataPost => {
  return connectServer[api.LOGIN_USER_API.method](api.LOGIN_USER_API.url, dataPost)
}

export const refreshToken = dataPost => {
  return connectServer[api.REFRESH_TOKEN_API.method](api.REFRESH_TOKEN_API.url, dataPost)
}

export const getUserProfile = dataPost => {
  return connectServer[api.GET_USER_PROFILE_API.method](api.GET_USER_PROFILE_API.url, dataPost)
}

export const logoutUser = dataPost => {
  return connectServer[api.LOGOUT_USER_API.method](api.LOGOUT_USER_API.url, dataPost)
}
