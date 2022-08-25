<?php

$DB_SERVER = "localhost";
$DB_USERNAME = "root";
$PASSWORD = "";
$DB_NAME = "peeplace";

// $printname = "samrat";

$conn = mysqli_connect($DB_SERVER , $DB_USERNAME, $PASSWORD, $DB_NAME);

if($conn == false){

    die("error: cannot connect");
}


?>