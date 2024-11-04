import { io } from 'socket.io-client'

export const connectSocket = userId => {
  const wsEndpoint = import.meta.env.PROD ? import.meta.env.VITE_WS_API_PROD : import.meta.env.VITE_WS_API_DEV
  const socket = io(wsEndpoint, {
    query: { id: userId },
    transports: ['websocket']
  })

  return socket
}
