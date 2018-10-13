<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('newQue', false, false, false, false);
//$channel->queue_declare('wdwedenewQue', false, false, false, false);


$msg = new AMQPMessage(' new queue!');


$channel->basic_publish($msg, '', 'newQue');

echo " [x] Sent 'Hello World!'\n";
$channel->close();
$connection->close();
?>
