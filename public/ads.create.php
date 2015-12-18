<?php include_once '../bootstrap.php'; ?>
<?php echo ($_SESSION['LOGGED_IN_USER']->username); ?>
<?php include '../views/partials/header.php'; ?>

<div class="row">

    <div class="hidden-xs col-sm-2  col-md-2 col-lg-2">
        <?php include '../views/partials/nearby.cities.php'; ?>
    </div>


    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-8">

        <div class="main_body">
            <div class="col-lg-12">
                <!-- Top tow inline input options -->

                <div class="row" id="ads_create_type_category">

                    <div class="col-lg-12">
                        <?php include '../views/partials/navbar.php'; ?>
                    </div>
                    
                    <h2>Type of Ad</h2>

                </div>

                <form action="/ads.create.auth.php" method="POST">

                    <!-- Type and category selector -->

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <div class="col-lg-12">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label for="seller_type">Type</label>
                                        <select class="form-control" id="seller_type" name="seller_type">
                                            <option>For Sale by Owner</option>
                                            <option>For Sale by Dealer</option>
                                            <option>Buying</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select class="form-control" id="category" name="category">
                                            <option>Free</option>
                                            <option>Motorcycle</option>
                                            <option>Car</option>
                                            <option>Antiques</option>
                                            <option>Trucks</option>
                                            <option>House</option>
                                            <option>Bike</option>
                                            <option>Toys</option>
                                            <option>Ride Home</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!--  Personal information form -->

                    <div class="row" id="ads_create_personal_info">
                        <h2>Personal Information</h2>
                        <div class="col-lg-12">

                            <div class="col-lg-12">

                                <div class="form-horizontal">

                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-3">
                                            <label for="input_email" class="control-label">Email</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-9">
                                            <input type="email" class="form-control" id="input_email" placeholder="Email" name="email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-3">
                                            <label for="verify_email" class="control-label">Verify Email</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-9">
                                            <input type="email" class="form-control" name="verify_email" id="verify_email" placeholder="Verify Email">
                                        </div>
                                    </div>

                                    <div class="form-inline">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="contact_info_phone_number">Phone number</label>
                                            </div>
                                            <div class="col-xs-12">
                                                <input type="tel" name="phone" class="form-control" id="contact_info_phone_number" placeholder="Phone Number">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="contact_info_name">Name</label>
                                            </div>
                                            <div class="col-xs-12">
                                                <input type="text" name="name" class="form-control" id="contact_info_name" placeholder="Name">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                            <div class="form-group">

                                                <div class="checkbox create_ads_checkbox">
                                                  <label>
                                                    <input type="checkbox" name="call_poster">Call
                                                  </label>
                                                </div>

                                                <div class="checkbox create_ads_checkbox">
                                                    <label>
                                                        <input type="checkbox" name="text_poster">Text
                                                    </label>
                                                </div>

                                                <div class="checkbox create_ads_checkbox">
                                                    <label>
                                                        <input type="checkbox" name="email_poster">Email
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Posting Title , Price, Location, and Zip -->

                    <div class="row" id="ads_create_title_zip">
                        <h2>Post Title and Pickup Location</h2>
                        <div class="col-md-12">
                            <div class="form-inline">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                            <label for="ads_create_phone">Title</label>
                                        <div>
                                            <input type="text" name="title" class="form-control" id="ads_create_phone" placeholder="Title">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                            <label for="ads_create_price">Price</label>
                                        <div class="">
                                            <input type="number" name="price" min="0" class="form-control" id="ads_create_price" placeholder="Price">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                            <label for="ads_create_zip">zip</label>
                                        <div class="">
                                            <input type="number" name="zip" max="99999" class="form-control" id="ads_create_zip" placeholder="Zip">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Details about item, will change based upon the category -->

                    <div class="row" id="ads_create_details">
                        <h2>Details</h2>
                        <div class="col-md-12">
                            <div class="form-inline">

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="type_select">Year</label>
                                        <div>
                                            <select class="form-control" id="type_select" name="year">
                                                <option>2016</option>
                                                <option>2015</option>
                                                <option>2014</option>
                                                <option>2013</option>
                                                <option>2012</option>
                                                <option>2011</option>
                                                <option>2010</option>
                                                <option>2009</option>
                                                <option>2008</option>
                                                <option>2007</option>
                                                <option>2006</option>
                                                <option>2005</option>
                                                <option>2004</option>
                                                <option>2003</option>
                                                <option>2002</option>
                                                <option>2001</option>
                                                <option>2000</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="make_type">Make</label>
                                        <div>
                                            <select class="form-control" id="make_type" name="make">
                                                <option>Dodge</option>
                                                <option>Ford</option>
                                                <option>BMW</option>
                                                <option>Jeep</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="model">Model</label>
                                        <div>
                                            <select class="form-control" id="model" name="model">
                                                <option>4 Door</option>
                                                <option>2 Door</option>
                                                <option>Luxery</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="color">Color</label>
                                        <div>
                                            <select class="form-control" id="color" name="color">
                                                <option>Green</option>
                                                <option>Red</option>
                                                <option>Blue</option>
                                                <option>Pink</option>
                                                <option>Yellow</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- <button type="submit" class="btn btn-default">Send invitation</button> -->
                            </div>  
                        </div>
                    </div>

                    <!-- Description of the Item being sold -->

                    <div class="row" id="ads_create_description">
                        <h2>Description</h2>
                        <div class="col-md-12">
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="row" id="ads_create_submit_button_row">
                        <button class="btn">Submit Form</button>
                    </div>

                </form>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 hidden-md hidden-lg">
                        <?php include '../views/partials/mobile.ads.php'; ?>
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