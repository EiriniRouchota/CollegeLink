<?php

require __DIR__ .'/../../boot/boot.php';
header('Access-Control-Allow-Origin: collegelink.gr');

use Hotel\Room;
use Hotel\Favorite;
use Hotel\User;
use Hotel\Review;
use Hotel\Booking;
//Initialize Room service
$room = new Room();
$favorite = new Favorite();
//Check for room_id
$roomId = $_REQUEST['room_id'];

if (empty($roomId)){
    header('Location: index.php');
    return;
}

//Load room Info
$roomInfo = $room->get($roomId);
if (empty($roomInfo))
{
    header('Location: index.php');
    return;
}


//Get current user_id
$userId = User::getCurrentUserId();

$isFavorite = $favorite->isFavorite($roomId, $userId);

$review = new Review();
$allReviews = $review->getReviewsByRoom($roomId);

$checkInDate = $_REQUEST['check_in_date'];
$checkOutDate = $_REQUEST['check_out_date'];


$alreadyBooked = empty($checkInDate) || empty($checkOutDate);
if (!$alreadyBooked){
       //Look for bookings 
       $booking = new Booking();
       $alreadyBooked = $booking->isBooked($roomId,$checkInDate, $checkOutDate);
    //    var_dump($alreadyBooked);die;
}
?>


<!DOCTYPE html>
<html>

<head>

  <meta name="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex,nofollow">
  <title>Hello World</title>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <link href="css/style.css" type="text/css" rel="stylesheet">
  <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
   
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  <style>
      
  </style>
  <script src="pages/room.js"></script>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>

</script>

    </head>
    <style>
                p2 { text-indent: 50px; }
            </style>
    <body>
  <header>
    <div class="container flex">
      <p class="main-logo">Hotels</p>
      <div class="primary-menu text-right">
      
              <li>
                <a href="index.php" target="_self"> 
                   
                   <i class="fas fa-home"></i> 
                  Home
                </a>
              </li>
              
              <li>
              <a href="profile.php" target="_self"> 
              <i class="fas fa-user"></i> 
              Profile
            </a>    
            <a href="../actions/logout.php" target="_self"> 
            <i class="fas fa-sign-out-alt"></i>
              Logout
            </a>    
         

        </ul>

      </div>
    </div>
  </header>



<main>
<header class="page-title">
        <h1 class="inline"><?php echo sprintf('%s-%s, %s', $roomInfo['name'], $roomInfo['city'], $roomInfo['area']) ?> | </h1>
        <h1 class="inline">Reviews:</h1>
        <?php
            $roomAvgReview =$roomInfo['avg_reviews'];
            for ($i =1; $i <=5; $i++){
                if ($roomAvgReview >= $i){
                    ?>
                    <span class="fa fa-star checked"></span>
                    <?php
                } else{
                    ?> <span class="fa fa-star"></span>
                    <?php

                }
            }
            ?>
        <h1 class="inline"> | </h1>
        <div class="fas fa heart">    
        <form name="favoriteForm" method ="post" id="favoriteForm" class="favoriteForm" action="../actions/favorite.php">
            <input type="hidden" name="room_id" value="<?php echo $roomId; ?>">
            <input type="hidden" name="is_favorite" value="<?php echo $isFavorite ? '1' : '0'?>">
            <button type="submit" class=" fabutton size">
                
            <i class="fas fa-heart  <?php echo $isFavorite ? 'loved' : '' ; ?>"></i>
            </button2>
            
        </form>
        </div>
        
        
        <h1 class="inline float"> Per night: <?php echo sprintf('%s', $roomInfo['price']) ?> € </h1>
        
       


</header>
        <div class="roomInfo">
            <?php $roomInfo['photo_url']; ?>
            <img class="roomInfo" src="images/<?php echo $roomInfo['photo_url']; ?>"  alt="Welcome to our site" width="80%" height="auto">
        </div>

        <div class = "properties">
            <h3 class="fas fa-user inline center"> <?php echo $roomInfo['count_of_guests'] ?></h3>
           <h3 class=" inline icons"> Count of Guests </h3>
           <h3 class="fas fa-bed inline"> <?php 
             if ($roomInfo['type_id']==1)
             {
                echo "Single";
             }
             elseif ($roomInfo['type_id']==2)
             {
                echo "Double";
             }
             elseif ($roomInfo['type_id']==3)
             {
                echo "Tripple";
             }
             else if($roomInfo['type_id']==4)
             {
                echo "Fourfold";
             }
            
            ?></h3>
            
           <h3 class=" inline icons"> Type of Room</h3>
           <h3 class="fas fa-parking inline center"> 
                <?php 

            echo   ($roomInfo['parking']==1) ?  "YES" :  "NO";
            ?></h3>
           <h3 class=" inline icons"> Parking </h3>
           <h3 class="fas fa-wifi inline center"> <?php
            echo ($roomInfo['wifi']==1) ? "YES": "NO" ?></h3>
           <h3 class=" inline icons"> Wifi </h3>
           <h3 class="fas fa-paw inline center"> <?php 
           echo ($roomInfo['pet_friendly']==1) ? "YES" : "NO" ?></h3>
           <h3 class=" inline icons"> Pet Friendly </h3>

        </div>
        <div class="long">
            <p>Room description</p>
             <?php echo $roomInfo['description_long']?>
        </div>
        <div class="booking">
            <?php 
                if ($alreadyBooked) {
                    ?>
                <button class="submit-review">Already Booked</button>
            <?php
                } else {
            ?>  
            <form name="bookingForm" method="post" id="bookingForm" class="bookingForm" action="../actions/book.php">
                <input type="hidden" name="room_id" value="<?php echo $roomId ?>">
                <input type="hidden" name="check_in_date" value="<?php echo $checkInDate; ?>">
                <input type="hidden" name="check_out_date" value="<?php echo $checkOutDate; ?>">
                <button class="submit-review" type="submit">Book Now</button>
            </form>
            <?php
                }
                ?>
            </div>
        <div class="long">
            <p>Reviews</p>
            <div id="room-reviews-container">
            <?php
                foreach($allReviews as $key=> $review){
                    ?>
            <div class="room-reviews">    
            <h2 class="inline"> <?php echo $key+1; ?>. <?php echo $review['user_name']; ?> </h2>
            <?php
           
            for ($i =1; $i <=5; $i++){
                if ($review['rate'] >= $i){
                    ?>
                    <span class="fa fa-star checked"></span>
                    <?php
                } else{
                    ?> <span class="fa fa-star"></span>
                    <?php

                }
            }
            ?>
            <h5>Add time: <?php echo $review['created_time']; ?></h5>
            <h1><?php echo htmlentities($review['comment']); ?></h1>
        </div>
        <?php
                }
       ?> 
       </div>
       </div> 
      
  /
  
<div id="mapid"> 
<script>
             var mymap = L.map('mapid').setView([<?php echo $roomInfo['location_lat'] ?> , <?php echo $roomInfo['location_long'] ?>], 15);
              
             L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoicm91Y2hvdGEiLCJhIjoiY2t2NWo2bzV4MG03dDJyb2tqOW84N3VxZSJ9.tsuEQDiZAd_nZb9a3DPCgg', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1Ijoicm91Y2hvdGEiLCJhIjoiY2t2NWo2bzV4MG03dDJyb2tqOW84N3VxZSJ9.tsuEQDiZAd_nZb9a3DPCgg'
}).addTo(mymap);
var marker = L.marker([<?php echo $roomInfo['location_lat'] ?> , <?php echo $roomInfo['location_long'] ?>]).addTo(mymap);
marker.bindPopup("<b><?php echo $roomInfo['name']?></b>").openPopup();
</script>
</div>

<div class="long">
        <form name="reviewForm" class="reviewForm" method="post" action="../actions/review.php" >
        
            <input type="hidden" name="room_id" value="<?php echo $roomId?>">
            <!-- <input type="hidden" name="csrv" value="</?php echo User::getCsrf();?>"> -->
            <p>Add Review</p>
            <fieldset class="rating">
                 <input type="radio" id="star5" name="rate" value="5" /><label for="star5" title="Rocks!">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" /><label for="star3" title="Meh">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" /><label for="star1" title="Sucks big time">1 star</label>
            </fieldset> 
            
            
          <!-- <div class="form-group comments">
           <textarea name="comment" id="comment" placeholder="Review"></textarea>
            </div>  -->
            <input name="comment" id="comment" value="" placeholder="Leave a review" >
            
            <div class="action text-center">  
                <button  class="submit-review1" type="submit">Submit</button>
            </div>
        </form>     
</div>


</main>
<br> </br>    
<div class="clear"></div>
     <footer>
    <p> (c) Copyright CollegeLink 2021
</footer>
</div>
<link rel="stylesheet" href="css/fontawesome.min.css" />
  <link href="css/style.css" type="text/css" rel="stylesheet" />
    <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>

</body>
</html>

