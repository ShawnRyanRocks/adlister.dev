<?php

require_once 'config.php';

require_once 'db.connect.php';

$users = [
	[
	'email'      => 'sprov03@gmail.com',
	'username'   => 'sprov03',
	'password'   => '$2y$10$xMZseZ7uAYblJc3pphYTXuZDYgO04w.hoagQasDYLjqYgKsvHlSOe',
	'age'        => 80,
	'locId'      => 127343,
	'phone'      => 'Dont call or text me',
	'call_user'  => '',
	'text_user'  => '',
	'email_user' => 'yes'
	],
	[
	'email'      => 'ryanski@yahoo.com',
	'username'   => 'ryaski',
	'password'   => '$2y$10$rZZznzyFub88btArfOVdc.2AuZ1H9mMAL.WEJzkauzegsMjDUD7Kq',
	'age'        => 70,
	'locId'      => 19245,
	'phone'      => 'woot',
	'call_user'  => 'yes',
	'text_user'  => '',
	'email_user' => 'yes'
	],
];

$posts = [
	[
	'business_type' => 'For sale by owner',
	'user_id' => 1,
	'title' => 'old notebook',
	'price' => 23.05,
	'zip' => '78250',
	'category' => 'truck',
	'description' => ' i love this truck',
	'img' => 'mousetrap.jpg'
	],
	[
	'business_type' => 'For sale by dealer',
	'user_id' =>1,
	'title' => 'soggy leather',
	'price' => 33.44,
	'zip' => '78250',
	'category' => 'truck',
	'description' => ' i love this truck',
	'img' => 'mousetrap.jpg'
	],
	[
	'business_type' => 'Buying',
	'user_id' => 1,
	'title' => 'flat tire',
	'price' => 44.44,
	'zip' => '78850',
	'category' => 'truck',
	'description' => ' i love this truck',
	'img' => 'mousetrap.jpg'
	],
	[
	'business_type' => 'For sale by owner',
	'user_id' => 1,
	'title' => 'vhs player',
	'price' => 44.44,
	'zip' => '78260',
	'category' => 'truck',
	'description' => ' i love this truck',
	'img' => 'mousetrap.jpg'
	],
	[
	'business_type' => 'Buying',
	'user_id' => 1,
	'title' => 'hot ice!!',
	'price' => 23.88,
	'zip' => '78253',
	'category' => 'truck',
	'description' => ' i love this truck',
	'img' => 'mousetrap.jpg'
	]
];



// $dbc->exec('TRUNCATE `posts`;');
// $dbc->exec('TRUNCATE `users`;');


$stmt = $dbc->prepare('INSERT INTO `users` 
	(email, username, password, age, locId, phone, call_user, text_user, email_user) 
	VALUES (:email, :username, :password, :age, :locId, :phone, :call_user, 
	:text_user, :email_user)');

foreach($users as $user) {

	$stmt->bindValue(':email', $user['email'],PDO::PARAM_STR);
	$stmt->bindValue(':username', $user['username'],PDO::PARAM_STR);
	$stmt->bindValue(':password', $user['password'],PDO::PARAM_STR);
	$stmt->bindValue(':age', $user['age'],PDO::PARAM_STR);
	$stmt->bindValue(':locId', $user['locId'],PDO::PARAM_STR);
	$stmt->bindValue(':phone', $user['phone'],PDO::PARAM_STR);
	$stmt->bindValue(':call_user', $user['call_user'],PDO::PARAM_STR);
	$stmt->bindValue(':text_user', $user['text_user'],PDO::PARAM_STR);
	$stmt->bindValue(':email_user', $user['email_user'],PDO::PARAM_STR);

	$stmt->execute();
}


$stmt = $dbc->prepare('INSERT INTO `posts` 
	(business_type, user_id, title, price, locId, category, description, img) 
	VALUES (:business_type, :user_id, :title, :price, :locId, :category, :description, :img)');

foreach($posts as $post) {

	$query = "
		SELECT `locId` 
		FROM `location`
		WHERE `postalCode` = :postalCode
		LIMIT 1
	";

	$stmtZip = $dbc->prepare($query);
	$stmtZip->bindValue(':postalCode', $post['zip'], PDO::PARAM_INT);
	$stmtZip->execute();
	$locId =  $stmtZip->fetch(PDO::FETCH_ASSOC)['locId'];

	$stmt->bindValue(':business_type', $post['business_type'],PDO::PARAM_STR);
	$stmt->bindValue(':user_id', $post['user_id'],PDO::PARAM_STR);
	$stmt->bindValue(':title', $post['title'],PDO::PARAM_STR);
	$stmt->bindValue(':price', $post['price'],PDO::PARAM_STR);
	$stmt->bindValue(':locId',$locId,PDO::PARAM_STR);
	$stmt->bindValue(':category', $post['category'],PDO::PARAM_STR);
	$stmt->bindValue(':description', $post['description'],PDO::PARAM_STR);
	$stmt->bindValue(':img', $post['img'], PDO::PARAM_STR);

	$stmt->execute();
}


