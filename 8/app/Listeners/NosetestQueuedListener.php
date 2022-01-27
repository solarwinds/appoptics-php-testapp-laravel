<?php

namespace App\Listeners;

use App\Events\NoseEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

class NosetestQueuedListener implements ShouldQueue
{
    public function handle(NoseEvent $event)
    {
        echo 'QueuedListener: ' . $event->str . ' ';
    }
}