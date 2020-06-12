<?php

namespace VetScan\Models;

class Section implements IModel
{
    public $name;
    public $tests;

    public function __construct(string $name, array $tests = [])
    {
        $this->name = $name;
        $this->tests = $tests;
    }

    public function add(string $name, Tests $tests)
    {
        $this->name = $name;
        $this->tests = $tests;
    }

    public function addTest(Test $test)
    {
        $this->tests[] = $test;
    }
}