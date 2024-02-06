<?php
session_start();
include("app/includes/components/connection.php");
?>
<!DOCTYPE html>
<html>

<?php
$title = "Register";
include("app/includes/html/form.head.php");
?>

<body><br><br><br>
  <div class="container">
    <h2>Create an Account</h2>
    <form id="register-form" action="app/process/form.submit.php" method="post">
      <input type="text" id="name" name="name" placeholder="Fullname" required>
      <input type="text" id="email" name="email" placeholder="sample@email.com" required>
      <input type="text" id="phone" name="phone" placeholder="Phone Number" required>
      <input type="text" id="username" name="username" placeholder="Username" required>
      <input type="password" id="password" name="password" placeholder="Password" required>
      <label for="showPassword" class="form-check-label" style="display: inline-block; float:left; ">Show Password: &nbsp;&nbsp;&nbsp;</label>
      <input type="checkbox" id="showPassword" class="form-check-input">
      <br>
      <input type="submit" id="register" value="REGISTER">
    </form>
  </div>

  <script src="assets/js/vendor/jquery-3.7.1.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>