import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const getAllUser = () => {
  return connectServer[api.GET_ALL_USER_API.method](api.GET_ALL_USER_API.url)
}

export const getUser = id => {
  return connectServer[api.GET_USER_API.method](api.GET_USER_API.url + '/' + id)
}

export const createUser = dataPost => {
  return connectServer[api.CREATE_USER_API.method](api.CREATE_USER_API.url, dataPost)
}

export const updateUser = (id, dataPost) => {
  return connectServer[api.UPDATE_USER_API.method](api.UPDATE_USER_API.url + '/' + id, dataPost)
}

export const deleteUser = id => {
  return connectServer[api.DELETE_USER_API.method](api.DELETE_USER_API.url + '/' + id)
}
