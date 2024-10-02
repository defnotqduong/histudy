import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const getCert = () => {
  return connectServer[api.GET_CERT_API.method](api.GET_CERT_API.url)
}
