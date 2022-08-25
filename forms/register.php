<?php

function encryptString($plaintext, $password, $encoding = null) {
  $iv = openssl_random_pseudo_bytes(16);
  $ciphertext = openssl_encrypt($plaintext, "AES-256-CBC", hash('sha256', $password, true), OPENSSL_RAW_DATA, $iv);
  $hmac = hash_hmac('sha256', $ciphertext.$iv, hash('sha256', $password, true), true);
  return $encoding == "hex" ? bin2hex($iv.$hmac.$ciphertext) : ($encoding == "base64" ? base64_encode($iv.$hmac.$ciphertext) : $iv.$hmac.$ciphertext);
}

function decryptString($ciphertext, $password, $encoding = null) {
  $ciphertext = $encoding == "hex" ? hex2bin($ciphertext) : ($encoding == "base64" ? base64_decode($ciphertext) : $ciphertext);
  if (!hash_equals(hash_hmac('sha256', substr($ciphertext, 48).substr($ciphertext, 0, 16), hash('sha256', $password, true), true), substr($ciphertext, 16, 32))) return null;
  return openssl_decrypt(substr($ciphertext, 48), "AES-256-CBC", hash('sha256', $password, true))
  ;
  // ,substr($ciphertext, 16, 32))) return null;
  // return openssl_decrypt(substr($ciphertext, 48), "AES-256-CBC", hash('sha256', $password, true), OPENSSL_RAW_DATA, substr($ciphertext, 0, 16));

}
include '../config.php';
if(isset($_POST['submit']))
{
  // die("hda");
  $email = $_POST['email'];
  $password = $_POST['password'];
  $rpassword = $_POST['rpassword'];

  if($password == $rpassword)
{
  $sql = "INSERT INTO user ( email,password)VALUE ('$email','$password')";
  $result = mysqli_query( $conn , $sql );
  
    if( !$result ){ 

       echo "<script> alert('registration complete plese continue by logging in' )</script>";
      }
      // else {
      //   echo "<script> alert('something went wrong' )</script>";
      // }
  }else{
      echo "<script>alert('password doesnot match')</script>";
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
    <title>register</title>
</head>
<body>
<form action="" method="POST" >
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>

    <label for="password-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="rpassword" id="password-repeat" required>
    <hr>

    <button type="submit" name="submit" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="loginform.php">Sign in</a>.</p>

</body>
</html>