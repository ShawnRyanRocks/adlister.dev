
<?php include '../views/partials/header.php'; ?>

<?php include '../views/partials/navbar.php'; ?>

<?php 
require '../bootstrap.php';

$user = User::findByUsername(Input::get('email'));

if(!isset($_SESSION['LOGGED_IN_USER'])){

    header("Location: users.login.php");
    die();
}

?>


<div class="row">

    <div class="hidden-xs col-sm-2  col-md-2 col-lg-3">
        <?php include '../views/partials/nearby.cities.php'; ?>
    </div>

    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">

        <div class="main_body">

            <div class="row">

                <div class="col-xs-16 col-sm-5">
                    <div class="col-lg-12">
                        <h3><?=$_SESSION['LOGGED_IN_USER']->username;?>'s Profile</h3>
                        
                    </div>
                    <div class="col-lg-12">
                        <img src="#">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6">
                    <div class="col-lg-12">
                        <ul style="list-style-type:none">
                            <li><h5>Age : <?=$_SESSION['LOGGED_IN_USER']->age;?></h5></li>
                            <li><h5>Zipcode : <?=$_SESSION['LOGGED_IN_USER']->zip;?></h5></li>
                            <li><h5>Phone : <?=$_SESSION['LOGGED_IN_USER']->phone;?></h5></li>
                            <li><h5>E-Mail : <?=$_SESSION['LOGGED_IN_USER']->email;?></h5></li>
                            <li><h5>Contact by Phone : <?=$_SESSION['LOGGED_IN_USER']->calL_poster;?></h5></li>
                            <li><h5>Contact by Email : <?=$_SESSION['LOGGED_IN_USER']->email_poster;?></h5></li>
                            <li><h5>Contact by Text : <?=$_SESSION['LOGGED_IN_USER']->text_poster;?></h5></li>
                        </ul>
                    </div>
                </div>

            </div>






        </div>


    </div>

    <div class="hidden-xs hidden-sm col-md-2 col-lg-3">
        <?php include '../views/partials/desktop.ads.php'; ?>
    </div>
</div>

<?php include '../views/partials/footer.php'; ?>