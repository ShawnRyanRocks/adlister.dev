<?php
include_once '../bootstrap.php';

$email = Input::getString('email');
$password = Input::getString('password');

Auth::attempt($email,$password);

var_dump($_SESSION['LOGGED_IN']);
var_dump($_SESSION['LOGGED_IN_USER']);



header('Location: /index.php');

?>