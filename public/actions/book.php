<?php

use Hotel\User;
use Hotel\Booking;

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

//Create booking
$booking = new Booking();
$checkInDate = $_REQUEST['check_in_date'];
$checkOutDate = $_REQUEST['check_out_date'];
$booking->insert($roomId, User::getCurrentUserId(), $checkInDate, $checkOutDate);

//Return to room page
header(sprintf('Location: ../assets/room.php?room_id=%s', $roomId));