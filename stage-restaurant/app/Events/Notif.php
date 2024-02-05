<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Notif implements ShouldBroadcast
{
    use   Dispatchable,SerializesModels;

    /**
     * Create a new event instance.
     *
     *
     */
    private  $notif; 
    public function __construct()
    {
       // $this->notif=$notif;
      
    }


    public function broadcastWith()
    {
        return ['message' => $this->notif];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * 
     */
    public function broadcastOn()
    {
            return new Channel('public');
    }
}
