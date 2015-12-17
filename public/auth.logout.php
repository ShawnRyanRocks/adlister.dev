<?php include '../views/partials/header.php'; ?>

<div class="row">
<?php require_once '../views/partials/navbar.php'; ?>
<?php 
session_destroy();
// if(!isset($_SESSION["LOGGED_IN"]))
	// {
	// 	header('location:index.php'); 
	// }
?>
</div>

<body>

	<div class="row">
		<h3>You are logged out.</h3>
	</div>
	
	<div class="row">
			<a href="index.php">Back</a>
	</div>
</div>

	

	</body>

	<?php include '../views/partials/footer.php'; ?>