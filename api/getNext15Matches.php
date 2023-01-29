<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://v3.football.api-sports.io/fixtures?league=288&next=10',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'x-rapidapi-key: d8cac0d8ef7ce89208bf4cd11bad5701',
        'x-rapidapi-host: v3.football.api-sports.io'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
$fp = fopen('next15.json', 'w');
fwrite($fp, $response);
fclose($fp);
echo $response;