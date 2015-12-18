<?php
require_once '../bootstrap.php';

$email = Input::getString('email');
$password = Input::getString('password');

Auth::attempt($email,$password);

header('Location: /index.php');

?>