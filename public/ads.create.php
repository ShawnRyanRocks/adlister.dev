<?php include_once '../bootstrap.php'; ?>
<?php 
var_dump($_SESSION['saved']);
var_dump($_SESSION['errors']);



if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

echo $ip;

$value = explode('.', $ip);
var_dump($value);
$integer_ip =     (16777216 * $value[0]) 
                + (   65536 * $value[1]) 
                + (     256 * $value[2])
                + (           $value[3]);


echo $integer_ip;



function pageController()
{
    $textInputString = 'class="form-control"';
    $textErrorString = 'class="form-control adsCreateTextInputErrorClass" autofocus';
    $checkboxErrorString = 'class="adsCreatTextInputErrorClass" autofocus';

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

    $errors = [
        'seller_type' => null ,
        'category' => null ,
        'email' => $textInputString ,
        'verify_email' => $textInputString,
        'phone' => $textInputString,
        'name' => $textInputString,
        'contact_poster' => null,
        'title' => $textInputString,
        'price' => $textInputString,
        'zip' => $textInputString,
        'description' => $textInputString,
        'emailsCheck' => null
    ];

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

        } else if ($key === 'emailsCheck'){

            $errors['email'] = $textErrorString;
            $errors['verify_email'] = $textErrorString;
        } else if ($key === 'contact_poster') {
            $errors['contact_poster'] = $checkboxErrorString;
        }else {
            $errors[$key] = $value;
        }
    }

    foreach($_SESSION['saved'] as $key => $value)
    {
        if(($key === 'call_poster' || 
            $key === 'text_poster' ||
            $key === 'email_poster' ) &&
            $value === 'on')
        {
            $saved[$key] = 'checked';
        } else {

            $saved[$key] = $value;
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

                <form action="/ads.create.auth.php" method="POST">

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
                                            <label for="input_email" class="control-label">Email</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-9">
                                            <input type="email" <?=$errors['email'];?> value="<?=$saved['email'];?>" id="input_email" placeholder="Email" name="email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-3">
                                            <label for="verify_email" class="control-label">Verify Email</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-9">
                                            <input type="email" <?=$errors['verify_email'];?> value="<?=$saved['verify_email'];?>" name="verify_email" id="verify_email" placeholder="Verify Email">
                                        </div>
                                    </div>

                                    <div class="form-inline">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="contact_info_phone_number">Phone number</label>
                                            </div>
                                            <div class="col-xs-12">
                                                <input  type="tel" <?=$errors['phone'];?> value="<?=$saved['phone'];?>" name="phone" id="contact_info_phone_number" placeholder="Phone Number">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="contact_info_name">Name</label>
                                            </div>
                                            <div class="col-xs-12">
                                                <input type="text" <?=$errors['name'];?> value="<?=$saved['name'];?>" name="name" id="contact_info_name" placeholder="Name">
                                            </div>
                                        </div>
                                    </div>

<!--   Check Boxes -->
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                            <div class="form-group">

                                                <div class="checkbox create_ads_checkbox">
                                                  <label>
                                                    <input type="checkbox" <?=$errors['contact_poster'];?> <?=$saved['call_poster'];?> name="call_poster">Call
                                                  </label>
                                                </div>

                                                <div class="checkbox create_ads_checkbox">
                                                    <label>
                                                        <input type="checkbox" <?=$errors['contact_poster'];?> <?=$saved['text_poster'];?> name="text_poster">Text
                                                    </label>
                                                </div>

                                                <div class="checkbox create_ads_checkbox">
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
                                <div class="form-group">
                                    <div class="col-sm-12">
                                            <label for="ads_create_phone">Title</label>
                                        <div>
                                            <input type="text" <?=$errors['title'];?> value="<?=$saved['title'];?>" name="title" id="ads_create_phone" placeholder="Title">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                            <label for="ads_create_price">Price</label>
                                        <div class="">
                                            <input type="number" <?=$errors['price'];?> value="<?=$saved['price'];?>" name="price" min="0" id="ads_create_price" placeholder="Price">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                            <label for="ads_create_zip">zip</label>
                                        <div class="">
                                            <input type="number" <?=$errors['zip'];?> value="<?=$saved['zip'];?>" name="zip" max="99999" id="ads_create_zip" placeholder="Zip">
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