<?php

session_start();

require_once '../models/User.php';
require_once '../utils/Auth.php';

$email = Input::getString('email');
$password = Input::getString('password');

Auth::attempt($email,$password);

var_dump($_SESSION['LOGGED_IN']);
var_dump($_SESSION['LOGGED_IN_USER']->username);

header('Location: /index.php');

?>