<?php


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\style\style.css">
    <title> login </title>
</head>
<body>
<form action="" method="POST">
  <div class="container">

  <p>Please fill in this form to login to your account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <hr>

    <button  name="submit" type="submit" class="login">login</button>
  </div>
  
  <div class="container signin">
    <p>dont have an account yet? <a href="register.php">register</a>.</p>


</body>
</html>