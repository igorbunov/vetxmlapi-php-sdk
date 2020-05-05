<?php

namespace VetScan\Models;

class Device implements IModel
{
    private $id;
    private $type;
    private $displayName;
    private $softwareRevision;
    private $serialNumber;
    private $group;
    private $currentStatus;
    private $directoryOfServiceName;
    private $tests;

    public function __construct(
        string $id,
        string $type,
        string $displayName,
        string $softwareRevision,
        string $serialNumber,
        string $group = '',
        string $currentStatus,
        string $directoryOfServiceName,
        Tests $tests
    ) {
        $this->id = $id;
        $this->type = $type;
        $this->displayName = $displayName;
        $this->softwareRevision = $softwareRevision;
        $this->serialNumber = $serialNumber;
        $this->group = $group;
        $this->currentStatus = $currentStatus;
        $this->directoryOfServiceName = $directoryOfServiceName;
        $this->tests = $tests;
    }

    public function addTest(Test $test)
    {
        $this->tests->add($test);
    }
}