<?php
declare(strict_types=1);

namespace Pruebas\Curl;

/**
 * Ejecutamos llamada API a Weather
 * https://api.openweathermap.org/data/3.0/onecall?lat={lat}&lon={lon}&exclude={part}&appid={API key}
 * 41.40346661410668, 2.148618010650037
 * https://api.openweathermap.org/data/2.5/weather?id=524901&appid=4a66eba9378df5360a70531b03a82947
 *
 */

class OpenWeatherMap
{
    # url
    private string $url = "https://api.openweathermap.org/data/2.5/weather";

    # params
    private string $id = "524901";
    private string $api_key = "4a66eba9378df5360a70531b03a82947";

    private string $lat = "41.40346661410668";
    private string $lon = "2.148618010650037";
    
    private array $params = array();

    private $data;

    private string $returnData = "object";

    public function __construct()
    {
        // empty
    }



    /**
     * @return void
     * construimos la url
     */
    public function buldUrl()
    {
        $this->params = array(
            "id"    => $this->getId(),
            "appid" => $this->getApiKey(),
            "lat"   => $this->getLat(),
            "lon"   => $this->getLon(),
        );

        $this->url = $this->url . '?' . http_build_query($this->getParams());
    }


    /**
     * @return bool|string
     * Llamamos a la API
     */
    public function callApi()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,  $this->getUrl());
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPGET,true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt( $curl, CURLOPT_COOKIEFILE, __DIR__.'/cookies.txt' );

        $data = curl_exec($curl);

        if ($this->returnData == "object"){
            $this->data = json_decode($data);
        }else if ($this->returnData == "array"){
            $this->data = json_decode($data,1);
        }

    }


    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->api_key;
    }

    /**
     * @param string $api_key
     */
    public function setApiKey(string $api_key): void
    {
        $this->api_key = $api_key;
    }

    /**
     * @return string
     */
    public function getLat(): string
    {
        return $this->lat;
    }

    /**
     * @param string $lat
     */
    public function setLat(string $lat): void
    {
        $this->lat = $lat;
    }

    /**
     * @return string
     */
    public function getLon(): string
    {
        return $this->lon;
    }

    /**
     * @param string $lon
     */
    public function setLon(string $lon): void
    {
        $this->lon = $lon;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params): void
    {
        $this->params = $params;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getReturnData(): string
    {
        return $this->returnData;
    }

    /**
     * @param string $returnData
     */
    public function setReturnData(string $returnData): void
    {
        $this->returnData = $returnData;
    }

}

# instanciamos la API
$openWeatherMap = new OpenWeatherMap();
$openWeatherMap->buldUrl();
$url = $openWeatherMap->getUrl();
$openWeatherMap->setReturnData("object");
$openWeatherMap->callApi();
$response_object = $openWeatherMap->getData();
p_($response_object);

