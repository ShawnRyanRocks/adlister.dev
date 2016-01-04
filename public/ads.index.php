<?php 
include_once '../bootstrap.php'; 

  $stmt1 = $dbc->query('SELECT * FROM posts');
  $posts = $stmt1->fetchAll(PDO::FETCH_ASSOC);
 


$category = Input::get('category');


// $query = "SELECT * FROM `posts` WHERE category = :category";
// $stmt = $dbc->prepare($query);
  
// $stmt->bindValue(":category", $category, PDO::PARAM_STR);

// $stmt->execute();

// determine page number from $_GET
$page = 1;
if(!empty($_GET['page'])) {
    $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
    if(false === $page) {
        $page = 1;
    }
}


// set the number of items to display per page
$items_per_page = 4;

// build query
$offset = ($page - 1) * $items_per_page;
$sql = "SELECT * FROM posts LIMIT " . $offset . "," . $items_per_page;


$stmt = $dbc->prepare($sql);
  
$stmt->bindValue(":category", $category, PDO::PARAM_STR);

$stmt->execute();


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
				<div class="imgAdIndex">
  					<a  href="http://adlister.dev/ads.show.php">
    				<img src="/img/mousetrap.jpg" alt="" width="250" height="250">
  					<div class="descAdIndex"><?= $post['title']?>(<?= $post['zip']?>)</div>
					</a>
				</div>


			<?php endforeach;?>

	

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