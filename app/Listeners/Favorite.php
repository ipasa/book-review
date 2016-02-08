<?php

namespace App\Listeners;

use App\Events\UserHasfavorited;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Favorite
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserHasfavorited  $event
     * @return void
     */
    public function welcome(UserHasfavorited $event)
    {
        //var_dump('The user '.$event->name);
    }
}
