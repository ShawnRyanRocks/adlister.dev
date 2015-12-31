<?php 

require_once '../bootstrap.php'; 

$show = ( Input::has('message') ) ? '' : 'hidden';


?>
<?php include '../views/partials/header.php'; ?>

<div class="row">

    <div class="hidden-xs col-sm-2  col-md-2 col-lg-2">
        <?php include '../views/partials/nearby.cities.php'; ?>
    </div>


    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-8">
    	 <div class="col-xs-12">
                <?php include '../views/partials/navbar.php'; ?>
            </div>

		<div class="col-md-4">
			<div class="row">
				<a href="index.php">Back</a>
			</div>
		</div>	

		<div class="col-md-8">
			<form method="POST" action="/auth.login.php">
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
			<div <?php echo $show;?> class="colorRed mediumText" > Invalid Log In </div>
					</div>
				<!-- </div> -->
		</div>
		 <div class="col-xs-12 col-sm-12 hidden-md hidden-lg">
                    <?php include '../views/partials/mobile.ads.php'; ?>
            </div>
   </div>

    <div class="hidden-xs hidden-sm col-md-2 col-lg-2">
        <?php include '../views/partials/desktop.ads.php'; ?>
    </div>

    
</div>

<?php include '../views/partials/footer.php'; ?>