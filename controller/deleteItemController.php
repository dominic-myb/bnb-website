<?php

include("../includes/connection.php");
    
    $p_id=$_POST['record'];
    $query="DELETE FROM product_tbl where product_id='$p_id'";

    $data=mysqli_query($con,$query);

    if($data){
        echo"Product Item Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>