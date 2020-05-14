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
        $route = '{{ROOT}}/vetsync/v1';

        return str_replace(
            '{{ROOT}}',
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
        $route = '{{ROOT}}/vetsync/v1/devices';

        return str_replace(
            '{{ROOT}}',
            $this->apiUrl,
            $route
        );
    }

    public function getDeviceById(string $deviceId): string
    {
        $route = '{{ROOT}}/vetsync/v1/devices/{{DEVICE_ID}}';

        return str_replace(
            [
                '{{ROOT}}',
                '{{DEVICE_ID}}'
            ], [
                $this->apiUrl,
                $deviceId
            ], $route
        );
    }

    public function getServices(): string
    {
        $route = '{{ROOT}}/vetsync/v1/services';

        return str_replace(
            '{{ROOT}}',
            $this->apiUrl,
            $route
        );
    }

    public function getServiceByCode(string $serviceCode): string
    {
        $route = '{{ROOT}}/vetsync/v1/services/{{SERVICE_CODE}}';

        return str_replace(
            [
                '{{ROOT}}',
                '{{SERVICE_CODE}}'
            ], [
                $this->apiUrl,
                $serviceCode
            ], $route
        );
    }

    public function getSpecies(): string
    {
        $route = '{{ROOT}}/vetsync/v1/species';

        return str_replace(
            '{{ROOT}}',
            $this->apiUrl,
            $route
        );
    }

    public function getGenders(): string
    {
        $route = '{{ROOT}}/vetsync/v1/genders';

        return str_replace(
            '{{ROOT}}',
            $this->apiUrl,
            $route
        );
    }

    public function getPendingOrders(): string
    {
        $route = '{{ROOT}}/vetsync/v1/orders';

        return str_replace(
            '{{ROOT}}',
            $this->apiUrl,
            $route
        );
    }

    public function getOrderStatusById(string $orderId): string
    {
        $route = '{{ROOT}}/vetsync/v1/orders/{{CLIENT_ORDER_ID}}/status';

        return str_replace(
            [
                '{{ROOT}}',
                '{{CLIENT_ORDER_ID}}'
            ], [
                $this->apiUrl,
                $orderId
            ], $route
        );
    }

    public function getOrderResultByPracticeRef(string $practiceRef): string
    {
        $route = '{{ROOT}}/vetsync/v1/orders/{{PRACTICE_REF}}/results';

        return str_replace(
            [
                '{{ROOT}}',
                '{{PRACTICE_REF}}'
            ], [
                $this->apiUrl,
                $practiceRef
            ], $route
        );
    }

    public function getSearchOrders(): string
    {
        $route = '{{ROOT}}/vetsync/v1/orders/search';

        return str_replace(
            '{{ROOT}}',
            $this->apiUrl,
            $route
        );
    }

    public function getBatchResults(): string
    {
        $route = '{{ROOT}}/vetsync/v1/orders/batch/results';

        return str_replace(
            '{{ROOT}}',
            $this->apiUrl,
            $route
        );
    }

    public function getCreateOrderWithDelay(): string
    {
        $route = '{{ROOT}}/vetsync/v1/orders';

        return str_replace(
            '{{ROOT}}',
            $this->apiUrl,
            $route
        );
    }

    public function getCreateOrderInstantly(): string
    {
        $route = '{{ROOT}}/vetsync/v1/orders';

        return str_replace(
            '{{ROOT}}',
            $this->apiUrl,
            $route
        );
    }

    public function getAcknowledgeOrder(string $practiceRef): string
    {
        $route  = '{{ROOT}}/vetsync/v1/orders/{{PRACTICE_REF}}/acknowledged/COMPLETED';

        return str_replace(
            [
                '{{ROOT}}',
                '{{PRACTICE_REF}}'
            ], [
                $this->apiUrl,
                $practiceRef
            ], $route
        );
    }

    public function getAcknowledgeBatchResults(): string
    {
        $route  = '{{ROOT}}/vetsync/v1/orders/batch/acknowledged';

        return str_replace(
            [
                '{{ROOT}}',
            ], [
                $this->apiUrl
            ], $route
        );
    }

    public function getCancelOrder(string $practiceRef): string
    {
        $route = '{{ROOT}}/vetsync/v1/orders/{{PRACTICE_REF}}';

        return str_replace(
            [
                '{{ROOT}}',
                '{{PRACTICE_REF}}'
            ], [
                $this->apiUrl,
                $practiceRef
            ], $route
        );
    }

    public function getCancelOrderByTestCode(string $practiceRef, string $testCode): string
    {
        $route = '{{ROOT}}/vetsync/v1/orders/{{PRACTICE_REF}}/:{{TEST_CODE}}';

        return str_replace(
            [
                '{{ROOT}}',
                '{{PRACTICE_REF}}',
                '{{TEST_CODE}}'
            ], [
                $this->apiUrl,
                $practiceRef,
                $testCode
            ], $route
        );
    }

    public function getReassignTestToDifferentDevice(
        string $practiceRef,
        string $testCode,
        string $newDeviceId,
        string $oldDeviceId
    ): string
    {
        $route = '{{ROOT}}/vetsync/v1/orders/{{PRACTICE_REF}}/:{{TEST_CODE}}/:{{NEW_DEVICE_ID}}/:{{OLD_DEVICE_ID}}';

        return str_replace(
            [
                '{{ROOT}}',
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
