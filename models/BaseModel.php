<?php

class Model
{
	protected $attributes = [];
	protected static $table;
	protected static $dbc;
	protected static $id;

	protected $validAttributes = [];


	/*
	 * Constructor
	 */
	public function __construct()
	{

		self::dbConnect();
	}

	/*
	 * Connect to the DB
	 */
	protected static function dbConnect()
	{
		if (!self::$dbc)
		{
			self::$dbc = require '../database/db.connect.php';
		}
	}

	public function __set($name, $value)
	{
		if (in_array($name,array_keys($this->validAttributes))) {

			$this->attributes[$name] = $value;
		} else {
			// throw and exeption
		}
	}

	public function __get($name)
	{
		if (array_key_exists($name, $this->attributes)) {
			return $this->attributes[$name];
		}

		return null;
	}

	protected function validateAttributes()
	{

		$keys = array_keys($this->attributes);

		$valid = array_keys($this->validAttributes);

		// removing 'id' from the $valid array
		$valid = array_diff($valid,array(static::$id));

		//sorting both arrays before comparing
		sort($keys);
		sort($valid);

		if ($valid == $keys) {
			return true;
		} else {
			return false;
		} 
	}

	/*
	 * Persist the object to the database
	 */
	public function save()
	{
		if (!isset($this->attributes[static::$id])) {
			$this->insert();
		} else {	
			$this->update();
		}
	}

	protected function insert()
	{

		if($this->validateAttributes()){

			$query = "
				INSERT INTO " . static::$table . " 
				(" . $this->getKeyString() . ") 
				VALUES (" . $this->getColonString() . ");
			";

			$this->bindValues($query, $this->attributes);

			$this->attributes[static::$id] = self::$dbc->lastInsertId();	
		}
		else {
			echo "You did not submit all the values all the values!!!" . PHP_EOL;
		}
	}

	protected function update()
	{
			$query = "
				UPDATE `" . static::$table . "`
				SET " . $this->getUpdateString() . "
				WHERE" . static::$id . " = :id;
			";
			$this->bindValues($query, $this->attributes);		
	}

	protected function bindValues($query,$array)
	{
		$stmt = self::$dbc->prepare($query);

		foreach($array as $key => $value)
		{	
			$type = PDO::PARAM_STR;
			//($key === 'age') &&	$type = PDO::PARAM_INT;
			$stmt->bindValue(':' . $key, $value,$type);
		}
		
		$stmt->execute();	
	}

	protected function getString($string, $removeId = false)
	{
		$keys = array_keys($this->attributes);
		if ($removeId) 
		{
			$key = array_search(static::$id,$this->attributes);
			unset($keys[$key]);
		}
		$results = array_map(function($keys){
			return "{$string}";
		},$keys);
		return implode(', ', $results);
	}

	protected function getUpdateString ()
	{
		$keys = array_keys($this->attributes);
		// $keys = array_diff($this->attributes, array('id'));
		$key = array_search(static::$id, $this->attributes);
		unset($keys[$key]);

		$pieces = array_map(function($keys){
			return "`{$keys}` = :{$keys}";
		}, $keys);

		return implode(', ', $pieces);
	}

	protected function getColonString() 
	{
		$keys = array_keys($this->attributes);

		$colonKeys = array_map(function($keys){
			return ":" . $keys;
		},$keys);

		return implode(', ', $colonKeys);
	}

	public function getKeyString()
	{
		$keys = array_keys($this->attributes);

		$keys = array_map(function($keys){
			return "`{$keys}`";
		}, $keys);

		return implode(',',$keys);
	}

	/*
	 * Find a record based on an id
	 */
	public static function find($id)
	{
		// Get connection to the database
		self::dbConnect();

		$query = "
			SELECT * 
			FROM `" . static::$table . "`
			WHERE" . static::$id . " = :id;
		";

		return self::getValues($query,$id);
	}

	/*
	 * Find all records in a table
	 */
	public static function all()
	{
		$query = "
			SELECT *
			FROM `" . static::$table . "`;
		";

		return self::getValues($query);
	}

	protected static function getValues($query,$id = false)
	{
		self::dbConnect();

		$stmt = self::$dbc->prepare($query);
		($id !== false) && $stmt->bindValue(':id', $id, PDO::PARAM_INT);
		$stmt->execute();

		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$instance = null;

		if($result)
		{
			$instance = new static;
			$instance->attributes = $result;
		}
		return $instance;
	}

	/*
	 *	Delete file based on id
	 */
	public static function delete($id)
	{
		self::dbConnect();

		$query = "
			DELETE
			FROM `" . static::$table . "`
			WHERE" . static::$id . "= :id;
		";

		$stmt = self::$dbc->prepare($query);
		$stmt->bindValue(':id',$id,PDO::PARAM_INT);
		$stmt->execute();
	}
}



