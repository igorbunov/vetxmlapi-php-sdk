<?php

namespace VetScan;

interface IConfig
{
    public function __construct(array $data);

    public function get(string $name): string;
}
