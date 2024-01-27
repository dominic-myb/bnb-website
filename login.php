<?php
session_start();
      include("includes/connection.php");
      include("includes/function.php");
      
      if($_SERVER['REQUEST_METHOD'] == "POST")
      {

        $cus_username = $_POST['username'];
        $cus_password = $_POST['password'];
        $admin_username = $_POST['username'];
        $admin_password = $_POST['password'];

        // if(!empty($admin_username) && !empty($admin_password))
        // {
        //   $query = "select * from admin where admin_username = '$admin_username'limit 1";
        //   $result = mysqli_query($con, $query);
        //   if($result)
        //   {
        //     if($result && mysqli_num_rows($result) > 0)
        //     {
        //       $user_data = mysqli_fetch_assoc($result);
        //       if($user_data['admin_password'] === $admin_password)
        //       {
        //         header("location: admin.php");
        //         die;
        //       }
        //     }
           
        //   }

        if(!empty($cus_username) && !empty($cus_password) && !is_numeric($cus_username))
        {
          $query = "select * from customer_tbl where cus_username = '$cus_username' limit 1";
          $result = mysqli_query($con, $query);
          if($result)
          {
            if($result && mysqli_num_rows($result) > 0)
            {
              $user_data = mysqli_fetch_assoc($result);
              if($user_data['cus_password'] === $cus_password)
              {
                $_SESSION['customer_id'] = $user_data['customer_id'];
                header("location: index.php");
                die;
              }
            }
            else
            {
              $query = "select * from admin where admin_username = '$admin_username'limit 1";
              $result = mysqli_query($con, $query);
              if($result)
              {
                if($result && mysqli_num_rows($result) > 0)
               {
                $user_data = mysqli_fetch_assoc($result);
                if($user_data['admin_password'] === $admin_password)
                {
                  header("location: admin.php");
                  die;
                }
               }
              }
            }
          }
          header("location: error.php");
        }
        else
        {
          echo"PLEASE ENTER VALID INFORMATiON";
        }
      }
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/png" href="img/tab-icon.png">
  <link rel="stylesheet" type="text/css" href="assets/css/loginStyle.css">
  <title>Café BLK & BRWN - Login</title>
</head>
<body>
  <div class="container">
    <div class="brand">
        <h2>Café <span>BLK & BRWN</span></h2>
    </div>
    <!-- <h2>Café BLK & BRWN</h2> -->
    <form action="login.php" method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <input type="submit" value="Login">
      <hr>
      <button><a class="create-acc" href="register.php">Create new account</a></button>
      
    </form>
  </div>
</body>
</html>
