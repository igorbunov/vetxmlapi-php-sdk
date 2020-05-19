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
