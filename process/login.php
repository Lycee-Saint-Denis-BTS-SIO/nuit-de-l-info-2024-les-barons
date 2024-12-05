<?php

include '/var/www/html/class/user.php';

$username = $_POST['username'];
$password =$_POST['password'];

$result = user::loginUser($username, $password);

header('Content-Type: application/json');
echo json_encode($result);