<?php 
include_once '../bootstrap.php'; 

 $stmt = $dbc->query('SELECT * FROM posts');
 $posts=$stmt->fetchAll(PDO::FETCH_ASSOC);
  




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
    				<img src="/img/mousetrap.jpg" alt="" width="250" height="250">
  					<div class="desc"><?= $post['title']?>(<?= $post['zip']?>)</div>
					</a>
				</div>


			<?php endforeach;?>

	

      </div>
    </div>

          
      <ul>
	
                      
           

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