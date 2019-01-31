<?php
namespace Avana\EventBroadcast\Event;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendData implements ShouldBroadcast
// class SendData
{
    use InteractsWithSockets, SerializesModels;

    protected $message;
    protected $userId;
    protected $total;
    protected $current;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    // public function __construct($userId, $message, $total, $current)
    // {
    //     $this->message = $message;
    //     $this->userId = $userId;
    //     $this->total = $total;
    //     $this->current = $current;
    // }

    public function fire($job, $data)
    {
        try {
            print_r($data);
        
            $this->message = 'wak waw';
            $this->userId = 51;
            $this->total = 4;
            $this->current = 2;

            return new Channel('useronboarding.'.$this->userId);

        } catch (\Exception $e) {
            //
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('useronboarding.'.$this->userId);
    }

    // public function broadcastWith()
    // {
    //     $progress = round($this->current * 100 / $this->total, 2);
    //     return [
    //         'current' => $this->current,
    //         'total' => $this->total,
    //         'message' => $this->message,
    //         'progress' => $progress
    //     ];
    // }
}