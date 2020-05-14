<?php

namespace VetScan;

use GuzzleHttp\Client;
use VetScan\Mappers\DeviceMapper;
use VetScan\Mappers\DevicesMapper;
use VetScan\Mappers\DirectoryOfServiceMapper;
use VetScan\Mappers\GendersMapper;
use VetScan\Mappers\OrderMapping;
use VetScan\Mappers\ResponseMapper;
use VetScan\Mappers\SpeciesMapper;
use VetScan\Models\Device;
use VetScan\Models\Devices;
use VetScan\Models\DirectoryOfService;
use VetScan\Models\Genders;
use VetScan\Models\Order;
use VetScan\Models\Species;

class Vetxmlapi
{
    private $routes;
    private $client;
    private $headers;
    private $connectTimeout;

    public function __construct(Routes $routes, int $connectTimeoutSec = 5)
    {
        $this->routes = $routes;
        $this->client = new Client([
            'verify' => false,
            'http_errors' => false
        ]);

        $this->headers = [
            'Authorization' => $this->routes->authRoute(),
            'Content-Type' => 'application/xml',
            'Cache-Control' => 'no-cache, no-store, max-age=0, must-revalidate',
            'Pragma' => 'no-cache',
            'Accept-Encoding' => 'gzip, deflate, br',
            'Connection' => 'keep-alive'
        ];
        $this->connectTimeout = $connectTimeoutSec;
    }

    public function getDevices(): Devices
    {
        $xml = $this->client->request(
            'GET',
            $this->routes->getDevices(),
            [
                'connect_timeout' => $this->connectTimeout,
                'headers' => $this->headers
            ]
        )->getBody()->getContents();

        return (new DevicesMapper())->toObject($xml);
    }

    public function getDeviceById(string $deviceId): Device
    {
        $xml = $this->client->request(
            'GET',
            $this->routes->getDeviceById($deviceId),
            [
                'connect_timeout' => $this->connectTimeout,
                'headers' => $this->headers
            ]
        )->getBody()->getContents();

        return (new DeviceMapper())->toObject($xml);
    }

    public function getServices(): DirectoryOfService
    {
        $xml = $this->client->request(
            'GET',
            $this->routes->getServices(),
            [
                'connect_timeout' => $this->connectTimeout,
                'headers' => $this->headers
            ]
        )->getBody()->getContents();

        return (new DirectoryOfServiceMapper())->toObject($xml);
    }

    public function getServiceByCode(string $code): DirectoryOfService
    {
        $xml = $this->client->request(
            'GET',
            $this->routes->getServiceByCode($code),
            [
                'connect_timeout' => $this->connectTimeout,
                'headers' => $this->headers
            ]
        )->getBody()->getContents();

        return (new DirectoryOfServiceMapper())->toObject($xml);
    }

    public function getSpecies(): Species
    {
        $xml = $this->client->request(
            'GET',
            $this->routes->getSpecies(),
            [
                'connect_timeout' => $this->connectTimeout,
                'headers' => $this->headers
            ]
        )->getBody()->getContents();
//        pre($xml);
        return (new SpeciesMapper())->toObject($xml);
    }

    public function getGenders(): Genders
    {
        $xml = $this->client->request(
            'GET',
            $this->routes->getGenders(),
            [
                'connect_timeout' => $this->connectTimeout,
                'headers' => $this->headers
            ]
        )->getBody()->getContents();

        return (new GendersMapper())->toObject($xml);
    }

    public function createOrderInstantly(Order $order)
    {
        $request = $this->client->request(
            'POST',
            $this->routes->getCreateOrderInstantly(),
            [
                'connect_timeout' => $this->connectTimeout,
                'headers' => $this->headers,
                'body' => (new OrderMapping())->toXml($order)
            ]
        );

        $xml = $request->getBody()->getContents();

        return (new OrderMapping())->toObject($xml);
    }
}
