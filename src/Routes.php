<?php

namespace VetScan;

class Routes
{
    private $config;
    private $apiUrl;

    public function __construct(IConfig $config)
    {
        $this->config = $config;
        $this->apiUrl = $this->config->get('apiUrl');
    }

    public function getAllRoutes(): string
    {
        $route = '{{HOST}}/vetsync/v1';

        return str_replace(
            '{{HOST}}',
            $this->apiUrl,
            $route
        );
    }

    public function authRoute(): string
    {
        $credentials = base64_encode(
            $this->config->get("partnerId") .
            ':' .
            $this->config->get("partnerPassword")
        );

        return 'Basic ' . $credentials;
    }

    public function getDevices(): string
    {
        $route = '{{HOST}}/vetsync/v1/devices';

        return str_replace(
            '{{HOST}}',
            $this->apiUrl,
            $route
        );
    }

    public function getDeviceById(string $deviceId): string
    {
        $route = '{{HOST}}/vetsync/v1/devices/{{DEVICE_ID}}';

        return str_replace(
            [
                '{{HOST}}',
                '{{DEVICE_ID}}'
            ], [
                $this->apiUrl,
                $deviceId
            ], $route
        );
    }

    public function getServices(): string
    {
        $route = '{{HOST}}/vetsync/v1/services';

        return str_replace(
            '{{HOST}}',
            $this->apiUrl,
            $route
        );
    }

    public function getServiceByCode(string $serviceCode): string
    {
        $route = '{{HOST}}/vetsync/v1/services/{{SERVICE_CODE}}';

        return str_replace(
            [
                '{{HOST}}',
                '{{SERVICE_CODE}}'
            ], [
                $this->apiUrl,
                $serviceCode
            ], $route
        );
    }

    public function getSpecies(): string
    {
        $route = '{{HOST}}/vetsync/v1/species';

        return str_replace(
            '{{HOST}}',
            $this->apiUrl,
            $route
        );
    }

    public function getGenders(): string
    {
        $route = '{{HOST}}/vetsync/v1/genders';

        return str_replace(
            '{{HOST}}',
            $this->apiUrl,
            $route
        );
    }

    public function getClients(): string
    {
        $route = '{{HOST}}/vetsync/v1/clients';

        return str_replace(
            '{{HOST}}',
            $this->apiUrl,
            $route
        );
    }

    public function getLabApiLinks(): string
    {
        $route = '{{HOST}}/vetsync/v1';

        return str_replace(
            '{{HOST}}',
            $this->apiUrl,
            $route
        );
    }

    public function getPendingOrders(): string
    {
        $route = '{{HOST}}/vetsync/v1/orders';

        return str_replace(
            '{{HOST}}',
            $this->apiUrl,
            $route
        );
    }

    public function getOrderStatusById(string $orderId): string
    {
        $route = '{{HOST}}/vetsync/v1/orders/{{CLIENT_ORDER_ID}}/status';

        return str_replace(
            [
                '{{HOST}}',
                '{{CLIENT_ORDER_ID}}'
            ], [
                $this->apiUrl,
                $orderId
            ], $route
        );
    }

    public function getOrderResultByPracticeRef(string $practiceRef): string
    {
        $route = '{{HOST}}/vetsync/v1/orders/{{PRACTICE_REF}}/results';

        return str_replace(
            [
                '{{HOST}}',
                '{{PRACTICE_REF}}'
            ], [
                $this->apiUrl,
                $practiceRef
            ], $route
        );
    }

    public function getSearchOrders(): string
    {
        $route = '{{HOST}}/vetsync/v1/orders/search';

        return str_replace(
            '{{HOST}}',
            $this->apiUrl,
            $route
        );
    }

    public function getBatchResults(): string
    {
        $route = '{{HOST}}/vetsync/v1/orders/batch/results';

        return str_replace(
            '{{HOST}}',
            $this->apiUrl,
            $route
        );
    }

    public function getCreateOrderWithDelay(): string
    {
        $route = '{{HOST}}/vetsync/v1/orders';

        return str_replace(
            '{{HOST}}',
            $this->apiUrl,
            $route
        );
    }

    public function getCreateOrderInstantly(): string
    {
        $route = '{{HOST}}/vetsync/v1/orders';

        return str_replace(
            '{{HOST}}',
            $this->apiUrl,
            $route
        );
    }

    public function getAcknowledgeOrder(string $practiceRef): string
    {
        $route  = '{{HOST}}/vetsync/v1/orders/{{PRACTICE_REF}}/acknowledged/COMPLETED';

        return str_replace(
            [
                '{{HOST}}',
                '{{PRACTICE_REF}}'
            ], [
                $this->apiUrl,
                $practiceRef
            ], $route
        );
    }

    public function getAcknowledgeBatchResults(): string
    {
        $route  = '{{HOST}}/vetsync/v1/orders/batch/acknowledged';

        return str_replace(
            [
                '{{HOST}}',
            ], [
                $this->apiUrl
            ], $route
        );
    }

    public function getCancelOrder(string $practiceRef): string
    {
        $route = '{{HOST}}/vetsync/v1/orders/{{PRACTICE_REF}}';

        return str_replace(
            [
                '{{HOST}}',
                '{{PRACTICE_REF}}'
            ], [
                $this->apiUrl,
                $practiceRef
            ], $route
        );
    }

    public function getCancelOrderByTestCode(string $practiceRef, string $testCode): string
    {
        $route = '{{HOST}}/vetsync/v1/orders/{{PRACTICE_REF}}/:{{TEST_CODE}}';

        return str_replace(
            [
                '{{HOST}}',
                '{{PRACTICE_REF}}',
                '{{TEST_CODE}}'
            ], [
                $this->apiUrl,
                $practiceRef,
                $testCode
            ], $route
        );
    }

    public function getSettings(): string
    {
        $route = '{{HOST}}/vetsync/v1/settings';

        return str_replace(
            '{{HOST}}',
            $this->apiUrl,
            $route
        );
    }

    public function getReassignTestToDifferentDevice(
        string $practiceRef,
        string $testCode,
        string $newDeviceId,
        string $oldDeviceId
    ): string
    {
        $route = '{{HOST}}/vetsync/v1/orders/{{PRACTICE_REF}}/:{{TEST_CODE}}/:{{NEW_DEVICE_ID}}/:{{OLD_DEVICE_ID}}';

        return str_replace(
            [
                '{{HOST}}',
                '{{PRACTICE_REF}}',
                '{{TEST_CODE}}',
                '{{NEW_DEVICE_ID}}',
                '{{OLD_DEVICE_ID}}'
            ], [
                $this->apiUrl,
                $practiceRef,
                $testCode,
                $newDeviceId,
                $oldDeviceId
            ], $route
        );
    }
}
