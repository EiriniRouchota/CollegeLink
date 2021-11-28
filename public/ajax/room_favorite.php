<?php

use Hotel\Favorite;
use Hotel\User;

require_once __DIR__ .'/../../boot/boot.php';

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

//Set room to favorites
$favorite = new Favorite();
//Add or remove room from favorites 
$isFavorite = $_REQUEST['is_favorite'];
// print_r($roomId);
// print_r(User::getCurrentUserId());
if (!$isFavorite){
    // var_dump("add to favorite");
    $status = $favorite->addFavorite($roomId, User::getCurrentUserId());
    // $status=false;
} else {
   $status= $favorite->removeFavorite($roomId,User::getCurrentUserId());
    // $status=false;
}


//Return operation status
header('Content-Type: application/json');

echo json_encode([
    'status' => $status,
    'is_favorite' => !$isFavorite,
]);
?>