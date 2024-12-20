'use strict'

const { consumerQueue, connectToRabbitMQ } = require('../dbs/init.rabbitmq')

const messageService = {
  consumerToQueue: async queueName => {
    try {
      const { channel, connection } = await connectToRabbitMQ()
      await consumerQueue(channel, queueName)
    } catch (error) {
      console.error('Error consumerToQueue:', error)
    }
  },

  // Case processing
  consumerToQueueNormal: async queueName => {
    try {
      const { channel, connection } = await connectToRabbitMQ()

      const notiQueue = 'notificationQueueProcess'

      // TH1: TTL
      // const timeExpried = 20000;
      // setTimeout(() => {
      //   channel.consume(notiQueue, (msg) => {
      //     console.log(
      //       `SEND notificationQueue successfully processed::`,
      //       msg.content.toString()
      //     );
      //     channel.ack(msg);
      //   });
      // }, timeExpried);

      channel.consume(notiQueue, msg => {
        try {
          const numberTest = Math.random()
          console.log({ numberTest })
          if (numberTest < 0.6) {
            throw new Error('Send notification failed:: HOT FIX')
          }

          console.log(`SEND notificationQueue successfully processed::`, msg.content.toString())
          channel.ack(msg)
        } catch (error) {
          // console.error("SEND notification error:", error);
          channel.nack(msg, false, false)
          /*
              nack: negative acknowledgement
           */
        }
      })
    } catch (error) {
      console.error(`Error in consumerToQueueNormal::`, error)
    }
  },

  // case failed processing
  consumerToQueueFailed: async queueName => {
    try {
      const { channel, connection } = await connectToRabbitMQ()

      const notificationExchangeDLX = 'notificationExDLX'
      const notificationRoutingKeyDLX = 'notificationRoutingKeyDLX'

      const notiQueueHandler = 'notificationQueueHotFix'

      await channel.assertExchange(notificationExchangeDLX, 'direct', {
        durable: true
      })

      const queueResult = await channel.assertQueue(notiQueueHandler, {
        exclusive: false
      })

      await channel.bindQueue(queueResult.queue, notificationExchangeDLX, notificationRoutingKeyDLX)

      await channel.consume(
        queueResult.queue,
        msgFailed => {
          console.log(`this notification error, pls hot fix::`, msgFailed.content.toString())
        },
        {
          noAck: true
        }
      )
    } catch (error) {
      console.error(error)
      throw error
    }
  }
}

module.exports = messageService
