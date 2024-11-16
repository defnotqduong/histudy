<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Queue;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use VladimirYuldashev\LaravelQueueRabbitMQ\Queue\Jobs\RabbitMQJob;


class SendRabbitMQNotification
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $messageData;

    public function __construct(array $messageData)
    {
        $this->messageData = $messageData;
    }

    public function handle(): void
    {

        $host = config('services.rabbitmq.host');
        $port = config('services.rabbitmq.port');
        $username = config('services.rabbitmq.username');
        $password = config('services.rabbitmq.password');
        $vhost = config('services.rabbitmq.vhost');
        $queue = config('services.rabbitmq.queue');

        $connection = new AMQPStreamConnection(
            $host,
            $port,
            $username,
            $password,
            $vhost
        );

        $channel = $connection->channel();

        $channel->queue_declare($queue, false, true, false, false);

        // Encode message data to JSON
        $msg = new AMQPMessage(json_encode($this->messageData));
        $channel->basic_publish($msg, '', $queue);

        $channel->close();
        $connection->close();
    }
}
