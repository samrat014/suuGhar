<?php

session_start();
include '../config.php';

  if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

  //  echo $email;
  //  echo $password;

   $sql = "select * from user where email= '".$email."' and password = '".$password."'";

   $result = mysqli_query($conn,$sql);  

   if($email == "samratkarki01" && $password=="@kxCVsxy9EmZsMY")
   {
     header("location: ../admin-map.php");
     exit();
    }
    else if( mysqli_num_rows($result)==true){
      header("location: ../index.php");
      exit();
     }
     else{
      echo "your email or password doesnot match ";
     }
   


  }

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
    <input type="password" placeholder="Enter Password" name="password" id="password" required>

    <hr>

    <button  name="submit" type="submit" class="login">login</button>
  </div>
  
  <div class="container signin">
    <p>dont have an account yet? <a href="register.php">register</a>.</p>
