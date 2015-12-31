<?php
require_once '../bootstrap.php';

$email = Input::getString('email');
$password = Input::getString('password');

if ( Auth::attempt($email,$password) )
{

	header('Location: /index.php');
	die();
} else {

	header('Location: /users.login.php?message=invalid_Login');
	die();
}


?>