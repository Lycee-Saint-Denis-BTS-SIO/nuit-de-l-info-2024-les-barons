<?php

include '/var/www/html/class/user.php';

$username = $_POST['username'];
$password =$_POST['password'];

$result = user::loginUser($username, $password);

if ($password === $result[0]['password']) {
    $_ENV['username'] = $username;
    $_ENV['idUser'] = $result[0]['idUser'];
    $_ENV['connected'] = true;
}

header('Content-Type: application/json');
echo json_encode($result);