import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const getAllPermission = () => {
  return connectServer[api.GET_ALL_PERMISSION_API.method](api.GET_ALL_PERMISSION_API.url)
}

export const createPermission = dataPost => {
  return connectServer[api.CREATE_PERMISSION_API.method](api.CREATE_PERMISSION_API.url, dataPost)
}

export const updatePermission = (id, dataPost) => {
  return connectServer[api.UPDATE_PERMISSION_API.method](api.UPDATE_PERMISSION_API.url + '/' + id, dataPost)
}

export const deletePermission = id => {
  return connectServer[api.DELETE_PERMISSION_API.method](api.DELETE_PERMISSION_API.url + '/' + id)
}

export const getAllRole = () => {
  return connectServer[api.GET_ALL_ROLE_API.method](api.GET_ALL_ROLE_API.url)
}

export const createRole = dataPost => {
  return connectServer[api.CREATE_ROLE_API.method](api.CREATE_ROLE_API.url, dataPost)
}

export const updateRole = (id, dataPost) => {
  return connectServer[api.UPDATE_ROLE_API.method](api.UPDATE_ROLE_API.url + '/' + id, dataPost)
}

export const deleteRole = id => {
  return connectServer[api.DELETE_ROLE_API.method](api.DELETE_ROLE_API.url + '/' + id)
}
