<?php
include_once '../bootstrap.php';

var_dump($_POST);
var_dump($_FILES['img']);

if (isset($_POST)){

var_dump($_POST);

	try {
		$seller_type = Input::getString('seller_type',1,20);
	} catch (Exception $e) {
		$errors['seller_type'] = $e->getMessage();	
	}

	try {
		$category = Input::getString('category',1,30);
	} catch (Exception $e) {
		$errors['category'] = $e->getMessage();	
	}

	try {
		$email = Input::getString('email',5,200);
	} catch (Exception $e) {
		$errors['email'] = $e->getMessage();	
	}

	try {
		$phone = Input::getString('phone',0,500);
	} catch (Exception $e) {
		$errors['phone'] = $e->getMessage();	
	}

	try {
		$name = Input::getString('name',0,500);
	} catch (Exception $e) {
		$errors['name'] = $e->getMessage();	
	}

	try {
		$title = Input::getString('title',0,100);
	} catch (Exception $e) {
		$errors['title'] = $e->getMessage();	
	}

	try {
		$price = Input::getNumber('price',0,15);
	} catch (Exception $e) {
		$errors['price'] = $e->getMessage();	
	}

	try {
		$zip = Input::getNumber('zip',5,5);
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

	if (!Input::has('call_poster') && !Input::has('text_poster') && !Input::has('email_poster'))
	{
		$errors['contact_poster'] = "You did not select a form of contact";
	}

	try {
		if(!isset($errors['zip']))
		{
			$query = "
				SELECT `locId` 
				FROM `location`
				WHERE `postalCode` = :postalCode
				LIMIT 1
			";

			$stmtZip = $dbc->prepare($query);
			$stmtZip->bindValue(':postalCode', $zip, PDO::PARAM_INT);
			$stmtZip->execute();
			$locId =  $stmtZip->fetch(PDO::FETCH_ASSOC)['locId'];	
			if($locId === null)
			{
				throw new Exception('That zip is not in our database');
			}		
		}
	} catch (Exception $e) {

		$errors['zip'] = $e->getMessage();
	}
	
	if($_FILES['img']['error'] !== 4)
	{
		var_dump($_FILES);
		die();
		$uploadsDirectory = 'img/uploads/';

		$filename = $uploadsDirectory . basename($_FILES['img']['name']);

		if(!move_uploaded_file($_FILES['img']['tmp_name'], $filename))
		{
			$errors['img']= "Sorry, ther was an error uploading ";
		} else {
			$img = $_FILES['img']['name'];
		}
	}


/*
 *	If there were no errors thrown try to submit the post
 */
	if (empty($errors)) {

		try {
			$stmt = $dbc->prepare('INSERT INTO `posts` 
				(business_type, user_id, title, price, locId, category, description, img) 
				VALUES (:business_type, :user_id, :title, :price, :locId, :category, :description, :img)');

			$stmt->bindValue(':business_type', $seller_type,PDO::PARAM_STR);
			$stmt->bindValue(':user_id', $_SESSION['LOGGED_IN_USER']->user_id,PDO::PARAM_STR);
			$stmt->bindValue(':title', $title,PDO::PARAM_STR);
			$stmt->bindValue(':price', $price,PDO::PARAM_STR);
			$stmt->bindValue(':locId',$locId,PDO::PARAM_STR);
			$stmt->bindValue(':category', $category,PDO::PARAM_STR);
			$stmt->bindValue(':description', $description,PDO::PARAM_STR);
			$stmt->bindValue(':img', $img, PDO::PARAM_STR);

			$stmt->execute();

			$lastId = $dbc->lastInsertId();

			$_SESSION['errors'] = null;
			$_SESSION['saved'] = null;
			header("Location: /ads.show.php?post={$lastId}");
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

