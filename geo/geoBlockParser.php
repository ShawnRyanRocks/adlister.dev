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
$file = new SplFileObject("GeoLiteCity-Blocks.csv");
while ( ! $file->eof()) 
{
	$i++;
	$line = $file->fgets();
	if ($i >= 3)
	{	
		if ($i % 5000 === 0) {echo $i . $line . PHP_EOL;}
	  
		$line = str_replace(array('"'), '' , $line);
		$data = explode(',' , $line);
		$queryData = [
			'startIpNum' => $data[0],
			'endIpNum' => $data[1],
			'locId' => $data[2]
		];
			
		$query = "
			INSERT INTO `blocks`
			(startIpNum,endIpNum,locId)
			VALUES (:startIpNum,:endIpNum,:locId);
		";

		try{

		require 'db.connect.php';

		$stmt = $dbc->prepare($query);

		$stmt->bindValue(':startIpNum', $queryData['startIpNum'],PDO::PARAM_INT);
		$stmt->bindValue(':endIpNum', $queryData['endIpNum'],PDO::PARAM_INT);
		$stmt->bindValue(':locId', $queryData['locId'],PDO::PARAM_INT);

		$stmt->execute();
		}catch (Exception $e){
			$errors[] = $line;	
		}
	}
}

if(isset($errors))
{
	print_r($erros);
}
  