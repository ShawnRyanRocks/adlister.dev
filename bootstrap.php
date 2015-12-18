<?php


require_once 'database/config.php';
require 'database/db.connect.php';
require_once 'models/BaseModel.php';
require_once 'models/Post.php';
require_once 'models/User.php';
require_once 'utils/Logger.php';
require_once 'utils/Input.php';
require_once 'utils/Auth.php';

session_start();
?>