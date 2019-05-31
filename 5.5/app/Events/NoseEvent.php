<?php

namespace App\Events;

class NoseEvent
{
    public $abc;

    public function __construct($abc)
    {
        $this->abc = $abc;
    }
}
