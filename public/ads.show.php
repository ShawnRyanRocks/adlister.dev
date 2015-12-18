<?php include '../views/partials/header.php'; ?>

<?php include '../views/partials/navbar.php'; ?>

<div class='row'>
	<h3>For Sale</h3>
</div>

 	<div class="hidden-xs col-sm-2  col-md-2 col-lg-2">
        <?php include '../views/partials/nearby.cities.php'; ?>
    </div>
<div class="col-xs-12 col-sm-10 col-md-8 col-lg-8">
	<div class="row">
		<!-- <div class='col-xs-12 col-sm-6'> -->
			<div id='details'>
				<div id='image' class = 'center'><img class = 'img-center' src='/img/mousetrap.jpg'/></div>
		<div id='category'>
				<div id='title'>
					<h3> Toy - For Sale by Owner Pickup @ Orphanage</h3></div>
				<div id='price'><h5>$20</h5></div>
				<div id='zipcode'><h5>78242</h5></div>
				<div id='posting.title'><h5>Like New Boardgame Mousetrap</h5>
					<h5>Description</h5>
					<p>Board Game hardly used, only one trap functional, so its almost never been touched. Twenty Dollars!</p>
				</div>
			</div>
		</div>
	<!-- </div> -->
</div>
</div>

	<div class="hidden-xs hidden-sm col-md-2 col-lg-2">
        <?php include '../views/partials/desktop.ads.php'; ?>
    </div>
    
    <div class="col-xs-12 col-sm-12 hidden-md hidden-lg">
                    <?php include '../views/partials/mobile.ads.php'; ?>
    </div>
            


<?php include '../views/partials/footer.php'; ?>