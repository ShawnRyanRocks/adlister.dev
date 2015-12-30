<?php

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
			SELECT u.user_id,u.email,u.username,u.password,u.age,u.locId,u.phone,u.call_user,u.text_user,
				   u.email_user,u.date_created,l.country,l.region AS state,l.city,l.postalCode AS zip,l.latitude,
				   l.longitude,l.dmaCode,l.areaCode
			FROM `users` AS u
			JOIN `location` AS l 
			ON l.locId= u.locId
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

