<?php
include_once '../bootstrap.php';

if (isset($_POST)){

var_dump($_POST);

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

	try {
		$email = Input::getString('email',5,200);
	} catch (Exception $e) {
		$errors['email'] = $e->getMessage();	
	}

	try {
		$verify_email = Input::getString('verify_email',0,500);
	} catch (Exception $e) {
		$errors['verify_email'] = $e->getMessage();	
	}

	try {
		$phone = Input::getNumber('phone',0,500);
	} catch (Exception $e) {
		$errors['phone'] = $e->getMessage();	
	}

	try {
		$name = Input::getString('name',0,500);
	} catch (Exception $e) {
		$errors['name'] = $e->getMessage();	
	}

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

/*
 *	Further verification
 */
	if ($email !== $verify_email) 
	{
		$errors['emailsCheck'] = "Emails do not match.";
	}
	if (!Input::has('call_poster') && !Input::has('text_poster') && !Input::has('email_poster'))
	{
		$errors['contact_poster'] = "You did not select a form of contact";
	}

	if (empty($errors)) {

		try {
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

			$_SESSION['errors'] = null;
			$_SESSION['saved'] = null;
			header("Location: /ads.show.php");
			die();
		} catch (Exception $e) {
			$errors['mysql'] = $e->getMessage();

			$_SESSION['errors'] = $errors;
			$_SESSION['saved'] = $_POST;

			header("Location: /ads.create.php");
			die();			
		}
		

	} else {
		$_SESSION['errors'] = $errors;
		$_SESSION['saved'] = $_POST;

		header("Location: /ads.create.php");
		die();
	}

} else {
	header("Location: /ads.edit.php");
	die();
}

