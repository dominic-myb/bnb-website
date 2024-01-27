<?php
    include("../includes/connection.php");
    
    if(isset($_POST['upload']))
    {
       
        $catname = $_POST['c_name'];
       
         $insert = mysqli_query($con,"INSERT INTO category_tbl
         (category_name) 
         VALUES ('$catname')");
 
         if(!$insert)
         {
             echo mysqli_error($con);
             header("Location: ../dashboard.php?category=error");
         }
         else
         {
            echo"<script>Records added successfully.</script>";
            header("location: ../admin.php");
            die;
         }
     
    }
        
?>