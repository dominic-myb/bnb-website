<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/png" href="img/tab-icon.png">
  <title>Login Error</title>
  <style>
    body {
      background-color: #f9f1e9;
      font-family: Arial, sans-serif;
      text-align: center;
    }

    .container {
      width: 300px;
      margin: 0 auto;
      padding: 20px;
      background-color: #ffffff;
      border: 1px solid #e6c9a9;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .container h2 {
      color: #603000;
      margin-bottom: 20px;
    }

    .error-message {
      color: #ff0000;
      margin-bottom: 20px;
    }

    .container a {
      color: #603000;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login Error</h2>
    <?php if (isset($errorMessage)) { ?>
      <p class="error-message"><?php echo $errorMessage; ?></p>
    <?php } ?>
    <p><a href="login.php">Go back to Login</a></p>
  </div>
</body>
</html>
