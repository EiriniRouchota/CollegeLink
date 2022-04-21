<?php

require __DIR__ .'/../../boot/boot.php';

use Hotel\Room;
use Hotel\Favorite;
use Hotel\User;
use Hotel\Review;
use Hotel\Booking;

//Check for logged in user
$userId = User::getCurrentUserId();
if (empty($userId))
{
    header('Location: index.php');
    return;
}

//Get user favorites
$favorite = new Favorite();
$userFavorites = $favorite->getListByUSer($userId);

//Get all reviews 
$review = new Review();
$userReviews = $review->getListByUser($userId);

//Get all user bookings
$booking = new Booking();
$userBookings = $booking->getListByUser($userId);




//Get page parameters


?>
<!DOCTYPE html>
<html>

    <head>
    <style>
.footer12 {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: red;
   color: white;
   text-align: center;
   height: 50px;
  background: #ccc;
  border-top: 3px solid #808080;

}
</style>

    <meta name="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex,nofollow">
  <title>Hello World</title>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <link href="css/style.css" type="text/css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  <script>


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
              <a href="#" target="_self"> 
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

  <main class="main-content view_hotel page-home">
    <aside class="hotel-search inline box">
      <div class ="userfavorites">
          <h1>FAVORITES</h1>
          <?php 
            if (count($userFavorites)>0) {
          ?>
         <ol>
          <?php 
            foreach ($userFavorites as $favorite){
                ?>
            <h3>
                <li>
                    <h3>
                        <a href="room.php?room_id=<?php echo $favorite['room_id']; ?>"><?php echo $favorite['name']; ?></a>
            </h3>
            </li>
            </h3>
            <?php
            }
            ?>
            </ol>
            <?php 
            } else {
                ?>
                <h4 class="alert-profile">You haven't any favorite hotel <!DOCTYPE html></h4>
                <?php
            }
            ?> 
            </div>
            <div class="user-review">
                <h1> REVIEWS </h1>
                <?php 
                if (count($userReviews)> 0) {
                    ?>
                <ol>
                    <?php
                        foreach($userReviews as $review){
                            ?>
                            <h2>
                                <li>
                                    <h3>
                                    <a href="room.php?room_id=<?php echo $review['room_id']; ?>"><?php echo $review['name']; ?></a>
                                    <br>
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
                                        </h3>
                                    </li>
                                    <h2>
                                        <?php 
                        }
                        ?>
                        </ol>
                        <?php 
                                } else {
                                    ?>
                                    <h4 class="alert-profile">You haven't submit any review <!DOCTYPE html></h4>
                                    <?php
                                }
                                ?> 

                                        

        </div>
      </form>
                            </aside>

      <section class="hotel-list box wid">
   
   <header class="page-title">
     <h2>My bookings</h2>
     <?php 
         foreach($userBookings as $booking)
         {
             ?>
   </header>
   <article class="hotel">
       
     <aside class="media">
     
     <?php $booking['photo_url']; ?>
       <img class="img" src="images/<?php echo $booking['photo_url']; ?>"  alt="Welcome to our site" width="100%" height="auto">
     </aside>
     
     <main class="info">
       <h1><?php echo $booking['name'];?> </h1>
       <h2><?php echo $booking['city']?></h2>
       <?php echo $booking['description_short']?>
   


       <div class="text-right">
       <a href='room.php?room_id=<?php echo ($booking['room_id'])?>'  class="room-button">Go to Room</a>
       </div>
       
       <div class="clear"></div> 
       </article>
   
     <aside class="inline"> 
         <h5 class="dotted">Total Cost:<?php echo $booking['total_price']?></h5>
         <h5 class="dotted">Check In Date: <?php echo $booking['check_in_date']?></h5>
         <h5 class="dotted">Check Out Date: <?php echo $booking['check_out_date']?></h5>

         <h5 class= "dotted">Type of Room: <?php echo $booking['room_type']?></h5>
      
          
       </aside>
         
       <?php
                                }
                                ?> 

 
 </section>

 </main>
 <br> </br>

      
  <div class="clear"></div>
    <footer>
        <p>(c) Copyright CollegeLink 2021<p>
                              </footer>
 </div>
    <link rel="stylesheet" href="css/fontawesome.min.css" />
   
</body>

</html>