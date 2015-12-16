<?php
require_once 'BaseModel.php';

require_once '../database/config.php';

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
}