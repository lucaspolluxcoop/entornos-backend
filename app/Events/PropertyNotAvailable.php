<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PropertyNotAvailable
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $property;
    public $newContract;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($property, $newContract)
    {
        $this->property = $property;
        $this->newContract = $newContract;
    }
}
