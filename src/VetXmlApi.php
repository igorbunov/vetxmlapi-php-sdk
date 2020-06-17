<?php

namespace VetScan;

use GuzzleHttp\Client;
use VetScan\Mappers\BatchResultsMapper;
use VetScan\Mappers\ClientsMapper;
use VetScan\Mappers\DeviceMapper;
use VetScan\Mappers\DevicesMapper;
use VetScan\Mappers\DirectoryOfServiceMapper;
use VetScan\Mappers\GendersMapper;
use VetScan\Mappers\LabApiLinksMapper;
use VetScan\Mappers\MultipleOrdersMapping;
use VetScan\Mappers\OrderMapping;
use VetScan\Mappers\OrderLabResultMapping;
use VetScan\Mappers\OrdersMapping;
use VetScan\Mappers\ResponseMapper;
use VetScan\Mappers\SettingsMapper;
use VetScan\Mappers\SpeciesMapper;
use VetScan\Models\Device;
use VetScan\Models\Devices;
use VetScan\Models\DirectoryOfService;
use VetScan\Models\Genders;
use VetScan\Models\IModel;
use VetScan\Models\LabResults\TotalLabResult;
use VetScan\Models\LabResults\TotalLabResults;
use VetScan\Models\OrderResult;
use VetScan\Models\Species;

class VetXmlApi
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

    public function getSettings()
    {
        $request = $this->client->request(
            'GET',
            $this->routes->getSettings(),
            [
                'connect_timeout' => $this->connectTimeout,
                'headers' => $this->headers
            ]
        );

        $xml = $request->getBody()->getContents();

        return (new SettingsMapper())->toObject($xml);
    }

    public function setSettings(IModel $model)
    {
        $request = $this->client->request(
            'POST',
            $this->routes->getSettings(),
            [
                'connect_timeout' => $this->connectTimeout,
                'headers' => $this->headers,
                'body' => (new SettingsMapper())->toXml($model)
            ]
        );

        $xml = $request->getBody()->getContents();

        return (new SettingsMapper())->toObject($xml);
    }

    public function getClients()
    {
        $request = $this->client->request(
            'GET',
            $this->routes->getClients(),
            [
                'connect_timeout' => $this->connectTimeout,
                'headers' => $this->headers
            ]
        );

        $xml = $request->getBody()->getContents();

        return (new ClientsMapper())->toObject($xml);
    }

    public function getLabApiLinks()
    {
        $xml = $this->client->request(
            'GET',
            $this->routes->getLabApiLinks(),
            [
                'connect_timeout' => $this->connectTimeout,
                'headers' => $this->headers
            ]
        )->getBody()->getContents();

        return (new LabApiLinksMapper())->toObject($xml);
    }

    public function getPendingOrders()
    {
        $xml = $this->client->request(
            'GET',
            $this->routes->getPendingOrders(),
            [
                'connect_timeout' => $this->connectTimeout,
                'headers' => $this->headers
            ]
        )->getBody()->getContents();

        return (new OrdersMapping())->toObject($xml);
    }

    public function getOrderByPractiseRef(string $practiceRef)
    {
        $xml = $this->client->request(
            'GET',
            $this->routes->getOrderByPractiseRef($practiceRef),
            [
                'connect_timeout' => $this->connectTimeout,
                'headers' => $this->headers
            ]
        )->getBody()->getContents();

        return (new OrderMapping())->toObject($xml);
    }

    public function getOrderResultByPractiseRef(string $practiceRef)
    {
        $xml = $this->client->request(
            'GET',
            $this->routes->getOrderResultByPractiseRef($practiceRef),
            [
                'connect_timeout' => $this->connectTimeout,
                'headers' => $this->headers
            ]
        )->getBody()->getContents();

        return (new OrderLabResultMapping())->toObject($xml);
    }

    public function getOrderSearch(string $providerID, string $status)
    {
        $xml = $this->client->request(
            'GET',
            $this->routes->getOrderSearch(),
            [
                'connect_timeout' => $this->connectTimeout,
                'headers' => $this->headers
            ], [
                'query' => [
                    'providerid' => $providerID,
                    'status' => $status
                ]
            ]
        )->getBody()->getContents();

        return (new OrdersMapping())->toObject($xml);
    }

    public function getOrdersByProviderClientStatus(
        string $providerID,
        string $status,
        string $clientId
    ) {
        $xml = $this->client->request(
            'GET',
            $this->routes->getOrderSearchByClientId($clientId),
            [
                'connect_timeout' => $this->connectTimeout,
                'headers' => $this->headers
            ], [
                'query' => [
                    'providerid' => $providerID,
                    'status' => $status
                ]
            ]
        )->getBody()->getContents();

        return (new OrdersMapping())->toObject($xml);
    }

    public function getBatchResults()
    {
        $xml = $this->client->request(
            'GET',
            $this->routes->getBatchResults(),
            [
                'connect_timeout' => $this->connectTimeout,
                'headers' => $this->headers
            ]
        )->getBody()->getContents();

        return (new BatchResultsMapper())->toObject($xml);
    }

    public function createOrderAsPartner(TotalLabResult $order)
    {
        $request = $this->client->request(
            'POST',
            $this->routes->createOrderAsPartner(),
            [
                'connect_timeout' => $this->connectTimeout,
                'headers' => $this->headers,
                'body' => (new OrderMapping())->toXml($order)
            ]
        );

        $xml = $request->getBody()->getContents();

        return (new OrderMapping())->toObject($xml);
    }

    public function createMultipleOrdersAsPartner(TotalLabResults $orders)
    {
        $request = $this->client->request(
            'POST',
            $this->routes->createOrdersAsPartner(),
            [
                'connect_timeout' => $this->connectTimeout,
                'headers' => $this->headers,
                'body' => (new MultipleOrdersMapping())->toXml($orders)
            ]
        );

        $xml = $request->getBody()->getContents();

        return (new MultipleOrdersMapping())->toObject($xml);
    }

}
