<?php

namespace VetScan\Models;

class Gender implements IModel
{
    public $sex;

    public function __construct($sex)
    {
        $this->sex = $sex;
    }

    public function sex(): string
    {
        return $this->sex;
    }
}