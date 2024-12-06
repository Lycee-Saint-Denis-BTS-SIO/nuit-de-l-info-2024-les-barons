<?php

include_once '/var/www/html/class/quiz.php';
include '/var/www/html/class/user.php';

$username = $_POST['username'];
$point = $_POST['point'];

$idUser = user::getId($username);

$result = quiz::addPoint($idUser, $point);