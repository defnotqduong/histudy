import { io } from 'socket.io-client'
import { BASE_WS_URL } from '@/configs/baseUrl'

export const connectSocket = userId => {
  const socket = io(BASE_WS_URL, {
    query: { id: userId },
    transports: ['websocket']
  })

  return socket
}
