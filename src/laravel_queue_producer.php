<?php
$queue = require 'init.php';

try {
	$data = ['message' => 'Hello, world!'];
	$queue->push('Avana\EventBroadcast\Event\SendData', $data);
} catch (\Exception $e) {
	echo $e->getMessage();
}