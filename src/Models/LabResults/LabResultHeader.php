<?php

namespace VetScan\Models\LabResults;

use VetScan\Models\IModel;

class LabResultHeader implements IModel
{
    private $testCode;
    private $testName;
    private $testType;
    private $resultDate;
    private $resultStatus;

    public function __construct($testCode, $testName = '', $testType = '', $resultDate = '', $resultStatus = '')
    {
        $this->testCode = $testCode;
        $this->testName = $testName;
        $this->testType = $testType;
        $this->resultDate = $resultDate;
        $this->resultStatus = $resultStatus;
    }
}