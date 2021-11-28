<?php

require __DIR__ .'/../../boot/boot.php';

use Hotel\Room;
use Hotel\RoomType;
//Get cities
$room = new Room();
$cities = $room->getCities();
// print_r($cities);die;   
//Get roomtypes
$type = new RoomType();
$allTypes = $type->getAllTypes();
// print_r($allTypes); die;

?>
<!DOCTYPE html>
<html>

<head>

  <meta name="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex,nofollow">
  <title>Hello World</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="css/style.css" type="text/css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  <script>
function validateDate(){

  var startDt = new Date(document.getElementById("start").value).getTime();
  var endDt   = new Date(document.getElementById("hasta").value).getTime();

    
  if(startDt > endDt){
    alert ('Checkout date must be greater than Checkin date.');
    return false;
    
    
  }
}
  </script>
  </script>
  <link
      rel="stylesheet"
      href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css"
    />
 
 
</head>

<body>

  <header>
      
    <div class="container flex">
      <p class="main-logo">Hotels</p>
      <div class="primary-menu text-right">
        <ul>
          <li>
          <li>
            <Home<li>
          <li>

            <ul>
              <li>
                <!-- <a href="#" target="_blank"> -->
                <!-- <img src="images/icons/user.png"> -->
                <i class="fas fa-home"></i>
                Home
                <!-- </a> -->
              </li>

            </ul>
          </li>


        </ul>

      </div>
    </div>
  </header>
 
<section class="hero">
<form action=" list.php" onsubmit="return validateDate()">
<!-- <select class="form-select" aria-label="Default select example"> -->
  <select name="city" class="selectpicker btn" data-style="btn-info" data-placeholder="City">
  <option value="" >Select your option</option>
  <?php
      foreach ($cities as $city){
        ?>
        <option value="<?php echo $city; ?>"> <?php echo $city?> </option>"
      
      <?php
      }
      ?>
  </select>

  <select  name="room_type" class="selectpicker btn" data-style="btn-info">
    
    <option value="" >Select Room Type</option>
  <?php
      foreach ($allTypes as $roomType){
        ?>
        <option value="<?php echo $roomType['type_id']; ?>"> <?php echo $roomType['title']?> </option>"
      
      <?php
      }
      ?>
  </select>
  </br>
  <br>

  <label for="formComments"><span style="color:red;"></span>CheckInDate</label>
  <input type="date" id="start" name="check_in_date"
        value=<?php echo date("Y-m-d")?>
        min=<?php echo date("Y-m-d")?> max="12-12-2021">

  </br>

  <br>
  <label for="formComments"><span style="color:red;"  ></span>CheckOutDate</label>
  <input type="date" id="hasta" name="check_out_date"
        value= <?php echo date("Y-m-d")?>
        min=<?php echo date("Y-m-d")?> max="12-12-2021">
  </select>

  
  <br>


  <br>
  <div class="action text-center">
            
  <button class="button" type="submit">Search</button>

  </div>     
 
  </br>
</form>
</section>

<div class="clear"></div>
  <footer>
    <p> (c) Copyright CollegeLink 2021
  </footer>
</div>
<link rel="stylesheet" href="css/fontawesome.min.css" />



</body>

</html>

