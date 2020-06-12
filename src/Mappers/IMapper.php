<?php

namespace VetScan\Mappers;

use VetScan\Models\IModel;

interface IMapper
{
    public function toObject(string $xml): IModel;

    public function toXml(IModel $obj): string;
}