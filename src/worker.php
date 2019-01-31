<?php

use Illuminate\Queue\Worker;
use Illuminate\Events\Dispatcher;
use Illuminate\Queue\WorkerOptions;
use Avana\EventBroadcast\Exception\MyQueueException;

$queue = require 'init.php';

$dispatcher = new Dispatcher();

$worker = new Worker($queue->getQueueManager(), $dispatcher, new MyQueueException());

$options = new WorkerOptions();

$options->timeout = 300;

$options->maxTries = 1;

echo "running..\n";

$worker->daemon('redis', 'default', $options);
