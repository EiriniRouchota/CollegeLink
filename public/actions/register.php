<?php

require_once __DIR__ .'/../../boot/boot.php';

use Hotel\User;


//Return to home page is not a post request
if (strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
    header('Location: /');
    // header('Location: ./localhost/public/assets/register1.php');
    return ;
}
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
//Create new User 
$user = new User();
if($user->getbyEmail($email))
{
    echo json_encode(array("statusCode"=>201));

}
else
{

$user -> insert($username, $email, $password);

//Retrieve user 
$userInfo = $user->getByEmail($email);

//Generate token
$token = $user->generateToken($userInfo['user_id']);

//Set cookie 
setcookie('user_token', $token, time() + (30*24*60*60), '/');

//Return to home page 
//  header('Location: ../assets/index.php');
echo json_encode(array("statusCode"=>200));
}
?>
