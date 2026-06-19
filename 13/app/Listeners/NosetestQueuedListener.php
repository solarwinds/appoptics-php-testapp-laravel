<?php

namespace App\Listeners;

use App\Events\NoseEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NosetestQueuedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NoseEvent $event): void
    {
        usleep(1000);
    }
}
