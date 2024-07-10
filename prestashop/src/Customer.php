<?php
namespace David\Prestashop;

# load libraries
use PrestaShopWebservice;
use PrestaShopWebserviceException;

class Customer{

    private const DEBUG = true;
    private const PS_SHOP_PATH =  'https://www.portvil-limpieza.com/';
    private const PS_WS_AUTH_KEY = '9nERRt916EI8EQz66Q5GfPa64doFiCCq';

    public function __construct()
    {
        // empty
    }

    public function list()
    {
        // Here we make the WebService Call
        try
        {
            $webService = new PrestaShopWebservice(self::PS_SHOP_PATH, self::PS_WS_AUTH_KEY, self::DEBUG);

            // Here we set the option array for the Webservice : we want customers resources
            $opt['resource'] = 'customers';

            // Call
            $xml = $webService->get($opt);

            // Here we get the elements from children of customers markup "customer"
            $resources = $xml->customers->children();
        }
        catch (PrestaShopWebserviceException $e)
        {
            // Here we are dealing with errors
            $trace = $e->getTrace();
            if ($trace[0]['args'][0] == 404) echo 'Bad ID';
            else if ($trace[0]['args'][0] == 401) echo 'Bad auth key';
            else echo 'Other error';
        }

    }

    public function create()
    {

    }
    public function update()
    {

    }

    public function delete()
    {
        
    }
    
}