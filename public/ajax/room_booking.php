<?php



use Hotel\Room;
use Hotel\Favorite;
use Hotel\User;
use Hotel\Review;
use Hotel\Booking;


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



$booking = new Booking();
$checkInDate = $_REQUEST['check_in_date'];
$checkOutDate = $_REQUEST['check_out_date'];
$booking->insert($roomId, User::getCurrentUserId(), $checkInDate, $checkOutDate);
print_r("Hello i am here");
?>
