<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "bnb_db";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn){
    die("Connection Error!" . mysqli_error($conn));
}