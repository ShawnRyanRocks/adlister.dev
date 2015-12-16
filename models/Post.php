<?php
require_once 'BaseModel.php';

require_once '../database/config.php';

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
}