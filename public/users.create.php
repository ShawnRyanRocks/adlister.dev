<?php

function pageController(){
	require_once '../bootstrap.php';
	// if(!Auth::check()){
	// 	header('Location: /users.create.php');
	// 	die();
	// }
	if(isset($_SESSION['saved'])){var_dump($_SESSION['saved']);}
    if(isset($_SESSION['errors'])){var_dump($_SESSION['errors']);}

    
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    if(!Input::has('zip'))
    {
        $query = "
            SELECT `postalCode`
            FROM `location`
            WHERE `locId` = :locId
        ";
        $stmt = $dbc->prepare($query);
        $stmt->bindValue(":locId",Input::get('locId'),PDO::PARAM_INT);
        $stmt->execute();
        $_SESSION['saved']['zip'] = $stmt->fetch(PDO::FETCH_ASSOC)['postalCode'];
    }
     $textInputString = 'class="form-control"';
    $textErrorString = 'class="form-control usersCreateTextInputErrorClass" autofocus';
    $checkboxErrorString = 'autofocus';
    $checkboxError = 'colorRed backgroundYellow';

   	$saved = [

   		'user_id' => null,
   		'email' => null,
   		'verify_email' => null,
   		'username' => null,
   		'age' => null,
   		'zip' => null,
   		'phone' => null,
   		'call_poster' => null,
        'text_poster' => null,
        'email_poster' => null
		];


    


    $errors = [


   		'user_id' => null,
   		'email' => $textInputString,
   		'verify_email' => $textInputString,
   		'username' => $textInputString,
   		'age' => $textInputString,
   		'zip' => $textInputString,
   		'phone' => $textInputString,
   		'contact_poster' => null,
   		'checkboxError' => null,
   		'emailsCheck' => null
    ];

    if(isset($_SESSION['errors'])){
    	foreach($_SESSION['errors'] as $key => $value)
    	{
    		if(	$key === 'email' ||
    			$key === 'verify_email' ||
    			$key === 'username' ||
    			$key === 'age' ||
    			$key === 'zip' ||
    			$key === 'phone'
    			

    			)
    		{
    			$errors[$key] = $textErrorString;
    		}else if ($key === 'contact_poster'){
    			$errors['contact_poster'] = $checkboxErrorString;
                $errors['checkboxError'] = $checkboxError;
    		}else{
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

				<form action="/users.create.auth.php" method="POST" id = "users_create_form" enctype ="multipart/form-data">
				<div id= 'users_create'>
					<div class="row">
					    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="form-inline">
					      		<div class="form-group">
							
								
									
									<label for="input_email" class="control-label"  >Email</label>
									<input type="email"  id="input_email"   name="email">

									<input type="email"    id="verify_email"   name="verify_email">
								</div>
							</div>
							<div class="form-inline">
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" placeholder="password here">
									<input type="password" name="verify_password" placeholder="verify password">
									
								</div>
							</div>
							<div class="form-inline">
					      		<div class="form-group">
									<label for = "Username">Username</label>
									<input type="text"  value="<?=$saved['username'];?>"  id="username" name="username" placeholder="username">
								</div>
							</div>
							<div class="form-inline">
					      		<div class="form-group">		
									<label for = "age">Age</label>
									<input type="text" <?=$errors['age'];?> value ="<?=$saved['age'];?>" id="age" name="age" placeholder="age">
									
								</div>
							</div>
							<div class="form-inline">
					      		<div class="form-group">		
									<label for "zip">Zip Code</label>
									<input type="text"	<?=$errors['zip'];?> value="<?=$saved['zip'];?>"  id="zipcode" name="zipcode" placeholder="Zip Code">
									
								</div>
							</div>
							<div class="form-inline">
					      		<div class="form-group">		
									<label for "phone number">Phone #</label>
									<input type="text" <?=$errors['phone'];?> value="<?=$saved['phone'];?>" id="digits" name="phone" placeholder="digits">
								
								</div>
							</div>
							<!--  <div class="row"> -->
							 	
                                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                            <div class="form-group">
												<div>Preferred Method of Communication
                                                <div class="checkbox create_users_checkbox <?=$errors['checkboxError'];?> ">
                                                  
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
                                    <!-- </div> -->
                              


						</div>
							
							<div class="row" class = "btn btn-default" id="create_user_submit_button_row">
                       			 <button class="btn">Submit Form</button>
                    		</div>
                    	</form>
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
