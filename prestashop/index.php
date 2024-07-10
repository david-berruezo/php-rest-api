<?php

# autoload
include_once("vendor/autoload.php");

use David\Prestashop\Customer;

$customer = new Customer();
$customer->list();



