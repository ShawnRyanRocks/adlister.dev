<?php

class Log
{
	private $filename;
	private $handle;

	public function __construct($prefix = 'all')
	{	
		$this->setFilename($prefix . '.log');
		$this->setHandle();
	}

    public function __destruct()
    {
        fclose($this->handle);
    }

    private function setHandle()
    {
    	$this->handle = fopen($this->filename, 'a');
    }

    private function setFilename($filename)
    {
    	if (is_string($filename) && is_writable($filename)) {
    		touch($filename);
    	}

    }

	public function logMessage($logLevel, $message)
	{
		$date = date("Y-m-d H:i:s");
		$string_to_append = PHP_EOL . "{$date} [{$logLevel}] {$message}";

		fwrite($this->handle, $string_to_append);
	}

	public function logInfo($info)
	{
		$this->logMessage("INFO","$info");
	}

	public function logError($info)
	{
		$this->logMessage("ERROR", $info);
	}
}




// $john->addFruit('Arctic');


// class Person
// {
//     public $firstName;
//     public $lastName;
//     public $fruit = array();

//     public function roamCountryside()
//     {
//         $distance = mt_rand(1, 10);

//         return $this->firstName . " walks {$distance} miles west.";
//     }

//     public function addFruit($fruit)
//     {
//         $this->fruit[] = $fruit;
//     }
// }