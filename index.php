<? 
    include ("app/includes/components/connection.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $pageTitle = "";
    $style = "assets/css/main.css";
    include("app/includes/html/html_head.php");
?>
<body>
<header>
        <div class="logo">
            <a href="#">Café <span>BLK & BRWN</span></a>
        </div>

        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#shop">Shop</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="register.php">Account</a></li>
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
                    <img src="assets/img/hot-coffees.jpg" alt="">
                </div>
                <div class="hot-coffees-body">
                    <h2>Hot Coffees</h2>
                    <label>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius, repellat!</label>
                </div>
            </div>
            <div class="cold-coffees">
                <div class="cold-coffees-image">
                    <img src="assets/img/cold-coffees.jpg" alt="">
                </div>
                <div class="cold-coffees-body">
                    <h2>Cold Coffees</h2>
                    <label>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius, repellat!</label>
                </div>
            </div>
            <div class="frappucino-coffees">
                <div class="frappucino-coffees-image">
                    <img src="assets/img/frappuccino.jpg" alt="">
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
            <div class="item">
                <div class="card">
                    <div class="card-image">
                        <img src="assets/img/caramel-macchiato.jpg">
                    </div>
                    <div class="card-body">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half"></i>
                        <label class="cash">₱ 110</label>
                        <h3>Caramel Macchiato</h3>
                        <label>Lorem ipsum dolor sit amet.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact" id="contact">
        <div class="contact-box">
            <div class="contact-image">
                <img src="assets/img/bg-image2.jpeg">
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
    <?php include("app/includes/components/footer.php");?>
</body>

</html>