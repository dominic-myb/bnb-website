<?php
$customer_id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : null;

if (isset($_POST['add_to_cart'])) {
    if (!$customer_id) {
        header("Location: login.php");
        exit();
    }

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

    $customer_id = $_SESSION['customer_id'];

    $select_cart = mysqli_prepare($con, "SELECT * FROM `order_tbl` WHERE customer_id = ? AND name = ?");
    mysqli_stmt_bind_param($select_cart, "is", $customer_id, $product_name);
    mysqli_stmt_execute($select_cart);
    mysqli_stmt_store_result($select_cart);

    if (mysqli_stmt_num_rows($select_cart) > 0) {
        $update_value = 1;
        $order_query = "SELECT * FROM order_tbl WHERE customer_id = $customer_id";
        $order_result = mysqli_query($con, $order_query);

        if (mysqli_num_rows($order_result) > 0) {
            while ($row = mysqli_fetch_assoc($order_result)) {
                if ($product_id == $row['product_id']) {
                    $order_id = $row['order_id'];
                    break;
                }
            }
        }

        $update_quantity_query = mysqli_prepare($con, "UPDATE order_tbl SET quantity = quantity + ? WHERE order_id = ?");
        mysqli_stmt_bind_param($update_quantity_query, "ii", $update_value, $order_id);
        mysqli_stmt_execute($update_quantity_query);
        echo "<script>
            alert('Added 1 to the cart!');
            window.location = 'index.php';
        </script>";
    } else {
        $timezone = new DateTimeZone('Asia/Taipei');
        $now = new DateTime('now', $timezone);
        date_default_timezone_set('Asia/Taipei');
        $date = date("Y-m-d H:i:s");
        $insert_product = mysqli_prepare($con, "INSERT INTO `order_tbl` (customer_id, product_id, name, price, image, quantity, date) VALUES (?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($insert_product, "iissiis", $customer_id, $product_id, $product_name, $product_price, $product_image, $product_quantity, $date);
        mysqli_stmt_execute($insert_product);
        echo "<script>
            alert('Added 1 to the cart!');
            window.location = 'index.php';
        </script>";
    }
}