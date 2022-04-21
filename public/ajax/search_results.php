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

<section class="hotel-list box">
   
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
