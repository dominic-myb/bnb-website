<header class="header">

   <div class="flex">

      <a href="#" class="logo">Black & Brown Cafe</a>

      <nav class="navbar">
         <a href="index.php">add products</a>
         <a href="cart.php">view products</a>
      </nav>

      <?php

      $select_rows = mysqli_query($con, "SELECT * FROM order_tbl") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart">cart <span>
            <?php echo $row_count; ?>
         </span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>