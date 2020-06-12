<?php

namespace VetScan\Models;

class Specie implements IModel
{
    public $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function type(): string
    {
        return $this->type;
    }
}