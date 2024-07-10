<?php

// autenticación
$curl = curl_init('gruporolosa.com'); /** Ingresamos la url de la api o servicio a consumir */
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, true );
curl_setopt($curl, CURLOPT_POST, true);/** Autorizamos enviar datos*/
$name = 'user_name';/** Datos para  iniciar sesion  */
$pass = 'user_pass';
$my_user = array(
    "username"=> $name,
    "password"=> $pass
);
$payload = json_encode($my_user); /** convertimos los datos en el formato solicitado normalmente json*/
curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
curl_setopt($curl, CURLOPT_COOKIEJAR,  __DIR__.'/cookies.txt'); /** Archivo para guardar datos de sesion */
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
$result = curl_exec($curl);/** Ejecutamos petición*/
curl_close($curl);

// get
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL,  'gruporolosa.com'); /** Ingresamos la url de la api o servicio a consumir */
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); /**Permitimos recibir respuesta*/
curl_setopt($curl, CURLOPT_HTTPGET,true);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_POST, false);
curl_setopt( $curl, CURLOPT_COOKIEFILE, __DIR__.'/cookies.txt' ); /** Archivo donde guardamos datos de sesion */
$data = curl_exec($curl); /** Ejecutamos petición*/
curl_close($curl);

// post
$curl = curl_init('gruporolosa.com'); /** Ingresamos la url de la api o servicio a consumir */
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_POST, true);/** Autorizamos enviar datos*/
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type:application/json',
    'Authorization: Bearer '.$token));/** token recibido donde se verifica la correcta conexión*/
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode('hello') );/** Datos para enviar*/
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_COOKIEFILE, __DIR__.'/cookies.txt' ); /** Archivo donde guardamos datos de sesion */
$result = curl_exec($curl); /** Ejecutamos petición*/
curl_close($curl);

