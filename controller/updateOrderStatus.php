<?php

include("../includes/connection.php");

$order_id = $_POST['record'];
//echo $order_id;
$sql = "SELECT order_status from order_tbl where order_id='$order_id'";
$result = $con->query($sql);
//  echo $result;

$row = $result->fetch_assoc();

// echo $row["pay_status"];

if ($row["order_status"] == 0) {
     $update = mysqli_query($con, "UPDATE orders SET order_status=1 where order_id='$order_id'");
} else if ($row["order_status"] == 1) {
     $update = mysqli_query($con, "UPDATE orders SET order_status=0 where order_id='$order_id'");
}