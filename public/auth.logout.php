<?php include_once '../bootstrap.php'; ?>

Auth::logout();


<?php 
	Auth::logout();

	header('location:index.php');
	die();

?>
