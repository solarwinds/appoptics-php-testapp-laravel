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
        /**
         * The nosetest can only instrument the default handle function of the listener.
         * It cannot instrument the user-defined handle function from subscriber.
         */
        // return [
        //     NoseEvent::class => 'handleNoseEvent',
        // ];
        $events->listen(
            'App\Events\NoseEvent',
            'App\Listeners\NosetestSyncedListener@handleNoseEvent'
        );
    }
}
