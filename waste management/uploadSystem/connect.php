<?php

// to display errors bcuz my mac is not displaying errors by default
ini_set('display_errors', 1);
error_reporting(E_ALL);

//db info
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uploadDB";


//create connection to db
$conn = mysqli_connect($servername, $username, $password, $dbname);

//check connection to db
if(!$conn)
{
    die(mysqli_error($conn));
}else{
    // echo "connected to db";
}



?>