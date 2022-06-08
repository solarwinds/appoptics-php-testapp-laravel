<?php

namespace App\Events;

class NoseEvent
{
    /**
     * The message
     *
     * @var String
     */
    public $str;

    /**
     * Create a new event instance.
     *
     * @param String $str
     * @return void
     */
    public function __construct($str)
    {
        $this->str = $str;
    }
}
