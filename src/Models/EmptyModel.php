<?php

namespace VetScan\Models;

class EmptyModel implements IModel
{
    public $isDone = false;

    public function __construct($isDone)
    {
        $this->isDone = $isDone;
    }
}
