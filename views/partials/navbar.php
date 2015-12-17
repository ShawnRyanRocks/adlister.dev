<?php
require_once '../bootstrap.php';
// require_once '../Auth.php';
// require '../../functions.php';
// $hashpash = password_hash('password', PASSWORD_DEFAULT);


$users = [
	[
	'username' => 'sprov03',
	'password' => 'we need to hash',
	'email'    => 'sprov03@gmail.com',
	'age'      => 80
	],
	[
	'username' => 'ryaski',
	'password' => 'we also need to hash',
	'email'    => 'ryanski@yahoo.com',
	'age'      => 70
	],
	[
	'username' => 'woot nayey',
	'password' => 'needs to be hashed',
	'email'    => 'lastFakeEmail@poopyface.org',
	'age'      => 23
	],
	[
	'username' => 'funycat',
	'password' => 'mean dog unhashed',
	'email'    => 'anotherfakeemail@google.com',
	'age'      => 44
	]
];
if(isset($_REQUEST['logged']) && $_GET['logged']==='true'){
	$_SESSION['LOGGED_IN'] = true;
} 
	


if(isset($_SESSION['LOGGED_IN']) && $_SESSION['LOGGED_IN'] === true){
	
	$message=$users[1]['username'];
	$logout='Log out';
} else {
	$logout='';
	$message='Login';
}

  
?>

<div class='row'>
	<div class="col-md-4">
		<div class="search">

			<ul class="search_bar">
				<li><label for "search">Search</label></li>
				<li><input type="text" id="search" name='search'></li>
			</ul>
				
		</div>
	</div>

	<div class="col-md-4">
		<div>
			

		</div>
	</div>

	<div class="col-md-4">
		<div class='row'>
			<div >
				<a href='../../users.login.php'><?= $message ?></a> 
			</div>
		</div>
		<div class="row">
			<div >
				<a href='../../auth.logout.php'><?= $logout ?></a> 
			</div>
		</div>
		<div class='row'>
			<a href='../../users.create.php'>Create User</a>
		</div>
		<div class='row'>
			<a href='../../ads.create.php'>Post Ad</a>
		</div>
	</div>
</div>

<div class='row'>
	<h3 class="navbar_title">For Sale</h3>
</div>
