<?php
namespace Avana\EventBroadcast\Event;

class SendData
{
    public function fire($job, $data)
    {
        try {
            print_r($data);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}