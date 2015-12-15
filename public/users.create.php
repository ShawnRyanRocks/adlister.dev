<?php include '../views/partials/header.php'; ?>
<div class="row">
    <?php require_once '../views/partials/navbar.php'; ?>
</div>

<body>

	<div class="row">
		<h3>Create New User</h3>
	</div>
	
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="row">
			<a href="index.php">Back</a>
	</div>
</div>

	
<div id= 'users_create'>
	<div class="row">
	    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-inline">
	      		<div class="form-group">
			
				<form method="POST">
					
					<label for "email">Email</label>
					<input type="text" id="email" name="email" placeholder="email address here">

					<input type="text" id="email" name="email" placeholder="email address again">
				</div>
			</div>
			<div class="form-inline">
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" placeholder="password here">
					<input type="password" name="password" placeholder="password here">

					<input type="submit" class="btn btn-default">
				</div>
			</div>
		</div>
	</div>
</div>
	</body>

	<?php include '../views/partials/footer.php'; ?>