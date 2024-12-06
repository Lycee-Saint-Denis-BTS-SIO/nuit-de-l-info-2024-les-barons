<?php

include '/home/lanathomiedeposeidon/www/V6/class/user.php';

//$data = json_decode(file_get_contents('php://input'), true);
echo print_r($_POST);
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$testUsername = user::getUser($username);
if ($testUsername){
    echo json_encode(["username"=>true,]);
    return;
}

$result = user::insertUser($username, $email, $password);

header('Content-Type: application/json');
echo json_encode(["password"=>false,]);