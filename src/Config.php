<?php

namespace VetScan;

class Config implements IConfig
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function get(string $name): string
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        throw new \Exception("Error: '{$name}'' not found in config class");
    }

}
