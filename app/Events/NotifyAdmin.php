<?php

namespace App\Events;

use App\Inventory;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NotifyAdmin
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $inventory;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Inventory $inventory)
    {
        //
        $this->inventory = $inventory;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
