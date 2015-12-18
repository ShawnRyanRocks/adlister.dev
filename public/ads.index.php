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
	'title' => 'old notebook',
	'price' => 23.05,
	'zip' => '78250',
	'category' => 'truck',
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


<div class>

    <div class="hidden-xs col-sm-2  col-md-2 col-lg-2">
       <?php include '../views/partials/nearby.cities.php'; ?>
    </div>

    <div  class="col-xs-12 col-sm-10 col-md-8 col-lg-8">

       <div class="main_body">

         

      <ul>
	     	
	<table class ="boldtable">

		

			<?php foreach($posts as $post): ?>
				<span class="stretch"><tr data-href="http://adlister.dev/ads.show.php">
				<td><?= $post['title']?></td>
				<td><?= $post['zip']?></td>
			</tr></span>

			<?php endforeach;?>

	</table>

      </div>
    </div>

         
    

                      
           

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