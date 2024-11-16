'use strict'

const amqp = require('amqplib')
const { initializeSocketServer, broadcastMessage } = require('./init.websocket')

const connectToRabbitMQ = async () => {
  try {
    const connection = await amqp.connect('amqps://trolilrv:74LkbREC1HHd061d-Z1l74vSgnTcbVaz@armadillo.rmq.cloudamqp.com/trolilrv')
    if (!connection) throw new Error('Connection not established')

    const channel = await connection.createChannel()

    return {
      channel,
      connection
    }
  } catch (error) {
    console.log('Error connecting to RabbitMQ', error)
    throw error
  }
}

const connectToRabbitMQForTest = async () => {
  try {
    const { channel, connection } = await connectToRabbitMQ()

    // Publish message to a queue
    const queue = 'test-queue'
    const message = 'Hello'
    await channel.assertQueue(queue)
    await channel.sendToQueue(queue, Buffer.from(message))

    // close the connection
    await connection.close()
  } catch (error) {
    console.log(`Error connection to RabbitMQ`, error)
  }
}

const consumerQueue = async (channel, queueName) => {
  try {
    await channel.assertQueue(queueName, {
      durable: true
    })
    console.log(`Wating for message...`)

    channel.consume(
      queueName,
      msg => {
        const messageData = JSON.parse(msg.content.toString())
        console.log(`Received message: ${queueName}::`, messageData)
        const userId = messageData.receiver.id
        broadcastMessage(userId, messageData)
      },
      { noAck: true }
    )
  } catch (error) {
    console.error('error publish message to rabbitMQ::', error)
  }
}

module.exports = {
  connectToRabbitMQ,
  connectToRabbitMQForTest,
  consumerQueue
}
