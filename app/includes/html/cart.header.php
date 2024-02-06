<header class="header">

   <div class="flex">

      <a href="#" class="logo">Black & Brown Cafe</a>

      <nav class="navbar">
         <a href="index.php">add products</a>
         <a href="cart.php">view products</a>
      </nav>

      <?php

      if (!isset($_SESSION['customer_id'])) {
         // Redirect to login or handle unauthorized access
         header('location: login.php');
         exit();
      }

      $customer_id = $_SESSION['customer_id'];

      // Fetch and display orders for the logged-in customer
      $select_rows = mysqli_query($con, "SELECT * FROM order_tbl WHERE customer_id = '$customer_id'") or die('query failed');
      $select_rows_query = mysqli_prepare($con, "SELECT * FROM order_tbl WHERE customer_id = ?");
      mysqli_stmt_bind_param($select_rows_query, "i", $customer_id);
      mysqli_stmt_execute($select_rows_query);

      $select_rows_result = mysqli_stmt_get_result($select_rows_query);
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart">cart <span>
            <!-- <?php echo $row_count; ?> -->
         </span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>