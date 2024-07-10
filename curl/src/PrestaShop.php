<?php
declare(strict_types=1);

namespace Pruebas\Curl;

class PrestaShop
{
    # url
    private string $urlOld = "http://9nERRt916EI8EQz66Q5GfPa64doFiCCq:@portvil-limpieza.com/api/customers/";
    private string $url = "https://www.portvil-limpieza.com/api/customers/";

    private $headerOld = array(
        "X-RapidAPI-Host: api-nba-v1.p.rapidapi.com",
        "X-RapidAPI-Key: 7f15954abbmshcf577ef10330cc7p1a75bfjsn0c08350aedbc"
    );

    private $header = array();

    private array $params = array();

    private $data;

    private string $returnData = "object";

    /**
     * @param string $url
     * @param array $header
     * Método constructor que le pasamos el header y la url de cada API
     */
    public function __construct(string $url , array $params , array $header)
    {
        $this->params = $params;
        $this->url = $url;
        $this->header = $header;
    }


    /**
     * @return void
     * construimos la url
     */
    public function buildUrl(array $params = null)
    {
        if ($params){
            $this->params = $params;
        }
        $this->url = $this->url . '?' . http_build_query($this->getParams());
    }



    /**
     * @return bool|string
     * Llamamos a la API
     */
    public function callApi()
    {
        # llamamos API
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        //curl_setopt($ch, CURLOPT_ENCODING,"");
        //curl_setopt($ch, CURLOPT_MAXREDIRS,10);
        //curl_setopt($ch, CURLOPT_TIMEOUT,30);
        //curl_setopt($ch, CURLOPT_HTTP_VERSION,"CURL_HTTP_VERSION_1_1");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"GET");
        //curl_setopt($ch, CURLOPT_HTTPHEADER,$this->header);

        # curl --trace-ascii err.txt -X POST -H "Content-type:text/xml" --data-urlencode @cnew.xml "http://JXDLSL4MTV0GLFFNIMC4H35L4DV93IYP:@192.168.1.3/prestashop/api/customers/"

        # obtenemos resultados
        $response = curl_exec($ch);
        //$response = simplexml_load_string($response);
        //p_($response);
        $err = curl_error($ch);

        # cerramos conexion
        curl_close($ch);

        // lanzamos error
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            if ($this->returnData == "object"){
                $this->data = json_decode($response);
            }else if ($this->returnData == "array"){
                $this->data = json_decode($response,1);
            }else if ($this->returnData == "xml"){
                $this->data = simplexml_load_string($response);
            }
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
     * @return array
     */
    public function getHeader(): array
    {
        return $this->header;
    }

    /**
     * @param array $header
     */
    public function setHeader(array $header): void
    {
        $this->header = $header;
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