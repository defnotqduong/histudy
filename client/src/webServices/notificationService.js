import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const getListNotiByUser = () => {
  return connectServer[api.GET_LIST_NOTI_BY_USER.method](api.GET_LIST_NOTI_BY_USER.url)
}
