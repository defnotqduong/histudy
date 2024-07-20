import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const registerUser = dataPost => {
  return connectServer[api.REGISTER_USER_API.method](api.REGISTER_USER_API.url, dataPost)
}

export const loginUser = dataPost => {
  return connectServer[api.LOGIN_USER_API.method](api.LOGIN_USER_API.url, dataPost)
}

export default { registerUser, loginUser }
