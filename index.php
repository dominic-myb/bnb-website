<?php
session_start();
include("includes/connection.php");

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

    $select_cart = mysqli_prepare($con, "SELECT * FROM `order_tbl` WHERE name = ?");
    mysqli_stmt_bind_param($select_cart, "s", $product_name);
    mysqli_stmt_execute($select_cart);
    mysqli_stmt_store_result($select_cart);

    if (mysqli_stmt_num_rows($select_cart) > 0) {

        $update_value = 1;
        $order_query = "SELECT * FROM order_tbl";
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
        window.location = index.php;
        </script>";

    } else {

        $insert_product = mysqli_prepare($con, "INSERT INTO `order_tbl` (product_id, name, price, image, quantity) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($insert_product, "issii", $product_id, $product_name, $product_price, $product_image, $product_quantity);
        mysqli_stmt_execute($insert_product);
        echo "<script>
        alert('Added 1 to the cart!');
        window.location = index.php;
        </script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/tab-icon.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            overflow-x: hidden;
        }

        .add-to-cart-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff6600;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: opacity 0.3s ease;
        }

        .add-to-cart-btn:hover {
            opacity: 0.8;
        }

        .add-to-cart-btn:active {
            opacity: 0.5;
        }

        /* Style the dropdown anchor */
        .account-btn {
            color: white;
            padding: 10px;
            font-size: 16px;
            text-decoration: none;
            /* Remove default underline */
            display: inline-block;
            /* Ensure the anchor behaves like a block element */
            cursor: pointer;
        }

        /* Style the dropdown content (hidden by default) */
        .account-drp-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 120px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 10px;
            text-align: center;
            transition: display 0.15s;
        }

        /* Style the links inside the dropdown */
        .account-drp-content a {
            color: black;
            padding: 10px 10px;
            text-decoration: none;
            display: block;
            font-size: 14px;
            transition: background-color 0.15s;
        }

        /* Change color on hover */
        .account-drp-content a:hover {
            background-color: #d3d3d3;
        }

        .account-drp {
            transition: display 0.15s;
        }

        /* Show the dropdown on hover */
        .account-drp:hover .account-drp-content {
            display: block;
        }
    </style>
    <title>Café BLK & BRWN</title>
</head>

<body>
    <header>
        <div class="logo">
            <a href="#">Café <span>BLK & BRWN</span></a>
        </div>

        <nav>
            <ul>
                <li>
                    <div class="account-drp">
                        <a href="#menu" class="account-btn">Menu</a>
                    </div>
                </li>
                <li>
                    <div class="account-drp">
                        <a href="#shop" class="account-btn">Shop</a>
                    </div>
                    </div>
                </li>
                <li>
                    <div class="account-drp">
                        <a href="#contact" class="account-btn">Contact</a>
                    </div>
                    </div>
                </li>
                <li>
                    <div class="account-drp">
                        <a href="#" class="account-btn">Cart</a>
                        <div class="account-drp-content">
                            <a href="#">Option 1</a>
                            <a href="#">Option 2</a>
                            <a href="#">Option 3</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="account-drp">
                        <a href="#" class="account-btn">Account</a>
                        <div class="account-drp-content">
                            <a href="#">Option 1</a>
                            <a href="#">Option 2</a>
                            <hr>
                            <a href="logout.php" style="color:red;">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <div class="content">
        <h2>Black & Brown Coffee</h2>
        <p>Would you like to start the day with a nice coffee?</p>
    </div>

    <div class="menu" id="menu">
        <div class="menu-header">
            <h3>Menu</h3>
            <h4>Black & Brown Coffee Menu</h4>
        </div>

        <div class="menu-content">
            <div class="hot-coffees">
                <div class="hot-coffees-image">
                    <img src="img/hot-coffees.jpg" alt="">
                </div>
                <div class="hot-coffees-body">
                    <h2>Hot Coffees</h2>
                    <label>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius, repellat!</label>
                </div>
            </div>
            <div class="cold-coffees">
                <div class="cold-coffees-image">
                    <img src="img/cold-coffees.jpg" alt="">
                </div>
                <div class="cold-coffees-body">
                    <h2>Cold Coffees</h2>
                    <label>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius, repellat!</label>
                </div>
            </div>
            <div class="frappucino-coffees">
                <div class="frappucino-coffees-image">
                    <img src="img/frappuccino.jpg" alt="">
                </div>
                <div class="frappucino-coffees-body">
                    <h2>Frappucino Coffees</h2>
                    <label>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius, repellat!</label>
                </div>
            </div>
        </div>
    </div>


    <div class="shop" id="shop">

        <div class="shop-header">
            <h3>Shop</h3>
            <h4>Black & Brown Coffee Drinks</h4>
        </div>

        <div class="shop-box">
            <?php
            $sql = "SELECT * FROM product_tbl";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <form action="index.php" method="post">
                        <div class="item">
                            <div class="card">
                                <div class="card-image">
                                    <input type="hidden" name="product_id" id="product_id"
                                        value="<?php echo $row['product_id']; ?>">
                                    <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
                                    <img src="<?php echo $row['product_image']; ?>" alt="">
                                </div>
                                <div class="card-body">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half"></i>

                                    <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
                                    <label class="cash">₱
                                        <?php echo $row['product_price']; ?>
                                    </label>

                                    <h3>
                                        <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
                                        <?php echo $row['product_name']; ?>
                                    </h3>

                                    <label>
                                        <?php echo $row['product_desc']; ?>
                                    </label>
                                    <br>
                                    <br>
                                    <center>
                                        <button type="submit" class="add-to-cart-btn" name="add_to_cart">
                                            Add to cart
                                        </button>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                }
            }
            ?>
        </div>
    </div>

    <div class="contact" id="contact">
        <div class="contact-box">
            <div class="contact-image">
                <img src="img/bg-image2.jpeg">
            </div>
        </div>
        <div class="contact-box">
            <div class="contact-body">
                <form>
                    <h2>Contact Us</h2>
                    <div class="form-content">
                        <input type="text" required>
                        <span></span>
                        <label>Username</label>
                    </div>
                    <div class="form-content">
                        <input type="email" required>
                        <span></span>
                        <label>Email</label>
                    </div>
                    <button type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>


    <div class="footer">
        <div class="footer-box">
            <div class="social-media">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
            <div class="copyright">
                <label>Copyright &copy; 2024</label>
            </div>
            <div class="brand">
                <label>Café <span>BLK & BRWN</span></label>
            </div>
        </div>
    </div>

</body>

</html>
<?php


?>