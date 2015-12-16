<?php

require_once 'config.php';

require_once 'db.connect.php';

$users = [
	[
	'username' => 'sprov03',
	'password' => 'we need to hash',
	'email'    => 'sprov03@gmail.com',
	'age'      => 80
	],
	[
	'username' => 'ryaski',
	'password' => 'we also need to hash',
	'email'    => 'ryanski@yahoo.com',
	'age'      => 70
	],
	[
	'username' => 'woot nayey',
	'password' => 'needs to be hashed',
	'email'    => 'lastFakeEmail@poopyface.org',
	'age'      => 23
	],
	[
	'username' => 'funycat',
	'password' => 'mean dog unhashed',
	'email'    => 'anotherfakeemail@google.com',
	'age'      => 44
	]
];

$posts = [
	[
	'business_type' => 'For sale by owner',
	'user_id' => 2,
	'title' => 'old notebook',
	'price' => 23.05,
	'zip' => '78250',
	'category' => 'truck',
	'description' => ' i love this truck'
	],
	[
	'business_type' => 'For sale by dealer',
	'user_id' =>1,
	'title' => 'soggy leather',
	'price' => 33.44,
	'zip' => '78450',
	'category' => 'truck',
	'description' => ' i love this truck'
	],
	[
	'business_type' => 'Buying',
	'user_id' => 3,
	'title' => 'flat tire',
	'price' => 44.44,
	'zip' => '78850',
	'category' => 'truck',
	'description' => ' i love this truck'
	],
	[
	'business_type' => 'For sale by owner',
	'user_id' => 2,
	'title' => 'vhs player',
	'price' => 44.44,
	'zip' => '78260',
	'category' => 'truck',
	'description' => ' i love this truck'
	],
	[
	'business_type' => 'Buying',
	'user_id' => 1,
	'title' => 'hot ice!!',
	'price' => 23.88,
	'zip' => '78253',
	'category' => 'truck',
	'description' => ' i love this truck'
	],

];

$dbc->exec('TRUNCATE `post`;');

$stmt = $dbc->prepare('INSERT INTO `post` 
	(business_type, user_id, title, price, zip, category, description) 
	VALUES (:business_type, :user_id, :title, :price, :zip, :category, :description)');

foreach($posts as $post) {

	$stmt->bindValue(':business_type', $post['business_type'],PDO::PARAM_STR);
	$stmt->bindValue(':user_id', $post['user_id'],PDO::PARAM_STR);
	$stmt->bindValue(':title', $post['title'],PDO::PARAM_STR);
	$stmt->bindValue(':price', $post['price'],PDO::PARAM_STR);
	$stmt->bindValue(':zip',$post['zip'],PDO::PARAM_STR);
	$stmt->bindValue(':category', $post['category'],PDO::PARAM_STR);
	$stmt->bindValue(':description', $post['description'],PDO::PARAM_STR);

	$stmt->execute();
}

$dbc->exec('TRUNCATE `users`;');

$stmt = $dbc->prepare('INSERT INTO `users` 
	(email, username, password, age) 
	VALUES (:email, :username, :password, :age)');

foreach($users as $user) {

	$stmt->bindValue(':email', $user['email'],PDO::PARAM_STR);
	$stmt->bindValue(':username', $user['username'],PDO::PARAM_STR);
	$stmt->bindValue(':password', $user['password'],PDO::PARAM_STR);
	$stmt->bindValue(':age', $user['age'],PDO::PARAM_STR);

	$stmt->execute();
}
