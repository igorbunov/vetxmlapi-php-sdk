<?php

namespace VetScan\Mappers;

use VetScan\Models\Device;
use VetScan\Models\Devices;
use VetScan\Models\IModel;
use VetScan\Models\Test;
use VetScan\Models\Tests;

class DevicesMapper implements IMapper
{
    public function toObject(string $xml): IModel
    {
        $obj = simplexml_load_string($xml);
        $result = new Devices();

        foreach ($obj->Device as $device) {
            $tests = new Tests();

            foreach ($device->Tests as $test) {
                $tests->add(new Test(strval($test->Test)));
            }

            $deviceClass = new Device(
                strval($device->Id),
                strval($device->Type),
                strval($device->DisplayName),
                strval($device->SoftwareRevision),
                strval($device->SerialNumber),
                strval($device->Group),
                strval($device->CurrentStatus),
                strval($device->DirectoryOfServiceSections->DirectoryOfServiceSection),
                $tests
            );

            $result->addDevice($deviceClass);
        }

        return $result;
    }

    public function toXml(IModel $obj): string
    {
        // TODO: Implement toXml() method.
    }
}