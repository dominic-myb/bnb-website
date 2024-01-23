<? 
    include ("app/includes/components/connection.php"); 
?>
<!DOCTYPE html>
<html>
<?php
    $pageTitle = "Login";
    $style = "assets/css/form.css";
    include("app/includes/html/html_head.php");
?>
<body>
  <div class="container">
    <div class="brand">
        <h2>Café <span>BLK & BRWN</span></h2>
  </div>
    <form action="login.php" method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <input type="submit" value="Login">
      <hr>
    </form>
  </div>
  <script>

  </script>
</body>
</html>