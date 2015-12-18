<?php include_once '../bootstrap.php'; ?>




<?php 
	Auth::logout();

	header('location:index.php');
	die();

?>
