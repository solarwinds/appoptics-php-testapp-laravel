<?php

namespace App\Listeners;

use App\Events\NoseEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

class NosetestQueuedListener implements ShouldQueue
{
    public function handle(NoseEvent $event)
    {
        usleep(1000);
        // echo 'QueuedListener: ' . $event->str . ' ';
    }
}
