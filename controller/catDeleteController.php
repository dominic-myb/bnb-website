<?php
include("../app/includes/components/connection.php");
$c_id = $_POST['record'];
$query = "DELETE FROM category_tbl where category_id='$c_id'";
$data = mysqli_query($con, $query);

if ($data) {
    echo "Category Item Deleted";
} else {
    echo "Not able to delete";
}