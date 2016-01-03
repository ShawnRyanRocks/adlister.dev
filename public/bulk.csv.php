<?php 
require_once '../bootstrap.php';
if (!Auth::check()) 
{
	header("Location: /users.login.php?from=bulk.csv.php");
	die();
}

include '../views/partials/header.php'; 

?>

<div class="row">

    <div class="hidden-xs col-sm-2  col-md-2 col-lg-2">
        <?php include '../views/partials/nearby.cities.php'; ?>
    </div>


    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-8">

        <div class="row">
            <?php include '../views/partials/navbar.php'; ?>
        </div>
            
        <h2><?=$_SESSION['LOGGED_IN_USER']->username;?></h2>
        <p>
        	File Should be in the format : <br>
        	title:"??????",category:"????",........
        </p>

        <form action="/bulk.csv.auth.php" method="POST" id="csv_upload_form" enctype="multipart/form-data">
        	<input type="file" name="csvFile" id="csvFile">
        	<button class="btn btn-primary"> Submit file</button>
        </form>


    	







    </div>

    <div class="hidden-xs hidden-sm col-md-2 col-lg-2">
        <?php include '../views/partials/desktop.ads.php'; ?>
    </div>
</div>

<?php include '../views/partials/footer.php'; ?>