<?php
# calidades
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://portal.apinmo.com/api/v1/enums/?calidades');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt( $curl, CURLOPT_HTTPHEADER, array(
    'Content-Type:application/json',
    'Token:0196F6C4F97DF3F48D570C23E46501AE'
));

$result = curl_exec($curl);