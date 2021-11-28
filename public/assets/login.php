<?php

require  __DIR__ . '/../../boot/boot.php';

use Hotel\User;

//Check for logged in user
// var_dump(User::getCurrentUserId());
// var_dump(User::getCurrentUserId());
if (!empty(User::getCurrentUserId()))
{
    // echo '<script>alert("Welcome to Geeks for Geeks")</script>';
    // header('Location: ../assets/index.php'); die;
    header('Location: ../assets/index.php'); die;
}

?>

<!DOCTYPE html>
<html>

<head>
<script>

</script>
  <meta name="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex,nofollow">
  <title>Hello World</title>
  <link href="css/style.css" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </script>
</head>

<body>
  <header>
    <div class="container flex">
      <p class="main-logo">Hotels</p>
      <div class="primary-menu text-right">
        <ul>
          <li>
          <li>
            <Home< /li>
          <li>

            <ul>
              <li>
                <!-- <a href="#" target="_blank"> -->
                <!-- <img src="images/icons/user.png"> -->
                <i class="fas fa-home"></i>
                Home
                </a>
              </li>

            </ul>
          </li>


        </ul>

      </div>
    </div>
  </header>

  <main class="main-content view_hotel page-home">

    <!-- Main section start -->

    <!-- <section class="image-container"> -->
    <!-- <img src="assets/images/hello.jpg" alt="Welcome to our site" width="300px" height="auto"> -->

    <!-- </section> -->
    <!-- <img src="assets/images/hello.jpg" alt="CollegeLinkImage" width="500" height="auto"> -->


    <!-- Hero section end -->

    <!-- Menu section start -->
    <!-- Menu section start -->



    <aside class="hotel-search box">
      <form  method="post" action="../actions/login.php" >
        <!-- <fieldset class="introduction" id="formSearch"> -->

        <div class="form-group">
          <label for="name"><span style="color: red;">*</span>Username</label>
          <input id="name" value="" placeholder="ex.Doe" name="name" type="text">
        </div>
        <!-- </fieldset> -->
        <div class="form-group email">
          <label for="email"><span style="color:red;">*</span>Email</label>
          <input id="email" value="" placeholder="ex.example@email.com" name="email" type="email">
        </div>
        
        <div class="form-group password">
          <label for="password"><span style="color:red;">*</span>Password</label>
          <input name="password" id="password" value="" type="password">
        </div>

        <div class="form-group">
          <button class="btn-landing btn-brick" type="submit">Login</button>

        </div>
        <a href="register.php"> Can't log in? Register now</a>
      </form>
    </aside>




  </main>

  <div class="clear"></div>
  <footer>
    <p> (c) Copyright CollegeLink 2021
  </footer>
  <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
  <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,100&display=swap" rel="stylesheet"> -->
  <link rel="stylesheet" href="css/fontawesome.min.css" />
 

</body>

</html>