<?php
include_once ('../inc/headers.php');

$serverClient = new GetStream\StreamChat\Client("amd8myw2784v", "cfn8d4u53mmyrx4jcda5zeuk9un39rvvg4p9mpy9febqu3rjqkwstqdazb6s8vtj");

$username = $_GET['username'];
$fullNames = $_GET['fullNames'];
$imageUrl = $_GET['imageUrl'];

try {
    $token = $serverClient->createToken($username);

    $streamUser = [
        'id' => $username,
        'role' => 'user',
        'fullName' => $fullNames,
        'photo'=> $imageUrl,
    ];

    $createdUser =  $serverClient->upsertUser($streamUser);

    echo json_encode($token);

} catch (Exception $e) {
    echo json_encode($e);
}