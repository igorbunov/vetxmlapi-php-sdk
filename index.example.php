<?php

require_once 'vendor/autoload.php';

use \VetScan\Config;
use \VetScan\VetXmlApi;
use \VetScan\Routes;
use \VetScan\Errors\OrderAlreadyInSystemError;

use \VetScan\Models\LabResults\TotalLabResult;
use \VetScan\Models\LabResults\Identification;
use \VetScan\Models\LabResults\AnimalDetail;
use \VetScan\Models\LabResults\LabResults;
use \VetScan\Models\LabResults\LabResult;
use \VetScan\Models\LabResults\LabResultHeader;
use \VetScan\Models\LabResults\LabResultItems;

if (!function_exists('pre')) {
    function pre(){
        $numargs = func_num_args();
        $arguments = func_get_args();

        echo '<pre>';
        for($i = 0; $i < $numargs; $i++){
            var_dump($arguments[$i]);
        }
        echo '</pre>';
    }
}

$clientId = 'your client id';

$api = new VetXmlApi(new Routes(new Config([
    'apiUrl' => 'https://vetscan-fuse-proxy.azurewebsites.net',

    'partnerId' => 'your partner id',
    'partnerPassword' => 'your partner password',

    'clientId' => $clientId,
    'clientPassword' => 'your client password'
])));



// POST REQUESTS //

/*
$order = new \VetScan\Models\BatchOrders(new \VetScan\Models\BatchOrder('vetmanager-analysis-111'));

try {
    $res = $api->acknowledgeBatchResults($order);
    pre($res);
} catch (\Exception $err) {
    pre('cathced err' , $err->getMessage());
}
*/

/*
// get order result
$results = $api->getOrderResults('rhapsody-13');
pre($results);
*/

//$result = $api->searchByClientOrderId('rhapsody-13');
//pre($result);

/*
// acknowledge order status
// NOT WORKING
try {
    $result = $api->acknowledgeOrderStatus('rhapsody-13', 'COMPLETED');
    pre($result);
} catch (OrderNotFoundError $err) {
    pre('ERROR', $err->getMessage());
} catch (OrderAlreadyInSystemError $err) {
    pre('ERROR', $err->getMessage());
} catch (\Exception $err) {
    pre('ERROR', $err->getMessage());
}
*/

/*
// search by filter
$result = $api->searchBy(array(
    'providerid' => '',
    'status' => '',
    'lastname' => '',
    'firstname' => '',
    'startdate' => '',
    'enddate' => '',
    'chartnumber' => '',
    'clientId' => $clientId
));

pre($result);
*/


/*
// search by client_order_id
$result = $api->searchByClientOrderId('rhapsody-13');
pre($result);
*/

/*
// add multiple analisys as partner

$practiceRef1 = 'rhapsody-14';
$practiceRef2 = 'rhapsody-15';

$order1 = new TotalLabResult(
    new Identification(
        'Request',
        'Practice1',
        $clientId,
        $practiceRef1,
        46,
        'FUSE, Ezyvet',
        4,
        'Corleone, Michael',
        'provider-1'
    ),
    new AnimalDetail(
        100004,
        '',
        'Rover',
        'Male',
        'DOG',
        'Labrador',
        '2013-08-03'
    ),
    new LabResults([
        new LabResult(
            new LabResultHeader('HEM')
        ),
        new LabResult(
            new LabResultHeader('T4')
        )
    ])
);

$order2 = new TotalLabResult(
    new Identification(
        'Request',
        'Practice1',
        $clientId,
        $practiceRef2,
        46,
        'FUSE, Ezyvet',
        4,
        'Corleone, Michael',
        'provider-1'
    ),
    new AnimalDetail(
        100004,
        '',
        'Rover',
        'Male',
        'DOG',
        'Labrador',
        '2013-08-03'
    ),
    new LabResults([
        new LabResult(
            new LabResultHeader('HEM')
        ),
        new LabResult(
            new LabResultHeader('T4')
        )
    ])
);

$orders = new TotalLabResults([
    $order1,
    $order2
]);

$result = $api->createMultipleOrdersAsPartner($orders);
pre('result', $result);
*/

/*
// create order as partner
$order = new TotalLabResult(
    new Identification(
        'Request',
        'Practice1',
        $clientId,
        'rhapsody-13',
        46,
        'FUSE, Ezyvet',
        4,
        'Corleone, Michael',
        'provider-1'
    ),
    new AnimalDetail(
        100004,
        '',
        'Rover',
        'Male',
        'DOG',
        'Labrador',
        '2013-08-03'
    ),
    new LabResults([
        new LabResult(
            new LabResultHeader('HEM')
        ),
        new LabResult(
            new LabResultHeader('T4')
        )
    ])
);

$result = $api->createOrderAsPartner($order);
pre($result);
*/

// GET REQUESTS //

/*
$batchResults = $api->getBatchResults();
pre($batchResults);
*/

/*
// get total order result by practise ref
$result = $api->getOrderResultByPractiseRef('rhapsody-1');
pre($result);
*/

/*
// get order by practise ref
$orders = $api->getOrderByPractiseRef('rhapsody-1');
pre($orders);
*/

/*
// get searched order by provider and status and clientId
$orders = $api->getOrdersByProviderClientStatus(
    'provider-2',
    'COMPLETED',
    $clientId
);
pre($orders);
*/

/*
// get searched order by provider and status
$orders = $api->getOrderSearch('provider-2', 'COMPLETED');
pre($orders);
*/

/*
// get orders status
$orders = $api->getPendingOrders();
pre($orders);
*/

/*
// get lab api links
$links = $api->getLabApiLinks();
pre($links);
*/

/*
// get device by id
$device = $api->getDeviceById('0000V99312'); // dont use this
pre($device);
*/

/*
// get service
$service = $api->getServiceByCode('AR'); // code from services
pre($service);
*/

/*
// get services
$services = $api->getServices();
pre($services);
*/

/*
// get devices (recomended not to use)
$devices = $api->getDevices();
pre($devices);
*/

/*
// get species
$species = $api->getSpecies();
pre($species);
*/

/*
// get genders
$genders = $api->getGenders();
pre($genders);
*/

/*
// get clients
$clients = $api->getClients();
pre('clients', $clients);
*/

/*
// set setting
$settingModel = new \VetScan\Models\Setting(true, 5);
pre($settingModel);

$setResult = $api->setSettings($settingModel);
pre('result after set', $setResult);

// get setting
$settings = $api->getSettings();
pre('get settings', $settings);
*/
