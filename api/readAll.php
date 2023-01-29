<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../class/users.php';
$database = new Database();
$db = $database->getConnection();
$users = new User($db);
$stmt = $users->getUsers();
$userCount = $stmt->rowCount();

if($userCount > 0){

    $userArr = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $e = array(
            "uid" => $uid,
            "username" => $username,
            "realname" => $realname,
            "token" => $token,
            "avatar" => $avatar
        );
        array_push($userArr, $e);
    }
    echo json_encode($userArr);
}
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}