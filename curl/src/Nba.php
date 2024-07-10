<?php
declare(strict_types=1);

namespace Pruebas\Curl;

use Pruebas\Curl\RapidApi;


class Nba extends RapidApi
{
    public function __construct(string $url , array $header)
    {
        parent::__construct($url , $header);
    }

}

# parametros
$url = "https://api-nba-v1.p.rapidapi.com/seasons";

$header = array(
    "X-RapidAPI-Host: api-nba-v1.p.rapidapi.com",
    "X-RapidAPI-Key: 7f15954abbmshcf577ef10330cc7p1a75bfjsn0c08350aedbc"
);

# llamamos a la api
$nba = new Nba($url , $header);
$response = $nba->callApi();
p_($response);