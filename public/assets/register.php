<?php

require  __DIR__ . '/../../boot/boot.php';

use Hotel\User;

//Check for logged in user
var_dump(User::getCurrentUserId());
var_dump(User::getCurrentUserId());
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
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script>
function validateForm(e) {
  e.preventDefault();
  let x = document.forms['form']['email'].value;
 
  let y = document.forms['form']['email_repeat'].value;

  // alert("hello validate");
  if (x != y) {
    alert("Email are not the same");
    return false;
  }
  //Ajax request
  $.ajax({
           url: 'http://localhost/Collegelink/public/actions/register.php',
            
                type: "POST",
                dataType: "html",
                data: {
                  username: document.getElementById('name').value,
                  password: document.getElementById('password').value,
                  email: document.getElementById('email').value,
                 
                },
            }).done(function (result) {
              var dataResult = JSON.parse(result);
              console.log(dataResult);
		        	if(dataResult.statusCode==200){
                // // console.log(result);
                // $('#room-reviews-container').append(result);
                alert("User created");
                window.location.href = 'index.php';}
              else{
                alert("Duplicate user");
              }
              
                return false;
                // console.log(result);
                //Reset review form
                // $('form.reviewForm').trigger('reset');
            });

    
}
</script>

  <meta name="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex,nofollow">
  <title>Hello World</title>
  <link href="css/style.css" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- 
  </script> -->
</head>

<body>
  <header>
    <div class="container flex">
      <p class="main-logo">Hotels</p>
      <div class="primary-menu text-right">
        <ul>
          <li>
          <li>
            <Home</li>
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

      <aside class="hotel-search box">
      <form name="form" method="post"  onsubmit="return validateForm(event)">
        <!-- <fieldset class="introduction" id="formSearch"> -->

        <div class="form-group">
          <label for="name"><span style="color: red;">*</span>Username</label>
          <input id="name" value="" placeholder="ex.Doe" name="name" type="text" required>
        </div>
        <!-- </fieldset> -->
        <div class="form-group email">
          <label for="email"><span style="color:red;">*</span>Email</label>
          <input id="email" value="" placeholder="ex.example@email.com" name="email" type="email" required>
        </div>
        <div class="form-group email-repeat">
          <label for="emailRepeat"><span style="color:red;"></span>Write again your email</label>
          <input id="email_repeat" value="" placeholder="repeat" name="email_repeat" type="email" required>
        </div>
        <div class="form-group password">
          <label for="password"><span style="color:red;">*</span>Password</label>
          <input name="password" id="password" value="" type="password" required>
        </div>

        <div class="form-group">
          <button class="btn-landing btn-brick" type="submit">Register</button>

        </div>
        <a href="login.php"> Back To Login. </a>
      </form>
    </aside>




  </main>
  <br></br>

  <div class="clear"></div>
  <footer>
    <p> (c) Copyright CollegeLink 2021
</footer>
  <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
  <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,100&display=swap" rel="stylesheet"> -->
  <link rel="stylesheet" href="css/fontawesome.min.css" />
  <link href="css/styles.css" type="text/css" rel="stylesheet" />

</body>

</html>