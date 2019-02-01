<?php
$queue = require 'init.php';

try {
	$data = ['message' => 'Hello, world!'];
	$queue->push('Adiputra\EventBroadcast\Event\SendData', $data);
} catch (\Exception $e) {
	echo $e->getMessage();
}