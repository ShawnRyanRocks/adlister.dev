<?php
require_once '../bootstrap.php';



// I started writing what's below, but not sure how to do it.
// -------------
//  http_get(ads.index.php?search="SELECT * FROM 'posts' WHERE 'title' LIKE '%" . $_POST['search']."%' OR 'description' LIKE '%".$_POST['search']."%'"); 


if(isset($_REQUEST['logged']) && $_GET['logged']==='true'){
	$_SESSION['LOGGED_IN'] = true;
} 
	


if( Auth::check() ){
	
	$message=$_SESSION['LOGGED_IN_USER']->username;
	$logout='Log out';
	$login='';
	$createUser='';
} else {
	$message='';
	$logout='';
	$login='Login';
	$createUser='Create User';

}


  
?>

<div class='row'>
	<div class="col-md-4">
		<div class="search">

			<ul class="search_bar">
				<li><a href='../../index.php'>Home</a></li>
				<li><label for "search">Search</label></li>
			<form method="GET" action="../../ads.index.php">
				<li><input type="text" id="search" name='search' class="btn btn-default"></li>
				<button hidden></button>
			</form>
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
				<a href='../../users.login.php'><?= $login ?></a> 
			</div>
		</div>
		<div class='row'>
			<div >
				<a href='../../users.show.php'><?= $message ?></a> 
			</div>
		</div>
		<div class="row">
			<div >
				<a href='../../auth.logout.php'><?= $logout ?></a> 
			</div>
		</div>
		<div class='row'>
			<a href='../../users.create.php'><?= $createUser ?></a>
		</div>
		<div class='row'>
			<a href='../../ads.create.php'>Post Ad</a>
		</div>
	</div>
</div>

<div class='row'>
	<!-- <h3 class="navbar_title">For Sale</h3> -->
</div>
