<?php

require_once 'vendor/autoload.php';

use \VetScan\Config;
use \VetScan\Vetxmlapi;
use \VetScan\Routes;
use \VetScan\Errors\OderAlreadyInSystemError;

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

$api = new Vetxmlapi(new Routes(new Config([
    'apiUrl' => 'https://vetscan-fuse-proxy.azurewebsites.net',

    'partnerId' => 'your partner id',
    'partnerPassword' => 'your partner password',

    'clientId' => 'your client id',
    'clientPassword' => 'your client password'
])));

//$order = new \VetScan\Models\Order();
//
//try {
//    $orderResult = $api->createOrderInstantly($order);
//    pre('result', $orderResult);
//} catch (OderAlreadyInSystemError $err) {
//    pre('order already exists: ' . $err->getMessage());
//} catch (\Exception $err) {
//    pre('total error: ' . $err->getMessage());
//}


//$device = $api->getDeviceById('0000V99312'); // dont use this
//pre($device);

//$devices = $api->getDevices(); // dont use this
//pre($devices);

//$service = $api->getServiceByCode('Fib');
//pre($service);


//$species = $api->getSpecies();
//pre($species);

//$genders = $api->getGenders();
//pre($genders);
