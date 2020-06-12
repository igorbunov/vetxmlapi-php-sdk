<?php

namespace VetScan\Models;

class Genders implements IModel
{
    public $genders = [];

    public function __construct(array $genders = [])
    {
        $this->genders = $genders;
    }

    public function add(Gender $gender)
    {
        $this->genders[] = $gender;
    }
}