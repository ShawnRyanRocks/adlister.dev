<?php

// include_once '../database/config.php';

class User extends Model
{
	protected static $table = 'users';
	protected static $id = 'user_id';

	protected $validAttributes = [
		'username' => 'required',
		'password' => 'required',
		'email' => 'required',
		'age' => 'required'
	];

	public static function findByUsername($email)
	{
		self::dbConnect();

		$query = "
			SELECT * FROM `users`
			WHERE email = :email;
		";

		$stmt = self::$dbc->prepare($query);

		$stmt->bindValue(':email', $email, PDO::PARAM_STR);

		$stmt->execute();

		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$instance = null;

		if($result)
		{
			$instance = new static;
			$instance->attributes = $result;
		}
		return $instance;
	}
}

