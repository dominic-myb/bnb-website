<?php 
$conn = mysqli_connect("localhost","root","","bnb_db");
if(!$conn){
    die("Connection Error!" . mysqli_error());
}
?>