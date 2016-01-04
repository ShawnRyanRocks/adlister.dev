<?php
var_dump($_POST);
var_dump($errors);

include_once '../bootstrap.php';

if (isset($_POST)){

	try{
		$email = Input::getString('email',5,50);
	} catch(Exception $e){
		$errors['email'] = $e->getMessage();
	}
	try{
		$verify_email= Input::getString('verify_email',5,50);
	} catch(Exception $e){
		$errors['verify_email'] = $e->getMessage();
	}
	try{
		$password = Input::getString('password',1,100);
	} catch(Exception $e){
		$errors['password'] = $e->getMessage();
	}
	try{
		$verify_password = Input::getString('verify_password',1,100);
	} catch(Exception $e){
		$errors['verify_password'] = $e->getMessage();
	}
	try{
		$username = Input::getString('username',1,30);

	} catch(Exception $e){
		$errors['username'] = $e->getMessage();
	}
	try{
		$age = Input::getNumber('age',1,10);
	} catch(Exception $e){
		$errors['age'] = $e->getMessage();
	}
	try{
		$zip = Input::getNumber('zipcode',5,10);
	} catch(Exception $e){
		$errors['zipcode'] = $e->getMessage();
	}
	try{
		$phone = Input::getNumber('phone',10,20);
	} catch(Exception $e){
		$errors['phone'] = $e->getMessage();
	}
	try{
		$call_poster = Input::getString('call_poster',1,3);

	} catch(Exception $e){
		$errors['call_poster'] = $e->getMessage();
	}
	try{
		$call_poster = Input::getString('text_poster',1,3);

	} catch(Exception $e){
		$errors['text_poster'] = $e->getMessage();
	}
	try{
		$email_poster = Input::getString('email_poster',1,3);

	} catch(Exception $e){
		$errors['email_poster'] = $e->getMessage();
	}

	if ($email !== $verify_email) 
	{
		$errors['emailsCheck'] = "Emails do not match.";
	}
	if($password !== $verify_password)
	{
		$errors['passwordCheck'] = "Passwords do not match";
	}
	if (!Input::has('call_poster') && !Input::has('text_poster') && !Input::has('email_poster'))
	{
		$errors['contact_poster'] = "You did not select preferred method(s) of contact";
	}
	try{


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
	} catch (Exception $e){
		$errors['zip'] = $e->getMessage();
	}

	var_dump($locId);







	if(empty($errors)){
		
		try {
			
			$hashWord= password_hash($password, PASSWORD_DEFAULT);
			$stmt = $dbc->prepare('INSERT INTO `users`
				( email, username, password, age, locId, phone, text_user, call_user, email_user)
				VALUES ( :email, :username, :password, :age, :locId, :phone, :text_user, :call_user, :email_user)');
					
				
				$stmt->bindValue(':email',$email,PDO::PARAM_STR);
				$stmt->bindValue(':username',$username,PDO::PARAM_STR);
				$stmt->bindValue(':password',$hashWord,PDO::PARAM_STR);
				$stmt->bindValue(':age',$age,PDO::PARAM_STR);
				$stmt->bindValue(':locId',$locId,PDO::PARAM_STR);
				$stmt->bindValue(':phone',$phone,PDO::PARAM_STR);
				$stmt->bindValue(':text_user',$text_poster,PDO::PARAM_STR);
				$stmt->bindValue(':call_user',$call_poster,PDO::PARAM_STR);
				$stmt->bindValue(':email_user',$email_poster,PDO::PARAM_STR);

				$stmt->execute();
				$lastId = $dbc->lastInsertId();
				
				$_SESSION['errors']=null;
				$_SESSION['saved']=null;
				header("Location: /users.show.php?post={$lastId}");
				die();
		} catch(Exception $e){
			$errors['mysql']= $e->getMessage();
			$_SESSION['errors'] = $errors;
			$_SESSION['saved'] = $_POST;
			header("Location: /users.create.php");
			die();
		}

	}else {
		$_SESSION['errors']=$errors;
		$_SESSION['saved']=$_POST;

		header("Location: /users.create.php");
		die();

	}else {
		header("Location: /users.edit.php");
		die();
	}

}
	
