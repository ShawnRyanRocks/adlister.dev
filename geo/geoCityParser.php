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

function parse_file($file)
{
	/**
	 *	Grabing contents from file
	 */
	$handle = fopen($file, 'r');
	$content = fread($handle, filesize($file));
	$content = trim($content);
	fclose($handle);

	/**
	 *	splitting the string into an array of lines
	 * 	Removing first line on title from the array
	 */
	// $content_lines = explode(PHP_EOL,$content);
	// array_shift($content_lines);

	require 'db.connect.php';
	$geoLines = [];
	$line = '';
	$i = 0;
	$j = 0;
	while($i < 2){
		if($content[$j] === '1'){
			$i++;
			$j++;
		} else {
			$j++;
		}
	}
	$j -= 1;



	while($i < 745182){
		if ( $content[$j] === PHP_EOL)
		{
			if ( !isset($content[$j]) ){
				break;
			}
			if ($i % 5000 === 0) {echo $line . PHP_EOL;}
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




			// print_r($queryData);
			$line = '';
			$i++;
		} else {
			$line .= $content[$j];
		}
		$j++;
	}


		// locId int(10) unsigned NOT NULL,
		// country char(2) NOT NULL,
		// region char(2) NOT NULL,
		// city varchar(50),
		// postalCode char(5) NOT NULL,
		// latitude float,
		// longitude float,
		// dmaCode integer,
		// areaCode integer,


	/**
	 *	Explode the lines of content into an tempary info array.
	 *	
	 *	Use the temaray info array to  create an associatave array and push onto parks
	 */
	// $parks_array = [];
	// foreach($content_lines as $line) {
	// 	$info_array = explode('","',$line);



	// 	$parks_array [] = [

	// 		'name' => substr($info_array[0],1),
	// 		'location' => $info_array[2],
	// 		'date_established' => date("Y-m-d",strtotime($info_array[3])),
	// 		'area' => $info_array[4],
	// 		'description' => substr($info_array[6],0,-1)
	// 	];
		
	// }

	return $errors;
}

$geo_array = parse_file('GeoLiteCity-Location.csv');
print_r($erros);