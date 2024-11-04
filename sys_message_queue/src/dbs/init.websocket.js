'use strict'

const { Server } = require('socket.io')
const clients = {}

const initializeSocketServer = (port = 8080) => {
  const io = new Server(port, {
    cors: {
      origin: '*',
      methods: ['GET', 'POST']
    }
  })

  console.log(`Socket.IO server is running on port ${port}`)

  io.on('connection', socket => {
    const userId = socket.handshake.query.id
    clients[userId] = socket

    console.log(`Client ${userId} connected to WebSocket`)

    socket.on('disconnect', () => {
      console.log(`Client ${userId} disconnected from WebSocket`)
      delete clients[userId]
    })
  })

  return io
}

const broadcastMessage = (userId, messageData) => {
  const clientSocket = clients[userId]

  if (clientSocket) {
    clientSocket.emit('message', messageData)
    console.log(`Sent message to userId ${userId}: ${JSON.stringify(messageData)}`)
  } else {
    console.log(`Client ${userId} is not connected or does not exist.`)
  }
}

module.exports = { initializeSocketServer, broadcastMessage }
