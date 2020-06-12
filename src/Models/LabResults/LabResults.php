<?php

namespace VetScan\Models\LabResults;

use VetScan\Models\IModel;

class LabResults implements IModel
{
    public $results;

    public function __construct(array $results = [])
    {
        $this->results = $results;
    }

    public function addResult(LabResult $result)
    {
        $this->results[] = $result;
    }
}