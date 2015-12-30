<?php 
require '../bootstrap.php';

$post = Post::findById(Input::get('post'));

?>
<?php include '../views/partials/header.php'; ?>

	<div class="row">

	    <div class="hidden-xs col-sm-2  col-md-2 col-lg-2">
	        <?php include '../views/partials/nearby.cities.php'; ?>
	    </div>


	    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-8">

	    	<div class="row">
			    <div class="col-lg-12">
			        <?php include '../views/partials/navbar.php'; ?>
			    </div>
	    	</div>

			<div class="row">
				<div id='title' class="centerText"><h3 class="largeText"><?=$post->title?></h3></div>
			</div>

			<div class="row">

				<div class="col-xs-12 col-sm-6">
					<img src="/img/uploads/<?=$post->img;?>">
				</div>

				<div class="col-xs-12 col-sm-6">
					<div id='price'><h4>Price:  <?= $post->price?></h4></div>
					<div id='zipcode'><h4>Zip:  <?= $post->zip?></h4></div>
					<div id='posting.title'><h4>Description:  <?=$post->description?></h4></div>
				</div>

<!-- 			<div class='col-xs-12 col-sm-6'>

				<div id='details'>
					<div id='image'><img src='/img/'/></div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div id='category'>

						<div id='title'><h3> Toy - For Sale by Owner Pickup @ Orphanage</h3></div>
						<div id='price'><h5>$20</h5></div>
						<div id='zipcode'><h5>78242</h5></div>

						<div id='posting.title'><h5>Like New Boardgame Mousetrap</h5>
							<h5>Description</h5>
							<p>Board Game hardly used, only one trap functional, so its almost never been touched. Twenty Dollars!</p>
						</div>
					</div>
				</div> -->

			</div>

		</div>

	    <div class="hidden-xs hidden-sm col-md-2 col-lg-2">
	        <?php include '../views/partials/desktop.ads.php'; ?>
	    </div>
    </div>

</div>

<?php include '../views/partials/footer.php'; ?>













