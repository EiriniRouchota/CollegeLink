<?php

require __DIR__ .'/../../boot/boot.php';

use Hotel\Room;
use Hotel\RoomType;

// use DateTime;
//Get page parameters
// print_r($_REQUEST); die;
$room = new Room();
$type = new RoomType();
$allTypes = $type->getAllTypes();
//Get cities

$cities = $room->getCities();
$count_of_guests = $room->getCountofGuests();
$city = $_REQUEST['city'];
$typeID =$_REQUEST['room_type'];
$checkInDate =$_REQUEST['check_in_date'];
$checkOutDate =$_REQUEST['check_out_date'];
$datamax = $_REQUEST['data-max'];

$allAvailabeRooms = $room -> search(new Datetime($checkInDate), new DateTime($checkOutDate) ,$city, $typeID,$datamax);
// print_r($allAvailabeRooms);
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css"> -->
  <script src="pages/search.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  <script>
function validateDate(){

var startDt = new Date(document.getElementById("start").value).getTime();
var endDt   = new Date(document.getElementById("end").value).getTime();

  
if(startDt > endDt){
  alert ('Checkout date must be greater than Checkin date.');
  return false;
  
  
}
}

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
             
         

        </ul>

      </div>
    </div>
  </header>

  
  <main class="main-content view_hotel page-home">
    <aside class="hotel-search inline box">
      <form action="list.php" name="searchform" class="searchform"   onchange="return validateDate()" >
          <h4>FIND THE PERFECT HOTEL</h4>
          



   <select  name="room_type" class="selectpicker btn" data-style="btn-info">
    
    <option value="" >RoomType</option>
    <?php
      foreach ($allTypes as $roomType){
        ?>
        <option value="<?php echo $roomType['type_id']; ?>"> <?php echo $roomType['title']?> </option>"
      
      <?php
      }
      ?>
  </select>
  </br>
  
  <select name="city" class="selectpicker btn" data-style="btn-info" data-placeholder="City">
  <option value="" >City</option>
  <?php
      foreach ($cities as $city){
        ?>
        <option value="<?php echo $city; ?>"> <?php echo $city?> </option>"
      
      <?php
      }
      ?>
  </select>
  <br>
  <h4> Select Price Per Night </h4>
  <p style="color:rgb(224, 21, 146);  padding: 0  0 0 80px;" id="slider_value"></p>
  <input type="range" id="vol" name="data-max" min="0" max="650" onchange="show_value(this.value);">
  <script>
    function show_value(x)
{
 document.getElementById("slider_value").innerHTML=x;

}
    </script>

  <br>
  <label for="formComments"><span style="color:red;"></span>CheckInDate</label>
  <input type="date" id="start" name="check_in_date"
        value="<?php echo $checkInDate ?>"
        min="2020-01-01" max="12-12-2021">

  </br>
  
  <br>
  <label for="formComments"><span style="color:red;"></span>CheckOutDate</label>
  <input type="date" id="end" name="check_out_date"
        value="<?php echo $checkOutDate ?>"
        min="2020-01-01" max="12-12-2021">
  </select>
  <div class="action text-center">     
        <button class="button" type="submit">Search</button>
  </div>  
  
  <br>


  <br>
        </div>
      </form>
    </aside>
   
    <section class="hotel-list box"  id="search-results-container">
   
      <header class="page-title">
        <h2>Search Results</h2>
        <?php 
            foreach($allAvailabeRooms as $allAvailabeRoom)
            {
                ?>
      </header>
      <article class="hotel">
          
        <aside class="media">
        
        <?php $allAvailabeRoom['photo_url']; ?>
          <img class="img" src="images/<?php echo $allAvailabeRoom['photo_url']; ?>"  alt="Welcome to our site" width="100%" height="auto">
        </aside>
        
        <main class="info">
          <h1><?php echo $allAvailabeRoom['name'];?> </h1>
          <h2><?php echo $allAvailabeRoom['city']?></h2>
          <?php echo $allAvailabeRoom['description_short']?>
      
   

          <div class="text-right">
          <a href='room.php?room_id=<?php echo ($allAvailabeRoom['room_id'])?>&check_in_date=<?php echo ($checkInDate)?>&check_out_date=<?php echo ($checkOutDate)?>'  class="room-button">Go to Room</a>
          </div>
          
          <div class="clear"></div> 
          </article>
      
        <aside class="inline"> 
            <h5 class="dotted">PER NIGHT:<?php echo $allAvailabeRoom['price']?></h5>
            <h5 class="dotted">Count of Guests:<?php echo $allAvailabeRoom['count_of_guests']?></h5>
            <h5 class= "dotted">Type of Room:
            <?php 
             if ($allAvailabeRoom['type_id']==1)
             {
                echo "Single";
             }
             elseif ($allAvailabeRoom['type_id']==2)
             {
                echo "Double";
             }
             elseif ($allAvailabeRoom['type_id']==3)
             {
                echo "Tripple";
             }
             else if($allAvailabeRoom['type_id']==4)
             {
                echo "Fourfold";
             }
            
            ?></h5>
             
          </aside>
            
          <?php
            }
            ?>   

    </section>
          
    </main>
    <br></br>

<div class="clear"></div>
    <footer>
        <p>(c) Copyright CollegeLink 2021<p>
    </footer>
 </div>
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- <link href="css/styles.css" type="text/css" rel="stylesheet" /> -->
    <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
  </body>

</html>
    