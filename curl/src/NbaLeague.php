<?php
declare(strict_types=1);

namespace Pruebas\Curl;

use Pruebas\Curl\RapidApi;

/**
 * Ejecutamos llamada API a Weather
 * https://api.openweathermap.org/data/3.0/onecall?lat={lat}&lon={lon}&exclude={part}&appid={API key}
 * 41.40346661410668, 2.148618010650037
 * https://api.openweathermap.org/data/2.5/weather?id=524901&appid=4a66eba9378df5360a70531b03a82947
 *
 */

class NbaLeague extends RapidAPi
{

    /**
     * @param string $url
     * @param array $params
     * @param array $headers
     * Enviamos los parametros de conexión
     */
    public function __construct(string $url , array $params , array $headers)
    {
        parent::__construct($url , $params , $headers);
    }

}

# parametros
$url = "http://api.sportradar.us/nbdl/trial/v8/en/league/2024/02/03/changes.xml";

$parametros = array(
    "api_key" => "nnngz3k537t5htswfqpz5qrc",
    //"language_code" => "en",
    //"year" => "2024",
    //"month" => "02",
    //"day" => "10"
);

$headers = array(
    "X-Originating-IP" => "79.153.40.28"
);

$nbaLeague = new NbaLeague($url , $parametros , $headers);
$nbaLeague->buildUrl();
$nbaLeague->setReturnData("xml");
$nbaLeague->callApi();
$url = $nbaLeague->getUrl();
$response_object = $nbaLeague->getData();
p_($response_object);
//echo $url . "<br>";


