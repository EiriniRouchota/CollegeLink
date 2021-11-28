<?php

require_once __DIR__ .'/../../boot/boot.php';

use Hotel\User;

//Return to home page is not a post request
if (strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
    header('Location: /');
    // header('Location: ./localhost/public/assets/register1.php');
    return ;
}

//Create new User 
$user = new User();
if($user -> verify($_REQUEST['email'], $_REQUEST['password']))
{
    //Retrieve user 
    $userInfo = $user->getByEmail($_REQUEST['email']);

    //Generate token
    $token = $user->generateToken($userInfo['user_id'],$_REQUEST[$csrf]);

    //Set cookie 
    setcookie('user_token', $token, time() + (30*24*60*60), '/');

    //Return to home page 
    header('Location: ../assets/index.php');
}
else{
    header('Location: ../assets/login.php');
}
?>
