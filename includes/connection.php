<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "bnb_database";
if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("Connection Failed!");
}