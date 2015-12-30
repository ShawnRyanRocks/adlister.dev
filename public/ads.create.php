<?php 
function pageController()
{
    require_once '../bootstrap.php';

    if(!Auth::check()){
        header("Location: /users.login.php");
        die();
    }

    if(isset($_SESSION['saved'])){var_dump($_SESSION['saved']);}
    if(isset($_SESSION['errors'])){var_dump($_SESSION['errors']);}



    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    echo $ip;
    
    if(!Input::has('zip'))
    {
        $query = "
            SELECT `postalCode`
            FROM `location`
            WHERE `locId` = :locId
        ";
        $stmt = $dbc->prepare($query);
        $stmt->bindValue(":locId",Auth::user()->locId,PDO::PARAM_INT);
        $stmt->execute();
        $_SESSION['saved']['zip'] = $stmt->fetch(PDO::FETCH_ASSOC)['postalCode'];
    }



    $textInputString = 'class="form-control"';
    $textErrorString = 'class="form-control adsCreateTextInputErrorClass" autofocus';
    $checkboxErrorString = 'autofocus';
    $checkboxError = 'colorRed backgroundYellow';

    $saved = [
        'seller_type' =>  null ,
        'category' =>  null ,
        'email' =>  null,
        'verify_email' => null,
        'phone' => null,
        'name' => null,
        'call_poster' => null,
        'text_poster' => null,
        'email_poster' => null,
        'title' => null,
        'price' => null,
        'zip' => null,
        'year' => null,
        'make' => null,
        'model' => null,
        'color' => null,
        'description' => null
    ];

    if (Auth::user()->email_user === 'yes')
    {
        $saved['email_poster'] = 'checked';
    }
    if (Auth::user()->call_user === 'yes')
    {
        $saved['call_poster'] = 'checked';
    }
    if (Auth::user()->text_user === 'yes')
    {
        $saved['text_poster'] = 'checked';
    }

    $errors = [
        'seller_type' => null ,
        'category' => null ,
        'email' => $textInputString ,
        'verify_email' => $textInputString,
        'phone' => $textInputString,
        'name' => $textInputString,
        'contact_poster' => null,
        'checkboxError' => null,
        'title' => $textInputString,
        'price' => $textInputString,
        'zip' => $textInputString,
        'description' => $textInputString,
        'emailsCheck' => null
    ];

    if(isset($_SESSION['errors'])){

        foreach($_SESSION['errors'] as $key => $value)
        {
            if( $key === 'email' || 
                $key === 'verify_email' || 
                $key === 'phone' ||
                $key === 'name' ||
                $key === 'title' ||
                $key === 'price' ||
                $key === 'zip' ||
                $key === 'description'
                )
            {
                $errors[$key] = $textErrorString;

            } else if ($key === 'contact_poster') {
                $errors['contact_poster'] = $checkboxErrorString;
                $errors['checkboxError'] = $checkboxError;
            }else {
                $errors[$key] = $value;
            }
        }
    }

    if(isset($_SESSION['saved'])){

        foreach($_SESSION['saved'] as $key => $value)
        {
            if(($key === 'call_poster' || 
                $key === 'text_poster' ||
                $key === 'email_poster' ) &&
                ($value === 'on'))
            {
                $saved[$key] = 'checked';
            } else {

                $saved[$key] = $value;
            }
        }
    }

    return array(
            'errors' => $errors,
            'saved' => $saved
        );

}

extract(pageController());

function selected($value, $selected)
{
    if( $value === $selected){
        return "selected";
    } else {
        return null;
    }
}


 ?>
<?php include '../views/partials/header.php'; ?>

<div class="row">

    <div class="hidden-xs col-sm-2  col-md-2 col-lg-2">
        <?php include '../views/partials/nearby.cities.php'; ?>
    </div>


    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-8">

        <div class="main_body">
            <div class="col-lg-12">
<!-- Top two inline input options -->

                <div class="row" id="ads_create_type_category">

                    <div class="col-lg-12">
                        <?php include '../views/partials/navbar.php'; ?>
                    </div>
                    
                    <h2><?=$_SESSION['LOGGED_IN_USER']->username;?></h2>

                </div>

                <form action="/ads.create.auth.php" method="POST" id="ads_create_form" enctype="multipart/form-data">

<!-- Type and category selector -->

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <div class="col-lg-12">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label for="seller_type">Type</label>
                                        <select class="form-control" id="seller_type" name="seller_type">
                                            <option <?=selected("For Sale by Owner", $saved['seller_type']);?> >For Sale by Owner</option>
                                            <option <?=selected("For Sale by Dealer", $saved['seller_type']);?> >For Sale by Dealer</option>
                                            <option <?=selected("Buying", $saved['seller_type']);?> >Buying</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select class="form-control" id="category" name="category" value="<?=$saved['category']?>">
                                            <option <?=selected("Free", $saved['category']);?> >Free</option>
                                            <option <?=selected("Motorcycle", $saved['category']);?> >Motorcycle</option>
                                            <option <?=selected("Car", $saved['category']);?> >Car</option>
                                            <option <?=selected("Antiques", $saved['category']);?> >Antiques</option>
                                            <option <?=selected("Trucks", $saved['category']);?> >Trucks</option>
                                            <option <?=selected("House", $saved['category']);?> >House</option>
                                            <option <?=selected("Bike", $saved['category']);?> >Bike</option>
                                            <option <?=selected("Toys", $saved['category']);?> >Toys</option>
                                            <option <?=selected("Ride Home", $saved['category']);?> >Ride Home</option>
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
                                            <label for="input_email" class="control-label" <?=$errors['email'];?> >Email</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-9">
                                            <input type="email" <?=$errors['email'];?> value="<?=Auth::user()->email;?>" readonly="readonly" id="input_email"   name="email">
                                        </div>
                                    </div>

                                    <div class="form-inline">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="contact_info_phone_number">Phone number</label>
                                            </div>
                                            <div class="col-xs-12">
                                                <input  type="text" <?=$errors['phone'];?> value="<?=Auth::user()->phone;?>" readonly="readonly" name="phone" id="contact_info_phone_number" placeholder="Phone Number">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="contact_info_name">Username</label>
                                            </div>
                                            <div class="col-xs-12">
                                                <input type="text" <?=$errors['name'];?> value="<?=Auth::user()->username;?>" readonly="readonly" name="name" id="contact_info_name" placeholder="Name">
                                            </div>
                                        </div>
                                    </div>

<!--   Check Boxes -->
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                            <div class="form-group">

                                                <div class="checkbox create_ads_checkbox <?=$errors['checkboxError'];?> ">
                                                  <label>
                                                    <input type="checkbox" <?=$errors['contact_poster'];?> <?=$saved['call_poster'];?> name="call_poster">Call
                                                  </label>
                                                </div>

                                                <div class="checkbox create_ads_checkbox <?=$errors['checkboxError'];?> ">
                                                    <label>
                                                        <input type="checkbox" <?=$errors['contact_poster'];?> <?=$saved['text_poster'];?> name="text_poster">Text
                                                    </label>
                                                </div>

                                                <div class="checkbox create_ads_checkbox <?=$errors['checkboxError'];?> ">
                                                    <label>
                                                        <input type="checkbox" <?=$errors['contact_poster'];?> <?=$saved['email_poster'];?> name="email_poster">Email
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


                                <div class="form-group col-sm-4">
                                    <div class="col-sm-12">
                                            <label for="ads_create_phone">Title</label>
                                        <div>
                                            <input type="text" <?=$errors['title'];?> value="<?=$saved['title'];?>" name="title" id="ads_create_phone" placeholder="Title">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-sm-4">
                                  <div>
                                        <div class="col-xs-12">
                                            <label for="ads_create_price">Price</label>
                                        </div>
                                        <div class="col-xs-12">
                                            <label class="sr-only" for="ads_create_price">Amount (in dollars)</label>
                                            <div class="input-group">
                                              <div class="input-group-addon">$</div>
                                                <input type="text" <?=$errors['price'];?> value="<?=$saved['price'];?>" name="price" id="ads_create_price" placeholder="Amount">
                                              <div class="input-group-addon">.00</div>
                                            </div>
                                        </div>
                                  </div>
                                </div>

                                <div class="form-group col-sm-4">
                                    <div class="col-xs-12">
                                            <label for="ads_create_zip">zip</label>
                                        <div class="">
                                            <input type="number" <?=$errors['zip'];?> value="<?=$saved['zip'];?>" readonly="readonly" name="zip" max="99999" id="ads_create_zip" placeholder="Zip">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

<!-- Description of the Item being sold -->

                    <div class="row" id="ads_create_description">
                        <h2>Description</h2>
                        <div class="col-md-12">
                            <textarea  <?=$errors['description'];?> name="description" rows="3"><?=$saved['description'];?></textarea>
                        </div>
                    </div> 
                     
                    <p> 
                        <label for="img">File to upload:</label> 
                        <input id="img" type="file" name="img"> 
                    </p> 

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