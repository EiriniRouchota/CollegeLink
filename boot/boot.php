<?php

// error_reporting(E_ALL & ~(E_NOTICE | E_WARNING | E_DEPRECATED));
 error_reporting(E_ERROR);
// Register autoload function
spl_autoload_register(function ($class) {
	$class = str_replace("\\", "/", $class);
	require_once sprintf(__DIR__.'/../app/%s.php', $class);
});

use Hotel\User;

$user = new User();

//Check if there is a token in the request
$userToken = $_COOKIE['user_token'];
// var_dump($userToken);

if ($userToken){
	//verify user
	// print_r($userToken);
	// var_dump($user->verifyToken($userToken));
	if ($user->verifyToken($userToken))
	{   
		// var_dump($user->verifyToken($userToken));
		//print_r($userToken);
		//set user in memory
		$userInfo= $user->getTokenPayload($userToken);
		// var_dump($user->verifyToken($userToken));
		// print_r($userInfo); die;
		User::setCurrentUserId($userInfo['user_id']);
		// var_dump(User::getCurrentUserId());die;
		
	}
}