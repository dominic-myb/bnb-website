<?php
session_start();
include("app/includes/components/connection.php");
include("app/includes/components/function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $cus_username = $_POST['username'];
  $cus_password = $_POST['password'];
  $admin_username = $_POST['username'];
  $admin_password = $_POST['password'];

  if (!empty($cus_username) && !empty($cus_password) && !is_numeric($cus_username)) {
    $query = "SELECT * FROM customer_tbl WHERE username = '$cus_username' LIMIT 1";
    $result = mysqli_query($con, $query);
    if ($result) {
      if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        if ($user_data['password'] === $cus_password) {
          $_SESSION['customer_id'] = $user_data['customer_id'];
          header("location: index.php");
          die;
        }
      } else {
        $query = "SELECT * FROM admin WHERE admin_username = '$admin_username' LIMIT 1";
        $result = mysqli_query($con, $query);
        if ($result) {
          if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            if ($user_data['admin_password'] === $admin_password) {
              header("location: admin.php");
              die;
            }
          }
        }
      }
    } {
      echo '<script>
        window.alert("Incorrect Username or Password!")
        window.location="login.php"
      </script>';
    }
  } else {
    echo '<script>
    window.alert("Please Enter Valid Input!")
    window.location="login.php"
    </script>';
  }
}
?>
<!DOCTYPE html>
<html>

<?php
$title = "- Login";
include("app/includes/html/login.head.php");
?>

<body>
  <div class="container">
    <div class="brand">
      <h2>Café <span>BLK & BRWN</span></h2>
    </div>
    <!-- <h2>Café BLK & BRWN</h2> -->
    <form action="login.php" method="post">
      <input type="text" id="username" name="username" placeholder="Username" required>
      <input type="password" id="password" name="password" placeholder="Password" required>
      <input type="submit" value="Login"><br>
      <hr>
      <p class="create-acc">New to Black & Brown? &nbsp<a href="form.php">Create Account</a></p>

    </form>
  </div>
</body>

</html>