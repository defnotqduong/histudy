import api from '@/configs/endpoints'
import connectServer from '@/configs/connectServer'

export const getAllCert = () => {
  return connectServer[api.GET_ALL_CERT_API.method](api.GET_ALL_CERT_API.url)
}
