<?php

namespace VetScan\Models;

class Link implements IModel
{
    public $href;
    public $method;
    public $rel;
    public $type;

    public function __construct(string $href, string $method, string $rel, string $type)
    {
        $this->href = $href;
        $this->method = $method;
        $this->rel = $rel;
        $this->type = $type;
    }

    public function getHref(): string
    {
        return $this->href;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getRel(): string
    {
        return $this->rel;
    }

    public function getType(): string
    {
        return $this->type;
    }

}
