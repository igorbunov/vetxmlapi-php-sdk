<?php

namespace VetScan\Models;

class DirectoryOfService implements IModel
{
    private $sections;

    public function __construct($sections = [])
    {
        $this->sections = $sections;
    }

    public function addSection(Section $section)
    {
        $this->sections[] = $section;
    }
}