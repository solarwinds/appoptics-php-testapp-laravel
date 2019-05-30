<?php

namespace App\Listeners;

class NosetestSyncedListener
{
    public function handleNoseEvent($event) {
        usleep(1000);
    }

    public function subscribe($events)
    {
        $events->listen(
            'App\Events\NoseEvent',
            'App\Listeners\NosetestSyncedListener@handleNoseEvent'
        );
    }
}
