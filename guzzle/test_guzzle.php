<?php
declare(strict_types=1);

# autoload and libraries
require 'vendor/autoload.php';
include_once("funciones.php");

use Pruebas\Guzzle\Api;

$api = new Api();
//$api->buldUrl();
$api->setReturnData("object");
$api->callApi();
$response = $api->getData();
p_($response);


