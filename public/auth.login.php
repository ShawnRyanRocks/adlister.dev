<?php include '../views/partials/header.php'; ?>

<body>
	<div class="col-md-4">
		<div class="row">
		<a href="index.php">Back</a>
		</div>
	</div>	
	<div class="col-md-8">
		<form method="POST">
			<!-- <div id="login"> -->
				<div class="row">
					<label for "email">Email</label>
				</div>
				<div class="row">
					<input type="text" id="email" name="email" placeholder="email address here">
				</div>
				<div class="row">
					<label>Password</label>
				</div>
				<div class="row">
					<input type="password" name="password" placeholder="password here">
				</div>
				<div class="row">
					<input type="submit" class="btn btn-default">
				</div>
			<!-- </div> -->
	</div>
	
	</body>

	<?php include '../views/partials/footer.php'; ?>
