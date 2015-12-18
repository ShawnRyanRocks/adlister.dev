<?php include_once '../bootstrap.php'; ?>

<?php include '../views/partials/header.php'; ?>

<div class="row">
<?php include_once '../views/partials/navbar.php'; ?>
<?php bootstrap.php ?>
<?php 
	header('location:index.php');
session_destroy();

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