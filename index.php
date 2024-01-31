<?php
session_start();
include("app/includes/components/connection.php");
include("app/process/add.cart.php");
$isAuthenticated = isset($_SESSION['username']);
$jsUsername = $isAuthenticated ? $_SESSION['username'] : '';
echo '<script>';
echo "var jsUsername = '" . $jsUsername . "';";
echo '</script>';
?>

<!DOCTYPE html>
<html lang="en">
<?php
$title = "Café BLK & BRWN";
include("app/includes/html/index.head.php");
?>
</head>

<body>
    <header>
        <div class="logo">
            <a href="#">Café <span>BLK & BRWN</span></a>
        </div>
        <nav>
            <ul>
                <li>
                    <div class="menu-drp">
                        <a href="#menu" class="account-btn">Menu</a>
                    </div>
                </li>
                <li>
                    <div class="shop-drp">
                        <a href="#shop" class="account-btn">Shop</a>
                    </div>
                </li>
                <li>
                    <div class="contact-drp">
                        <a href="#contact" class="account-btn">Contact</a>
                    </div>
                </li>
                <li>
                    <div class="cart-drp">
                        <a href="#" class="cart-btn" id="cartLink">Cart</a>
                        <div class="cart-drp-content">
                            <a href="cart.php">View Cart</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="account-drp">
                        <a href="#" class="account-btn">Account</a>
                        <div class="account-drp-content">
                            <hr>
                            <a href="app/process/logout.php" style="color:red;">Logout</a>
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
                    <img src="assets/images/img/hot-coffees.jpg" alt="">
                </div>
                <div class="hot-coffees-body">
                    <h2>Hot Coffees</h2>
                    <label>
                        Indulge in the rich, aromatic experience of our hot coffees. Savor the perfect blend, offering
                        warmth and delightful flavors in every sip.</label>
                </div>
            </div>
            <div class="cold-coffees">
                <div class="cold-coffees-image">
                    <img src="assets/images/img/cold-coffees.jpg" alt="">
                </div>
                <div class="cold-coffees-body">
                    <h2>Cold Coffees</h2>
                    <label>Embrace refreshing moments with our cold coffees. Cool, smooth, and invigorating blends that
                        provide a delightful escape from the ordinary.</label>
                </div>
            </div>
            <div class="frappucino-coffees">
                <div class="frappucino-coffees-image">
                    <img src="assets/images/img/frappuccino.jpg" alt="">
                </div>
                <div class="frappucino-coffees-body">
                    <h2>Frappucino Coffees</h2>
                    <label>Experience pure bliss with our Frappuccino coffees. Indulge in creamy, blended perfection
                        that combines rich flavors for a delightful and energizing treat.</label>
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
                <img src="assets/images/img/bg-image2.jpeg">
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
    <script src="assets/js/vendor/jquery-3.7.1.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>