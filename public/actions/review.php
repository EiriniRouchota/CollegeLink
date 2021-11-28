<?php


use Hotel\User;
use Hotel\Favorite;
use Hotel\Review;

require_once __DIR__ .'/../../boot/boot.php';

//Return to home page if not a post request
if (strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
    header('Location: /');
    // header('Location: ./localhost/public/assets/register1.php');
    return ;
}

if (empty(User::getCurrentUserId())){
    header('Location: /');

    return;
}
//Check if room_id is given
$roomId = $_REQUEST['room_id'];
if (empty($roomId)) {
    header('Location: /');

    return;
}


//Verify csrf
$csrf = $_REQUEST['csrf'];
if ($csrf || !User::verifyCsrf($csrf)){
    header('Location: /');

    return;
}

//Add review 
$review=new Review();
print_r($_REQUEST['comment']);
print_r($$_REQUEST['rating']);
$review->insert($roomId, User::getCurrentUserId(), $_REQUEST['rate'], $_REQUEST['comment']);

//Return to room page
header(sprintf('Location: ../assets/room.php?room_id=%s', $roomId));