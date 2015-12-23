<?php

require_once 'config.php';

require_once 'db.connect.php';

// echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

// $dbc->exec('TRUNCATE TABLE `users`;');


$dbc->exec('DROP TABLE IF EXISTS `posts`;');
$dbc->exec('DROP TABLE IF EXISTS `users`;');

$dbc->exec("
	CREATE TABLE `users` (
		user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		email VARCHAR(50) NOT NULL,
		username VARCHAR(30) NOT NULL,
		password VARCHAR(100) NOT NULL,
		age INT UNSIGNED DEFAULT 99,
		locId INT UNSIGNED NOT NULL,
		phone VARCHAR(20) DEFAULT 'Dont call or text me',
		call_user VARCHAR(3) DEFAULT '',
		text_user VARCHAR(3) DEFAULT '',
		email_user VARCHAR(3) DEFAULT '',
		date_created TIMESTAMP DEFAULT NOW(),
		PRIMARY KEY (user_id),
		FOREIGN KEY (`locId`) REFERENCES `location` (`locId`)
	);");



$dbc->exec("
	CREATE TABLE `posts` (
		post_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		business_type VARCHAR(20) DEFAULT 'Misc.',
		user_id INT UNSIGNED NOT NULL,
		title VARCHAR(100) DEFAULT 'NONE',
		price  NUMERIC(15,2) DEFAULT '0.00',
		locId INT UNSIGNED NOT NULL,
		category VARCHAR(30) DEFAULT 'free',
 		date_posted TIMESTAMP DEFAULT NOW(),
		description TEXT ,
		PRIMARY KEY (post_id),
		FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
		FOREIGN KEY (`locId`) REFERENCES `location` (`locId`)
	);");

//,
//		FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE

