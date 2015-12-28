<?php
// require '../../bootstrap.php';
// require '../../database/db.connect.php'; 

// Get new instance of PDO object
$dbc = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// if(Auth::check())
if (isset($_SESSION['LOGGED_IN']) ? $_SESSION['LOGGED_IN'] : false)
{ 
    $query = "
        SELECT `longitude`,`latitude`
        FROM `location`
        WHERE `locId` = :locId
    ";
    $stmt = $dbc->prepare($query);
    $stmt->bindValue(":locId",$_SESSION['LOGGED_IN_USER']->locId,PDO::PARAM_INT);
    $stmt->execute();
} else {
    $query = "
        SELECT `longitude`,`latitude`
        FROM `location`
        WHERE `postalCode` = 78250
    ";
    $stmt = $dbc->prepare($query);
    $stmt->execute();
}

    $geo = $stmt->fetch(PDO::FETCH_ASSOC);

    $lon = $geo['longitude'];
    $lat = $geo['latitude'];
    

    $query = "
        SELECT `locId`, `city`, ( 3959 * acos( cos( radians(:lat) ) * cos( radians( latitude ) ) 
        * cos( radians( longitude ) - radians(:lon) ) + sin( radians(:lat) ) * sin(radians(latitude)) ) ) AS `distance` 
        FROM `location`
        HAVING `distance` < 50
        ORDER BY `distance`
        LIMIT 0,300;
    ";
    $stmt = $dbc->prepare($query);
    $stmt->bindValue(":lat", $lat, PDO::PARAM_INT);
    $stmt->bindValue(":lon", $lon, PDO::PARAM_INT);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $cities = [];
    $used = [];
    foreach($results as $city)
    {
        if(!in_array($city['city'],$used) && count($used) < 20)
        {
              $cities[] = $city;
              $used[] = $city['city'];
        }
    }
?>
<div class="col-sm-12 clearmargin" id="nearby_cities_positioning_div">
    <ul id="nearby_cities_unorder_list">
        <?php foreach($cities as $city) : ?>
            <li><a href="ads.show.php?city=<?=$city['locId'];?>"><?= $city['city']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
 