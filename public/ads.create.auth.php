<?php
include_once '../bootstrap.php';

if (isset($_POST)){

var_dump($_POST);

	if( Input::has('seller_type') && 
	    Input::has('category') &&
	    Input::has('email') &&
	    Input::has('verify_email') &&
	    Input::has('phone') &&
	    Input::has('name') &&
	    Input::has('title') &&
	    Input::has('price') &&
	    Input::has('zip') &&
	    Input::has('description')
	    ) 
	{
	    echo "evertying is filled out that is nessisary <br>";
	}

	else {
	    echo"you missed something<br>";
	}

	try {
		$seller_type = Input::getString('seller_type',1,30);
	} catch (Exception $e) {
		$errors['seller_type'] = $e->getMessage();	
	}

	try {
		$category = Input::getString('category',1,50);
	} catch (Exception $e) {
		$errors['category'] = $e->getMessage();	
	}

	// try {
	// 	$email = Input::getString('email',5,200);
	// } catch (Exception $e) {
	// 	$errors['email'] = $e->getMessage();	
	// }

	// try {
	// 	$verify_email = Input::getString('verify_email',0,500);
	// } catch (Exception $e) {
	// 	$errors['verify_email'] = $e->getMessage();	
	// }

	// try {
	// 	$phone = Input::getNumber('phone',0,500);
	// } catch (Exception $e) {
	// 	$errors['phone'] = $e->getMessage();	
	// }

	// try {
	// 	$name = Input::getString('name',0,500);
	// } catch (Exception $e) {
	// 	$errors['name'] = $e->getMessage();	
	// }

	try {
		$title = Input::getString('title',0,500);
	} catch (Exception $e) {
		$errors['title'] = $e->getMessage();	
	}

	try {
		$price = Input::getNumber('price',0,500);
	} catch (Exception $e) {
		$errors['price'] = $e->getMessage();	
	}

	try {
		$zip = Input::getNumber('zip',0,500);
	} catch (Exception $e) {
		$errors['zip'] = $e->getMessage();	
	}

	try {
		$description = Input::getString('description',0,500);
	} catch (Exception $e) {
		$errors['description'] = $e->getMessage();	
	}

	if (empty($errors)) {

		$stmt = $dbc->prepare('INSERT INTO `posts` 
			(business_type, user_id, title, price, zip, category, description) 
			VALUES (:business_type, :user_id, :title, :price, :zip, :category, :description)');

		$stmt->bindValue(':business_type', $seller_type,PDO::PARAM_STR);
		$stmt->bindValue(':user_id', $_SESSION['LOGGED_IN_USER']->user_id,PDO::PARAM_STR);
		$stmt->bindValue(':title', $title,PDO::PARAM_STR);
		$stmt->bindValue(':price', $price,PDO::PARAM_STR);
		$stmt->bindValue(':zip',$zip,PDO::PARAM_STR);
		$stmt->bindValue(':category', $category,PDO::PARAM_STR);
		$stmt->bindValue(':description', $description,PDO::PARAM_STR);

		$stmt->execute();

	} else {
		var_dump($errors);
// 		session_start();
		
// 		$_SESSION['errors'] = $errors;
// 		$_SESSION['saved'] = $_POST;

// 		header("Location: /national_park_form.php");
// 		die();
	}

} else {
	echo"you did not post a form";
	// header("Location: /ads.edit.php");
	// die();
}

