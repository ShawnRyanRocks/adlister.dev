<?php 
include_once '../bootstrap.php'; 

// include_once '../database/config.php';

// include_once '../database/db.connect.php';
 $stmt = $dbc->query('SELECT * FROM posts');
 $posts=$stmt->fetchAll(PDO::FETCH_ASSOC);
  
$posts = [
	[
	'business_type' => 'For sale by owner',
	'user_id' => 2,
	'title' => 'old notebook five star BRAND NEW has to go IN NEED, NEED CASH!!!!!',
	'price' => 23.05,
	'zip' => '78250',
	'category' => 'truck',
	'picture' =>  "/img/mousetrap.jpg",
	'description' => ' i love this truck'
	],
	[
	'business_type' => 'For sale by dealer',
	'user_id' =>1,
	'title' => 'soggy leather',
	'price' => 33.44,
	'zip' => '78450',
	'category' => 'truck',
	'description' => ' i love this truck'
	],
	[
	'business_type' => 'Buying',
	'user_id' => 3,
	'title' => 'flat tire',
	'price' => 44.44,
	'zip' => '78850',
	'category' => 'truck',
	'description' => ' i love this truck'
	],
	[
	'business_type' => 'For sale by owner',
	'user_id' => 2,
	'title' => 'vhs player',
	'price' => 44.44,
	'zip' => '78260',
	'category' => 'truck',
	'description' => ' i love this truck'
	],
	[
	'business_type' => 'Buying',
	'user_id' => 1,
	'title' => 'hot ice!!',
	'price' => 23.88,
	'zip' => '78253',
	'category' => 'truck',
	'description' => ' i love this truck'
	],
];



?>
<?php include '../views/partials/header.php'; ?>

<?php include '../views/partials/navbar.php'; ?>

<link href='https://fonts.googleapis.com/css?family=Just+Another+Hand' rel='stylesheet' type='text/css'>
<div class>

    <div class="hidden-xs col-sm-2  col-md-2 col-lg-2">
       <?php include '../views/partials/nearby.cities.php'; ?>
    </div>

    <div  class="col-xs-12 col-sm-10 col-md-8 col-lg-8">

       <div class="main_body">

   

		

			<?php foreach($posts as $post): ?>
				<div class="img">
  					<a  href="http://adlister.dev/ads.show.php">
    				<img src=<?= $post['picture']?> alt="Trolltunga Norway" width="250" height="250">
  					<div class="desc"><?= $post['title']?>(<?= $post['zip']?>)</div>
					</a>
				</div>


			<?php endforeach;?>

	

      </div>
    </div>

          
      <ul>
	<!--      	
	<table class ="boldtable">     
    <tr data-href="http://adlister.dev/ads.show.php">
					<td><?= $post['picture']?></td> 
					<td><?= $post['title']?></td>
					<td><?= $post['zip']?></td>
				</tr>
</table> -->
                      
           

             <div class="hidden-xs hidden-sm col-md-2 col-lg-2">
        		<?php include '../views/partials/desktop.ads.php'; ?>
		    </div>           


           
            <div class="row">
                <div class="col-xs-12 col-sm-12 hidden-md hidden-lg">
                    <?php include '../views/partials/mobile.ads.php'; ?>
                </div>
            </div>
        


    </div>
	</div>
 </div>
</div>
<div id='footer'>
<?php include '../views/partials/footer.php'; ?>
</div>