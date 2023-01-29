<?php
require_once "../vendor/autoload.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = $_POST;
$serverClient = new GetStream\StreamChat\Client("amd8myw2784v", "cfn8d4u53mmyrx4jcda5zeuk9un39rvvg4p9mpy9febqu3rjqkwstqdazb6s8vtj");
try {
    $token = $serverClient->createToken($data['username']);
    $streamUser = [
        'id' => $data['username'],
        'role' => 'user',
        'name' => $data['username'],
        'photo'=> $data['photoUrl']
    ];

    $serverClient->upsertUser($streamUser);

    echo $token;
} catch (Exception $e) {
    echo $e;
}