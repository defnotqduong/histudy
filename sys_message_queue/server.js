'use strict'

const { consumerToQueue, consumerToQueueNormal, consumerToQueueFailed } = require('./src/services/consumerQueue.service')

const { initializeSocketServer } = require('./src/dbs/init.websocket')

initializeSocketServer(8080)

const queueName = 'notifications'

consumerToQueue(queueName)
  .then(() => {
    console.log(`Message consumer started ${queueName}`)
  })
  .catch(error => {
    console.error(`Message error: ${error.message}`)
  })

// consumerToQueueNormal(queueName)
//   .then(() => {
//     console.log(`Message consumerToQueueNormal started`)
//   })
//   .catch(err => {
//     console.error(`Message Error: ${err.message}`)
//   })

// consumerToQueueFailed(queueName)
//   .then(() => {
//     console.log(`Message consumerToQueueFailed started`)
//   })
//   .catch(err => {
//     console.error(`Message Error: ${err.message}`)
//   })

/// xxx
