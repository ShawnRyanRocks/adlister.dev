<?php

class DateRangeException extends Exception {}

class Input
{
	/**
	 * Check if a given value was passed in the request
	 *
	 * @param string $key index to look for in request
	 * @return boolean whether value exists in $_POST or $_GET
	 */
	public static function has($key)
	{  
		return isset($_REQUEST[$key]);
	}

	/**
	 * Get a requested value from either $_POST or $_GET
	 *
	 * @param string $key index to look for in index
	 * @param mixed $default default value to return if key not found
	 * @return mixed value passed in request
	 */
	public static function get($key, $default = null)
	{
		return (self::has($key)) ? $_REQUEST[$key] : $default;
	}

	/**
	 * Get a string value if it is a string
	 *
	 * @param string $key index to look for in index
	 * @param mixed $default default value t return if key not found
	 * @return mixed value passed in request
	 */
	public static function getString($key, $min = 0, $max = 50, $default = null)
	{
		if(!is_string($key)){
			throw new InvalidArgumentExeption("{$key} is not a string.");

		} else if (!is_int($min)){
			throw new InvalidArgumentExeption("{$min} is not an int.");

		} else if (!is_int($max)){
			throw new InvalidArgumentExeption("{$max} is not an int.");

		} else if (!is_int($max)){
			throw new InvalidArgumentExeption("{$max} is not an int.");

		} else if (strlen(self::get($key)) <= $min){
			throw new LengthException("{$key} can't be shorter then {$min} characters");

		} else if (strlen(self::get($key)) >= $max){
			throw new LengthException("{$key} can't be longer then {$max} characters.");

		} else if (empty(self::get($key))){
			throw new OutOfRangeException("{$key} is missing from the input.");

		} else if (!is_string(self::get($key))){
			throw new DomainException("{$key} must be a string.");

		}else {
			return self::get($key);
		}
	}

	/**
	 * Get a string value if it is Numeric
	 *
	 * @param string $key index to look for in index
	 * @param mixed $default default value t return if key not found
	 * @return mixed value passed in request
	 */
	public static function getNumber($key, $min, $max, $default = null)
	{
		if(!is_string($key)){
			throw new InvalidArgumentExeption("{$key} is not a string.");

		} else if (!is_int($min)){
			throw new InvalidArgumentExeption("{$min} is not an int.");

		} else if (!is_int($max)){
			throw new InvalidArgumentExeption("{$max} is not an int.");

		} else if (!is_int($max)){
			throw new InvalidArgumentExeption("{$max} is not an int.");

		} else if (strlen(self::get($key)) <= $min){
			throw new LengthException("{$key} can't be shorter then {$min} characters");

		} else if (strlen(self::get($key)) >= $max){
			throw new LengthException("{$key} can't be longer then {$max} characters.");

		} else if (empty(self::get($key))){
			throw new OutOfRangeException("{$key} is missing from the input.");

		} else if (!is_numeric(self::get($key)) && self::get($key) !== ''){
			throw new DomainException("shitfa");

		}else {
			return self::get($key);
		}
	}

	/**
	 * Get a value if it is a Date
	 *
	 * @param string $key index to look for in index
	 * @param mixed $default default value t return if key not found
	 * @return mixed value passed in request
	 */
	public static function getDateTimeObject($key, $min = null, $max = null)
	{
		$date = self::get($key);
		$min = new DateTime($min);
		$max = new DateTime($max);
		try{
			$dateObj = new DateTime($date);

			if ($dateObj <= $min) {
				throw new DateRangeException('Date too far in the past.');
			}
			if ($dateObj >= $max) {
				throw new DateRangeException('Date too far in the future.');
			}
			return $dateObj;
		} catch (DateRangeException $e) {
			throw new Exception( $e->getMessage() );
		} catch (Exception $e) {
			throw new Exception('please enter a vaid date.');
		}
	}


	///////////////////////////////////////////////////////////////////////////
	//                      DO NOT EDIT ANYTHING BELOW!!                     //
	// The Input class should not ever be instantiated, so we prevent the    //
	// constructor method from being called. We will be covering private     //
	// later in the curriculum.                                              //
	///////////////////////////////////////////////////////////////////////////
	private function __construct() {}
}
