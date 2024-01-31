<?php
session_start();
include("app/includes/components/connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (!empty($username) && !empty($password)) {

    $select = mysqli_prepare($con, "SELECT * FROM customer_tbl WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($select, "ss", $username, $password);
    mysqli_stmt_execute($select);
    $result = mysqli_stmt_get_result($select);
    $user_data = mysqli_fetch_assoc($result);

    if ($user_data) {

      $_SESSION['customer_id'] = $user_data["customer_id"];
      $_SESSION['username'] = $user_data["username"];
      $_SESSION['name'] = $user_data["name"];
      $_SESSION['email'] = $user_data["email"];
      $_SESSION['phone'] = $user_data["phone"];
      $isAuthenticated = isset($_SESSION['customer_id']);

      echo json_encode(['isAuthenticated' => $isAuthenticated]);
      echo '<script>
      alert("Welcome, ' . $user_data['name'] . '!");
      window.location.href = "index.php";
      </script>';
      exit();

    } else {
      echo '<script>
      alert("Incorrect Username or Password!");
      window.location.href = "login.php";
      </script>';
      echo json_encode(['isAuthenticated' => false]);
      exit();
    }
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
    <form action="login.php" method="post">
      <input type="text" id="username" name="username" placeholder="Username" autocomplete="off" required>
      <input type="password" id="password" name="password" placeholder="Password" autocomplete="off" required>
      <input type="submit" value="Login"><br>
      <hr>
      <p class="create-acc">New to Black & Brown? &nbsp<a href="form.php">Create Account</a></p>
    </form>
  </div>
</body>

</html>