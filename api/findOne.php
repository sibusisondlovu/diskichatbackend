<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../class/users.php';

$username = $_GET['username'];
$database = new Database();
$db = $database->getConnection();
$users = new User($db);
$stmt = $users->checkUsername($username);
$userCount = $stmt->rowCount();

if($userCount == 1){
    echo "Username already exists.";
} else{
    echo "Username available.";
}