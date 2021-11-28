<?php

use Hotel\Favorite;
use Hotel\User;

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

//Set room to favorites
$favorite = new Favorite();
//Add or remove room from favorites 
$isFavorite = $_REQUEST['is_favorite'];
print_r($roomId);
print_r(User::getCurrentUserId());
if (!$isFavorite){
    // var_dump("add to favorite");
    $favorite->addFavorite($roomId, User::getCurrentUserId());

} else {
    $favorite->removeFavorite($roomId,User::getCurrentUserId());
}



//Return to home page
header(sprintf('Location: ../actions/room.php?room_id=%s', $roomId));