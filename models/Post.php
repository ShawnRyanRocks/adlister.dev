<?php

class Post extends Model
{
	protected static $table = 'posts';
	protected static $id = 'post_id';

	protected $validAttributes = [
		'business_type' => 'required',
		'user_id' => 'required',
		'title' => 'required',
		'price' => 'required',
		'zip' => 'required',
		'category' => 'required',
		'description' => 'required'
	];

	public static function findById($postId)
	{
		self::dbConnect();

		$query = "
			SELECT p.post_id,p.business_type,p.user_id,p.user_id,p.title,p.price,p.category,p.date_posted,p.description,
				   l.country,l.region AS state,l.city,l.postalCode AS zip,l.latitude,l.longitude,l.dmaCode,l.areaCode
			FROM `posts` AS p
			JOIN `location` AS l
			ON l.locId = p.locId
			WHERE p.post_id = :post_id;
		";

		$stmt = self::$dbc->prepare($query);

		$stmt->bindValue(':post_id',$postId,PDO::PARAM_INT);

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