<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserHasfavorited extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $name;
    public $bookname;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($name,$bookname)
    {
        $this->name     =   $name;
        $this->bookname =   $bookname;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['test'];
    }
}
