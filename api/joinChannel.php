<?php
require_once "../vendor/autoload.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$serverClient = new GetStream\StreamChat\Client("amd8myw2784v", "cfn8d4u53mmyrx4jcda5zeuk9un39rvvg4p9mpy9febqu3rjqkwstqdazb6s8vtj");
try {
    $channel = $serverClient->Channel('messaging', $_GET['channel']);
    $channel->addMembers([$_GET['user']]);

    echo 'success';
} catch (Exception $e) {
    echo $e;
}
