<?php

namespace VetScan\Models;

class Species implements IModel
{
    public $species = [];

    public function __construct(array $species = [])
    {
        $this->species = $species;
    }

    public function add(Specie $specie)
    {
        $this->species[] = $specie;
    }
}