<?php
include("includes/connection.php");
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
.add-to-cart-btn
{
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
    transition: background-color 0.3s ease;
}
.add-to-cart-btn:hover {
    background-color: #ff6681;
  }
  
  /* Example with icon */
.add-to-cart-btn.icon {
    position: relative;
    padding-left: 40px;
  }
  
.add-to-cart-btn.icon:before {
    content: "\f07a"; /* Replace with your desired icon code */
    font-family: FontAwesome; /* Assuming you're using Font Awesome */
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
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
                <li><a href="#">Home</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#shop">Shop</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="cart.php">My Cart</a></li>
                <li><a href="logout.php">Logout</a></li>
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
$result = mysqli_query($con, $sql);
$inc = null;

while ($row = mysqli_fetch_assoc($result)) {
    $inc = $row['product_id'];
    $product_name = $row['product_name'];
    $product_price = $row['product_price'];
    $product_desc = $row['product_desc'];
    $product_image = $row['product_image'];

    echo '
    <form action="index.php" method="post">
        <div class="item-1">
            <div class="card">
                <div class="card-image">
                    <input type="hidden" name="product_image" value="'.$product_image.'">
                    <img src="'.$product_image.'" alt="Button Image">
                </div>
                <div class="card-body">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half"></i>
                    <input type="hidden" name="product_price" value="'.$product_price.'">
                    <label class="cash">₱'.$product_price.'</label>
                    <h3><input type="hidden" name="product_name" value="'.$product_name.'">'.$product_name.'</h3>
                    <label>'.$product_desc.'</label>
                    <br>
                    <br>
                    <center>
                        <input type="submit" class="add-to-cart-btn" value="Add to cart" name="add_to_cart">
                    </center>
                </div>
            </div>
        </div>
    </form>
    ';
}

if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $order_qty = 1;

    $select_cart = mysqli_query($con, "SELECT * FROM order_tbl WHERE product_name = '$product_name'");

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'Product already added to cart';
    } else {
        $insert_product = mysqli_query($con, "INSERT INTO order_tbl(product_name, product_price, product_image, order_qty) VALUES ('$product_name', '$product_price', '$product_image', '$order_qty')");
        $message[] = 'Product added to cart successfully';
    }
} else {
    echo '<script>Error!</script>';
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
                <label>Copyright &copy; 2023</label>
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
