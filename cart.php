<?php
session_start();
include("app/includes/components/connection.php");

if (isset($_POST['update_update_btn'])) {
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];

   $customer_id = $_SESSION['customer_id'];

   $update_quantity_query = mysqli_prepare($con, "UPDATE order_tbl SET quantity = ? WHERE order_id = ? AND customer_id = ?");
   mysqli_stmt_bind_param($update_quantity_query, "iii", $update_value, $update_id, $customer_id);
   mysqli_stmt_execute($update_quantity_query);

   if ($update_quantity_query) {
      header('location: cart.php');
      exit();
   }
}

if (isset($_GET['remove'])) {
   $remove_id = mysqli_real_escape_string($con, $_GET['remove']);

   $customer_id = $_SESSION['customer_id'];
   $remove_query = mysqli_prepare($con, "DELETE FROM order_tbl WHERE order_id = ? AND customer_id = ?");
   mysqli_stmt_bind_param($remove_query, "ii", $remove_id, $customer_id);
   mysqli_stmt_execute($remove_query);
   header('location: cart.php');
   exit();
}

if (isset($_GET['delete_all'])) {

   $customer_id = $_SESSION['customer_id'];
   $delete_all_query = mysqli_prepare($con, "DELETE FROM order_tbl WHERE customer_id = ?");
   mysqli_stmt_bind_param($delete_all_query, "i", $customer_id);
   mysqli_stmt_execute($delete_all_query);
   header('location: cart.php');
   exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/png" href="assets/images/img/tab-icon.png">
   <title>BNB - Cart</title>


   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> -->

   <link rel="stylesheet" href="assets/css/cart.style.css">
</head>
<body>

<?php include ("app/includes/html/cart.header.php"); ?>

<div class="container">

<section class="shopping-cart">

   <h1 class="heading">My Cart</h1>

   <table>

      <thead>
        <th>image</th>
        <th>name</th>
        <th>price</th>
        <th>quantity</th>
        <th>total price</th>
        <th>action</th>
      </thead>

      <tbody>

         <?php 

         $select_cart = mysqli_query($con, "SELECT *, order_tbl.order_id AS order_id FROM order_tbl INNER JOIN product_tbl ON order_tbl.product_id = product_tbl.product_id WHERE customer_id = '$customer_id'");
         $grand_total = 0; 
         if (mysqli_num_rows($select_cart) > 0) {
            while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
               ?>

               <tr>
                <td><img src="<?php echo $fetch_cart['product_image']; ?>" height="100" alt=""></td>
                <td><?php echo $fetch_cart['product_name']; ?></td>
                <td>₱<?php echo number_format($fetch_cart['product_price']); ?></td>
                <td>
                    <form action="" method="post">
                    <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['order_id']; ?>" >
                    <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                    <input type="submit" value="update" name="update_update_btn">
                    </form>   
                </td>
                <td>₱<?php echo $sub_total = number_format($fetch_cart['product_price'] * $fetch_cart['quantity']); ?></td>
                <td><a href="cart.php?remove=<?php echo $fetch_cart['order_id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
                <?php
                $sub_total = $fetch_cart['product_price'] * $fetch_cart['quantity'];
                $grand_total += $sub_total;
                ?> 
               </tr>

               <?php
            }
         }
         ?>
         <tr class="table-bottom">
            <td><a href="index.php#shop" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">grand total</td>
            <td>₱<?php echo number_format($grand_total); ?></td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">proceed to checkout</a>
   </div>

</section>

</div>
   
<script src="assets/js/script.js"></script>

</body>
</html>
