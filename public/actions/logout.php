<?php

require_once __DIR__ .'/../../boot/boot.php';

use Hotel\User;

if(isset($_COOKIE['user_token'])):
    setcookie('user_token', '', time()-7000000, '/');
endif;


header('Location: ../assets/login.php');

?>