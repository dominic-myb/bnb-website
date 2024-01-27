<?php
  session_start();
  include("includes/connection.php");
  include("includes/function.php");
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $customer_name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $cus_username = $_POST['username'];
    $cus_password = $_POST['password'];
    if (!empty($customer_name)&&!empty($email)&&!empty($phone)&&!empty($cus_username)&&!empty($cus_password))
    {
      $query = "insert into customer_tbl(customer_name,email,phone,cus_username,cus_password) values ('$customer_name','$email','$phone','$cus_username','$cus_password')";

      mysqli_query($con,$query);
      header("location: login.php");
      die;
    }
    else
    {
      header("register.php"); 
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
   <link rel="icon" type="image/png" href="img/tab-icon.png">
  <title>Café BLK & BRWN - Registration</title>
  <style>
    body {
      background-color: #f9f1e9;
      font-family: Arial, sans-serif;
    }

    .container {
      width: 300px;
      margin: 0 auto;
      margin-top: 20px;
      padding: 20px;
      background-color: #ffffff;
      border: 1px solid #e6c9a9;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .container h2 {
      text-align: center;
      color: #603000;
      margin-bottom: 20px;
    }

    .container label, .container input[type="text"], .container input[type="password"] {
      display: block;
      width: 93%;
      margin-bottom: 10px;
      color: #603000;
    }

    .container input[type="text"], .container input[type="password"] {
      padding: 10px;
      border: 1px solid #e6c9a9;
      border-radius: 4px;
    }

    .container input[type="submit"] {
      width: 100%;
      background-color: #603000;
      color: #ffffff;
      border: none;
      padding: 10px;
      border-radius: 4px;
      cursor: pointer;
    }

    .container input[type="submit"]:hover {
      background-color: #472800;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Create an Account</h2>
    <form action="register.php" method="post">
      <label for="name">Full Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="text" id="email" name="email" required>

      <label for="phone">Phone:</label>
      <input type="text" id="phone" name="phone" required>

      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <br>
      <input type="submit" value="Register">
    </form>
  </div>
</body>
</html>
