<?php
include_once("./vendor/autoload.php");

# include library
use Pruebas\Curl\PrestaShop;

# prestashop test

# parameters
# ?ws_key=9nERRt916EI8EQz66Q5GfPa64doFiCCq
$url = "https://www.portvil-limpieza.com/api/customers/";
$params = array();
$header = array();
$prestashop = new PrestaShop($url,$params,$header);
$prestashop->setReturnData("xml");
$prestashop->buildUrl();
$prestashop->callApi();
$resource = $prestashop->getData();

# output resource
p_($resource);