<?php  ?>

<?php include '../views/partials/header.php'; ?>
<?php include '../views/partials/navbar.php'; ?>
       
<?php var_dump($_SESSION['LOGGED_IN']); ?>

<div class="row">

    
    <div class="hidden-xs col-sm-2  col-md-2 col-lg-2">
        <?php include '../views/partials/nearby.cities.php'; ?>
    </div>

    <div class="col-md-8">

        <div class="row">

            <div class="col-md-4">
                <div id="list_one"></div>
                <ul>
                    <li><a href='http://adlister.dev/ads.index.php'>Free</a></li>
                    <li><a href='http://adlister.dev/ads.index.php'>Motorcycles</a></li>
                    <li><a href='http://adlister.dev/ads.index.php'>Used Gum</a></li>
                    <li><a href='http://adlister.dev/ads.index.php'>Broken Phones</a></li>
                </ul>            
            </div>

            <div class="col-md-4">
                <div id="list_two"></div>
                 <ul>
                    <li><a href='http://adlister.dev/ads.index.php'>Toys</a></li>
                    <li><a href='http://adlister.dev/ads.index.php'>Cars</a></li>
                    <li><a href='http://adlister.dev/ads.index.php'>Electronics</a></li>
                    <li><a href='http://adlister.dev/ads.index.php'>Appliances</a></li>
                </ul>  
            </div>

            <div class="col-md-4">
                <div id="list_three"></div>
                 <ul>
                    <li><a href='http://adlister.dev/public/ads.index.php'>Free</a></li>
                    <li><a href='http://adlister.dev/public/ads.index.php'>Truck</a></li>
                    <li><a href='http://adlister.dev/public/ads.index.php'>Furniture</a></li>
                    <li><a href='http://adlister.dev/public/ads.index.php'>Miscellaneous</a></li>
                </ul>  
            </div>

        </div>

        
            <div class="col-xs-12 col-sm-12 hidden-md hidden-lg">
                    <?php include '../views/partials/mobile.ads.php'; ?>
            </div>
        

    </div>

    <div class="hidden-xs hidden-sm col-md-2 col-lg-2">
        <?php include '../views/partials/desktop.ads.php'; ?>
    </div>


</div>

<div>
<?php include '../views/partials/footer.php'; ?>
</div>