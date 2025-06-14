<?php
session_start();

// Verbindung zur Datenbank herstellen
$con = mysqli_connect('localhost', 'root', '', 'webshop');

// Fehlerbehandlung bei der Verbindung
if (!$con) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . mysqli_connect_error());
}

// SQL-Abfrage für Featured Products
$sql = "SELECT * FROM products WHERE featured=1";
$featured = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>WebShop</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<section id="header">
    <a href="#"><img src="img/logo.png" class="logo" alt="Logo" /></a>
    <div>
        <ul id="navbar">
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Login</a></li>
            <li id="lg-bag"><a href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
            <li><a href="#" id="close"><i class="far fa-times"></i></a></li>
        </ul>
    </div>
    <div id="mobile">
        <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>

<section id="hero">
    <h4>Trade-in-offer</h4>
    <h2>Super value deals</h2>
    <h1>On all products</h1>
    <p>Save more with coupons & up to 70% off!</p>
    <button>Shop Now</button>
</section>

<section id="feature" class="section-p1">
    <div class="fe-box"><img src="img/feature/f1.jpg" alt=""><h6>Free Shipping</h6></div>
    <div class="fe-box"><img src="img/feature/f2.jpg" alt=""><h6>Online Order</h6></div>
    <div class="fe-box"><img src="img/feature/f3.jpg" alt=""><h6>Save Money</h6></div>
    <div class="fe-box"><img src="img/feature/f4.jpg" alt=""><h6>Promotions</h6></div>
    <div class="fe-box"><img src="img/feature/f5.jpg" alt=""><h6>Happy Sell</h6></div>
    <div class="fe-box"><img src="img/feature/f6.jpg" alt=""><h6>24/7 Support</h6></div>
</section>

<section id="product1" class="section-p1">
    <div class="des">
        <h2 class="text-center">Featured Products</h2>
    </div>
    <div class="pro-container">
        <?php while ($product = mysqli_fetch_assoc($featured)): ?>
            <div class="pro">
                <img src="<?= htmlspecialchars($product['image']); ?>" alt="<?= htmlspecialchars($product['title']); ?>" />
                <div class="des">
                    <span><?= htmlspecialchars($product['brandname']); ?></span>
                    <h5><?= htmlspecialchars($product['title']); ?></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$<?= htmlspecialchars($product['price']); ?></h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<section id="banner" class="section-m1">
    <h4>Repair Services</h4>
    <h2>Up to <span>70% Off</span> - All T-Shirts & Accessories</h2>
    <button class="normal">Explore More!</button>
</section>

<section id="product1" class="section-p1">
    <h2>New Arrivals</h2>
    <p>Summer Collection New Modern Design</p>
    <div class="pro-container">
        <div class="pro">
            <img src="img/products/n1.jpg" alt="">
            <div class="des">
                <span>adidas</span>
                <h5>Cartoon Astronaut T-Shirts</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>$78</h4>
            </div>
            <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
        </div>
    </div>
</section>

<section id="sm-banner" class="section-p1">
    <div class="banner-box">
        <h4>crazy deals</h4>
        <h2>buy 1 get 1 free</h2>
        <span>The best classic dress is on sale at Cara</span>
        <button class="white">Learn More</button>
    </div>
    <div class="banner-box banner-box2">
        <h4>spring summer</h4>
        <h2>upcoming season</h2>
        <span>The best classic dress is on sale at Cara</span>
        <button class="white">Collection</button>
    </div>
</section>

<section class="banner3">
    <div class="banner-box">
        <h2>SEASON SALE</h2>
        <h3>Winter Collection -50% OFF</h3>
    </div>
    <div class="banner-box banner-box2">
        <h2>NEW FOOTWEAR COLLECTION</h2>
        <h3>Spring / Summer 2025</h3>
    </div>
    <div class="banner-box banner-box3">
        <h2>T-SHIRTS</h2>
        <h3>New Trendy Prints</h3>
    </div>
</section>

<section id="newsletter" class="section-p1 section-m1">
    <div class="newstext">
        <h4>Sign up for Newsletter</h4>
        <p>Get E-Mail updates about our latest shop and <span>special offers</span></p>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </div>
</section>

<footer class="section-p1">
    <div class="col">
        <img class="logo" src="img/logo.png" alt="">
        <h4>Contact</h4>
        <p><strong>Phone:</strong> +49 1578 2340502</p>
        <p><strong>Hours:</strong> 10:00 am - 06:00 pm, Mon - Fr</p>
        <div class="follow">
            <h4>Follow us</h4>
            <div class="icon">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-pinterest-p"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>
    </div>

    <div class="col">
        <h4>About</h4>
        <a href="#">About Us</a>
        <a href="#">Delivery Information</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & Conditions</a>
        <a href="#">Contact Us</a>
    </div>

    <div class="col">
        <h4>My Account</h4>
        <a href="#">Sign In</a>
        <a href="#">View Cart</a>
        <a href="#">My Wishlist</a>
        <a href="#">Track My Order</a>
        <a href="#">Help</a>
    </div>

    <div class="col payment">
        <h4>Our Payment Methods</h4>
        <img src="img/pay/pay.png" alt="">
    </div>

    <div class="copyright">
        <p>© 2025, pr1me - WebShop</p>
    </div>
</footer>

<script src="script.js"></script>
</body>
</html>
