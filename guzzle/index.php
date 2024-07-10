<?php
declare(strict_types=1);

# autoload and libraries
require 'vendor/autoload.php';

# libraries
use Pruebas\Guzzle\Api;
use Pruebas\Guzzle\PrestaShop;


# api
$api = new Api();
// $api->buldUrl();
$api->setReturnData("object");
$api->callApi();
$response = $api->getData();
p_($response);


# prestashop api
$prestashop = new \Pruebas\Guzzle\PrestaShop();
$prestashop->setReturnData("object");
$prestashop->callApi();
$response = $prestashop->getData();
p_($response);