<?php
require_once '../bootstrap.php';

var_dump($_FILES);

$file = $_FILES['csvFile']['tmp_name'];
$handle = fopen($file, 'r');

$header = fgetcsv($handle);
var_dump($header);

$query = "
	INSERT INTO `posts` 
	(business_type, user_id, title, price, locId, category, description, img) 
	VALUES (:business_type, :user_id, :title, :price, :locId, :category, :description, :img)
";

$stmt = $dbc->prepare($query);

while( ( $row = fgetcsv($handle) ) !== false ){

	$row = array_combine($header,$row);

		$query = "
			SELECT `locId` 
			FROM `location`
			WHERE `postalCode` = :postalCode
			LIMIT 1
		";

		$stmtZip = $dbc->prepare($query);
		$stmtZip->bindValue(':postalCode', $row['zip'], PDO::PARAM_INT);
		$stmtZip->execute();
		$locId =  $stmtZip->fetch(PDO::FETCH_ASSOC)['locId'];


		$stmt->bindValue(':business_type', $row['business_type'],PDO::PARAM_STR);
		$stmt->bindValue(':user_id', $row['user_id'],PDO::PARAM_INT);
		$stmt->bindValue(':title', $row['title'],PDO::PARAM_STR);
		$stmt->bindValue(':price', $row['price'],PDO::PARAM_STR);
		$stmt->bindValue(':locId',$locId,PDO::PARAM_INT);
		$stmt->bindValue(':category', $row['category'],PDO::PARAM_STR);
		$stmt->bindValue(':description', $row['description'],PDO::PARAM_STR);
		$stmt->bindValue(':img', $row['img'], PDO::PARAM_STR);

		$stmt->execute();
}










