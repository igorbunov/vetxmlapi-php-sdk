<?php

namespace VetScan\Models;

class Devices implements IModel
{
    public $devices;

    public function __construct($devices = [])
    {
        $this->devices = $devices;
    }

    public function addDevice(Device $devices)
    {
        $this->devices[] = $devices;
    }
}