<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

// $connection = new AMQPStreamConnection('192.168.230.101', 5672, 'admin', 'admin');
$connection = new AMQPStreamConnection(
    '192.168.230.101', 
    5672, 
    'admin',  //user
    'admin',  //password
    'my_vhost'  //vhost
);
$channel = $connection->channel();

$channel->queue_declare('authentication', true, false, false, false);

$msg = new AMQPMessage('Hello World!');
$channel->basic_publish($msg, '', 'authentication');

echo " [x] Sent 'Hello World!'\n";

$channel->close();
$connection->close();
?>