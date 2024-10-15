<?php

namespace App\Services;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQService
{
    protected $connection;
    protected $channel;

    public function __construct()
    {
        $this->connection = new AMQPStreamConnection(
            env('RABBITMQ_HOST', '127.0.0.1'),
            env('RABBITMQ_PORT', 5672),
            env('RABBITMQ_USER', 'guest'),
            env('RABBITMQ_PASSWORD', '12345'),
            env('RABBITMQ_VHOST', '/')
        );

        $this->channel = $this->connection->channel();
    }

    public function publishMessage($queue, $message)
    {
        $this->channel->queue_declare($queue, false, false, false, false);
        $msg = new AMQPMessage($message);
        $this->channel->basic_publish($msg, '', $queue);
    }

    public function closeConnection()
    {
        $this->channel->close();
        $this->connection->close();
    }
}
