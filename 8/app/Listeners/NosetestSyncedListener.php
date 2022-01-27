<?php

namespace App\Listeners;

use App\Events\NoseEvent;

class NosetestSyncedListener
{
    /**
     * Handle nosetest events.
     */
    public function handleNoseEvent($event) {
        echo 'SyncedListener: ' . $event->str . ' ';
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param App\Events\NoseEvent $events
     * @return void
     */
    public function subscribe($events)
    {
        return [
            NoseEvent::class => 'handleNoseEvent',
        ];
    }
}
