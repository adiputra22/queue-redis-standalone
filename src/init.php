<?php

require '../vendor/autoload.php';

use Illuminate\Queue\Capsule\Manager as QueueManager;
use Illuminate\Redis\RedisManager;

use Adiputra\EventBroadcast\Event\SendData;
use Adiputra\EventBroadcast\Exception\MyQueueException;
use Adiputra\EventBroadcast\Container\AppContainer;

$queue = new QueueManager(new AppContainer());
$container = $queue->getContainer();
$container['config']['database.redis'] = [
    'cluster' => false,
    'default' => [
        'host' => '127.0.0.1',
        'password' => null,
        'port' => 6379,
        'database' => 0,
    ],
];

$container['redis'] = new RedisManager('predis',$container['config']['database.redis']);

$container['config']["queue.connections.redis"] = [
    'driver' => 'redis',
    'connection' => 'default',
    'queue' => 'default'
];

$queue->addConnection([
    'driver' => 'redis',
    'connection' => 'default',
    'queue' => 'default'
]);

$queue->setAsGlobal();

return $queue;