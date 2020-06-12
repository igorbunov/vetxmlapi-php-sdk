<?php

namespace VetScan\Models;

class Setting implements IModel
{
    public $embedPDF;
    public $pollAttempts;

    public function __construct(bool $embedPDF, int $pollAttempts)
    {
        $this->embedPDF = $embedPDF;
        $this->pollAttempts = $pollAttempts;
    }

    public function getEmbedPDF(): bool
    {
        return $this->embedPDF;
    }

    public function getPollAttempts(): int
    {
        return $this->pollAttempts;
    }
}