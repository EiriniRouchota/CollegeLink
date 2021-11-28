<?php


use Hotel\User;
use Hotel\Favorite;
use Hotel\Review;
use Hotel\Room;


require __DIR__ .'/../../boot/boot.php';

//Return to home page if not a post request
if (strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
    echo "This is a post script.";
    die;
}

if (empty(User::getCurrentUserId())){
    echo "No current user for this operation";
    die;
}
//Check if room_id is given
$roomId = $_REQUEST['room_id'];
if (empty($roomId)) {
    echo "No room is given for the current operation";
    die;
}

//Add review 
$review=new Review();

$review->insert($roomId, User::getCurrentUserId(), $_REQUEST['rate'], $_REQUEST['comment']);

//Get all reviews 
$roomReviews = $review->getReviewsByRoom($roomId);
$counter = count($roomReviews);
// print_r("room reviews:");
// print_r($roomReviews);
// print_r("counter:");
// print_r($counter);

//Load user
$user = new User();
$userInfo = $user->getbyUserId(User::getCurrentUserId());

// var_dump($userInfo);

//Return to room page
?>

<div class="room-reviews">
<h2 class="inline"> <?php echo $counter; ?>. <?php echo $userInfo['name']; ?>  </h2>
            <?php
           
            for ($i =1; $i <=5; $i++){
                if ($_REQUEST['rate'] >= $i){
                    ?>
                    <span class="fa fa-star checked"></span>
                    <?php
                } else{
                    ?> <span class="fa fa-star"></span>
                    <?php

                }
            }
            ?>
            <h5>Add time: <?php echo (new DateTime())->format('Y-m-d H:i:s'); ?></h5>
            <h1><?php echo $_REQUEST['comment']; ?></h1>
</div>
        </div>