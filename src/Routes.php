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

    public function getSettings(): string
    {
        $route = '{{HOST}}/vetsync/v1/settings';

        return str_replace(
            '{{HOST}}',
            $this->apiUrl,
            $route
        );
    }

    public function getOrderSearch(): string
    {
        $route = '{{HOST}}/vetsync/v1/orders/search';

        return str_replace(
            '{{HOST}}',
            $this->apiUrl,
            $route
        );
    }

    public function getOrderByPractiseRef(string $practiceRef): string
    {
        $route = '{{HOST}}/vetsync/v1/orders/{{id}}/status';

        return str_replace(
            [
                '{{HOST}}',
                '{{id}}',
            ], [
                $this->apiUrl,
                $practiceRef
            ], $route
        );
    }

    public function getOrderResultByPractiseRef(string $practiceRef): string
    {
        $route = '{{HOST}}/vetsync/v1/orders/{{id}}/results';

        return str_replace(
            [
                '{{HOST}}',
                '{{id}}',
            ], [
                $this->apiUrl,
                $practiceRef
            ], $route
        );
    }

    public function getOrderSearchByClientId(string $clientId): string
    {
        $route = '{{HOST}}/vetsync/v1/orders/search?clientId={{clientId}}';

        return str_replace(
            [
                '{{HOST}}',
                '{{clientId}}',
            ], [
                $this->apiUrl,
                $clientId
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

    public function createOrderAsPartner()
    {
        $route = '{{HOST}}/vetsync/v1/orders';

        return str_replace(['{{HOST}}'], [$this->apiUrl], $route);
    }

    public function createOrdersAsPartner()
    {
        $route = '{{HOST}}/vetsync/v1/orders';

        return str_replace(['{{HOST}}'], [$this->apiUrl], $route);
    }

    public function searchByClientOrderId(string $clientOrderId)
    {
        $route = '{{HOST}}/vetsync/v1/orders/:id/status';

        return str_replace([
            '{{HOST}}',
            ':id'
        ], [
            $this->apiUrl,
            $clientOrderId
        ], $route);
    }

    public function getSearchBy(array $filter)
    {
        $route = '{{HOST}}/vetsync/v1/orders/search';

        $result = str_replace(['{{HOST}}'], [$this->apiUrl], $route);

        $filterResult = array();

        foreach ($filter as $key => $value) {
            if (!empty($key) and !empty($value)) {
                $filterResult[] = "$key=$value";
            }
        }

        if (count($filterResult) > 0) {
            $result .= "?" . implode('&', $filterResult);
        }

        return $result;
    }

    public function getAcknowledgeOrderStatus(string $practiceRef, string $status)
    {
        $route = '{{HOST}}/vetsync/v1/orders/:id/acknowledged/:status';

        return str_replace([
            '{{HOST}}',
            ':id',
            ':status'
        ], [
            $this->apiUrl,
            $practiceRef,
            $status
        ], $route);
    }

    public function getOrderResults(string $practiceRef)
    {
        $route = '{{HOST}}/vetsync/v1/orders/:id/results';

        return str_replace([
            '{{HOST}}',
            ':id'
        ], [
            $this->apiUrl,
            $practiceRef
        ], $route);
    }

    public function getOrderResultsFile(string $practiceRef)
    {
        $route = '{{HOST}}/vetsync/v1/orders/:id/results/file';

        return str_replace([
            '{{HOST}}',
            ':id'
        ], [
            $this->apiUrl,
            $practiceRef
        ], $route);
    }

    public function getCancelOrderById(string $practiceRef)
    {
        $route = '{{HOST}}/vetsync/v1/orders/:id';

        return str_replace([
            '{{HOST}}',
            ':id'
        ], [
            $this->apiUrl,
            $practiceRef
        ], $route);
    }
}
