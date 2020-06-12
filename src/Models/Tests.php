<?php

namespace VetScan\Models;

class Tests implements IModel
{
    public $tests = [];

    public function __construct(array $tests = [])
    {
        $this->tests = $tests;
    }

    public function add(Test $test)
    {
        $this->tests[] = $test;
    }
}