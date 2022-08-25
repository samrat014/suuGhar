<?php

$conn = mysqli_connect("localhost", 'root' , '' , 'peeplace');

if (!$connection) {
    die('Not connected : ' . mysqli_connect_error());
}