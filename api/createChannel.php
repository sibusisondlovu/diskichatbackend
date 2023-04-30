<?php
require_once "../vendor/autoload.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$serverClient = new GetStream\StreamChat\Client("amd8myw2784v", "cfn8d4u53mmyrx4jcda5zeuk9un39rvvg4p9mpy9febqu3rjqkwstqdazb6s8vtj");
try {

    $channel = $serverClient->Channel("messaging",
        "930508",['name'=> 'Sundowns vs Sekhukhune']);
    $channel->create("jaspa");
    $channel->addMembers(['jaspa']);

} catch (Exception $e) {
    echo $e;
}