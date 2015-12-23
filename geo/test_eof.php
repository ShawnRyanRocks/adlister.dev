<?php
require_once 'config.php';

function toNull($string)
{
	if($string === '')
	{
		return null;
	} else {
		return $string;
	}
}
$i = 0;
$file = new SplFileObject("GeoLiteCity-Location.csv");
while ( ! $file->eof()) 
{
	$line = $file->fgets();

	if ($i % 5000 === 0) {echo $line . PHP_EOL;}
	$i++;
  
	$line = str_replace(array('"'), '' , $line);
	$data = explode(',' , $line);
	$queryData = [
		'locId' => $data[0],
		'country' => $data[1],
		'region' => $data[2],
		'city' => $data[3],
		'postalCode' => $data[4],
		'latitude' => $data[5],
		'longitude' => $data[6],
		'dmaCode' => $data[7],
		'areaCode' => $data[8]

	];
		
	if ($queryData['country'] === 'US')
	{

		$query = "
			INSERT INTO `location`
			(locId,country,region,city,postalCode,latitude,longitude,dmaCode,areaCode)
			VALUES (:locId,:country,:region,:city,:postalCode,:latitude,:longitude,:dmaCode,:areaCode);
		";

		try{

		require 'db.connect.php';

		$stmt = $dbc->prepare($query);

		$stmt->bindValue(':locId', $queryData['locId'],PDO::PARAM_INT);
		$stmt->bindValue(':country', $queryData['country'],PDO::PARAM_STR);
		$stmt->bindValue(':region', $queryData['region'],PDO::PARAM_STR);
		$stmt->bindValue(':city', $queryData['city'],PDO::PARAM_STR);
		$stmt->bindValue(':postalCode', $queryData['postalCode'],PDO::PARAM_STR);
		$stmt->bindValue(':latitude', $queryData['latitude'],PDO::PARAM_INT);
		$stmt->bindValue(':longitude', $queryData['longitude'],PDO::PARAM_INT);
		$stmt->bindValue(':dmaCode', toNull($queryData['dmaCode']),PDO::PARAM_INT);
		$stmt->bindValue(':areaCode', toNull($queryData['areaCode']),PDO::PARAM_INT);

		$stmt->execute();
		}catch (Exception $e){
			$errors[] = $line;	
		}
	}
}

print_r($erros);
  