<?php
declare(strict_types=1);

namespace Pruebas\Guzzle;

use GuzzleHttp\Client;

class PrestaShop
{
    # url
    private $url = "https://www.portvil-limpieza.com/api/";

    # params
    private $api_key = "9nERRt916EI8EQz66Q5GfPa64doFiCCq";

    private $params = array();

    private $data;

    private string $returnData = "object";

    public function __construct()
    {
        // empty
        echo "Construimos clase";
    }

    /**
     * @return void
     * construimos la url
     */
    public function buldUrl()
    {
        $this->params = array(
            "ws_key" => $this->getApiKey(),
        );

        $this->url = $this->url . '?' . http_build_query($this->getParams());
    }


    /**
     * @return bool|string
     * Llamamos a la API
     */
    public function callApi()
    {

        # inciamos guzzle
        $client = new Client();

        # obtenemos respuesta
        $response = $client->request('GET', $this->getUrl(), [
            'query' => [
                "ws_key" => $this->getApiKey()
            ]
        ]);

        # obtenemos body y contenido
        $body = $response->getBody();
        $contents = $response->getBody()->getContents();
        print_r($contents);

        if ($this->returnData == "object"){
            $this->data = json_decode($contents);
        }else if ($this->returnData == "array"){
            $this->data = json_decode($contents,1);
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