<?php include '../views/partials/header.php'; ?>

<div class="row">

    <div class="hidden-xs col-sm-2  col-md-2 col-lg-2">
        <?php include '../views/partials/nearby.cities.php'; ?>
    </div>


    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-8">

    	<div class="row">

			<div class="col-lg-12">
			    <?php require_once '../views/partials/navbar.php'; ?>
			</div>


			<div class="col-lg-12">

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
									
								</div>
							</div>
							<div class="form-inline">
					      		<div class="form-group">
									<label for "Username">Username</label>
									<input type="text" id="username" name="username" placeholder="username">
								</div>
							</div>
							<div class="form-inline">
					      		<div class="form-group">		
									<label for "email">Age</label>
									<input type="text" id="age" name="age" placeholder="age">
									<input type="submit" class="btn btn-default">
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>











    	</div>
    </div>

    <div class="hidden-xs hidden-sm col-md-2 col-lg-2">
        <?php include '../views/partials/desktop.ads.php'; ?>
    </div>

</div>

<?php include '../views/partials/footer.php'; ?>
