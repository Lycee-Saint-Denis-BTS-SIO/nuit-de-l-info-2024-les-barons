<?php

include_once '/home/lanathomiedeposeidon/www/V6/class/quiz.php';
include '/home/lanathomiedeposeidon/www/V6/class/user.php';

$username = $_POST['username'];
$point = $_POST['point'];

$idUser = user::getId($username);

$result = quiz::addPoint($idUser, $point);