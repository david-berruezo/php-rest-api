<?php
// conexion
$url = "http://www.portvil.com/interface/xml.php";

// credenciales y envío de endpoint
$credenciales = array(
    "us" => "davidberruezo@davidberruezo.com",
    "agencyId" => "206",
    "pw" => "ZGI=",
    "request" => "IrqVillaList"
);

// conectamos por post envio de formulario
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FAILONERROR,1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);
curl_setopt($ch, CURLOPT_POSTFIELDS, $credenciales);
$sXML = curl_exec($ch);
curl_close($ch);

// recuperamos el resultado formato xml
$xml = simplexml_load_string($sXML);
if (isset($xml)){
    foreach ($xml->Villas->Villa as $item) {
        $atributos = $item->attributes();
        $id = (int)$atributos[0];
        $nombre = (string)$atributos[1];
        $enable = (string)$atributos[2];
        print_r($item);
        echo "<br>";
    }// end foreach
}