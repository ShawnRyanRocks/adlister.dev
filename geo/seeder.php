<?php

// require_once 'geoCityParser.php';
require_once 'config.php';
require 'db.connect.php';

function toNull($string)
{
	if($string === '')
	{
		return null;
	} else {
		return $string;
	}
}

//$geo_array is the indexed accosiatave array 

// foreach($geo_array as $index => $row)
// {
	$query = "
		INSERT INTO `location`
		(locId,country,region,city,postalCode,latitude,longitude,dmaCode,areaCode)
		VALUES (:locId,:country,:region,:city,:postalCode,:latitude,:longitude,:dmaCode,:areaCode);
	";
	$stmt = $dbc->prepare($query);

	$stmt->bindValue(':locId', '8',PDO::PARAM_INT);
	$stmt->bindValue(':country', 'AG',PDO::PARAM_STR);
	$stmt->bindValue(':region', '',PDO::PARAM_STR);
	$stmt->bindValue(':city', '',PDO::PARAM_STR);
	$stmt->bindValue(':postalCode', '',PDO::PARAM_STR);
	$stmt->bindValue(':latitude', '7.0500',PDO::PARAM_INT);
	$stmt->bindValue(':longitude', '-16.80000',PDO::PARAM_INT);
	$stmt->bindValue(':dmaCode', toNull(''),PDO::PARAM_INT);
	$stmt->bindValue(':areaCode', toNull(''),PDO::PARAM_INT);

	$stmt->execute();
// }





		// locId int(10) unsigned NOT NULL,
		// country char(2) NOT NULL,
		// region char(2) NOT NULL,
		// city varchar(50),
		// postalCode char(5) NOT NULL,
		// latitude float,
		// longitude float,
		// dmaCode integer,
		// areaCode integer,

