<?php

require_once 'config.php';

require_once 'db.connect.php';

// echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

// $dbc->exec('TRUNCATE TABLE `users`;');

$dbc->exec('DROP TABLE IF EXISTS `users`;');

$dbc->exec("
	CREATE TABLE `users` (
		id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		email VARCHAR(50) NOT NULL,
		username VARCHAR(30) NOT NULL,
		password VARCHAR(30) NOT NULL,
		age INT UNSIGNED DEFAULT 99,
		date_created TIMESTAMP DEFAULT NOW(),
		PRIMARY KEY (id)
	);");


$dbc->exec('DROP TABLE IF EXISTS `post`;');

$dbc->exec("
	CREATE TABLE `post` (
		id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		business_type VARCHAR(20) DEFAULT 'Misc.',
		user_id INT UNSIGNED NOT NULL,
		title VARCHAR(100) DEFAULT 'NONE',
		price  NUMERIC(15,2) DEFAULT '0.00',
		zip VARCHAR(10) DEFAULT 'NONE',
		category VARCHAR(30) DEFAULT 'free',
 		date_posted TIMESTAMP DEFAULT NOW(),
		description TEXT ,
		PRIMARY KEY (id)

	);");

// CREATE TABLE quotes (
//     id INT UNSIGNED NOT NULL AUTO_INCREMENT,
//     author_first_name VARCHAR(50) DEFAULT 'NONE',
//     author_last_name  VARCHAR(100) NOT NULL,
//     content TEXT NOT NULL,
//     PRIMARY KEY (id)
// );

