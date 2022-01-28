<?php

namespace App\Listeners;

use App\Events\NoseEvent;

class NosetestSyncedListener
{
    /**
     * Handle nosetest events.
     */
    public function handleNoseEvent($event) {
        usleep(1000);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param App\Events\NoseEvent $events
     * @return void
     */
    public function subscribe($events)
    {
        // return [
        //     NoseEvent::class => 'handleNoseEvent',
        // ];
        $events->listen(
            'App\Events\NoseEvent',
            'App\Listeners\NosetestSyncedListener@handleNoseEvent'
        );
    }
}
