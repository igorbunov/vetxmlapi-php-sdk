<?php

namespace VetScan\Models;

class Devices implements IModel
{
    private $devices;

    public function __construct($devices = [])
    {
        $this->devices = $devices;
    }

    public function addDevice(Device $devices)
    {
        $this->devices[] = $devices;
    }
}