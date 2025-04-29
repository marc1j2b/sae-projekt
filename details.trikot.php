<?php
// Verbindung zur Datenbank mit Fehlerprüfung
$con = mysqli_connect('localhost', 'root', '', 'webshop');
if (!$con) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . mysqli_connect_error());
}

// SQL-Abfrage ausführen
$sql = "SELECT * FROM products WHERE featured = 1";
$featured = mysqli_query($con, $sql);
?>


<div class="col-md-2"></div>

<div class="pro-container">
    <div class="des">
        <h2 class="text-center">Product Details</h2>

        <?php while ($product = mysqli_fetch_assoc($featured)): ?>
            <div class="pro">
                <h4><b><?= htmlspecialchars($product['title']); ?></b></h4>
                <img src="<?= htmlspecialchars($product['image']); ?>" alt="<?= htmlspecialchars($product['title']); ?>" />
                <p class="lprice"><b>$<?= htmlspecialchars($product['price']); ?></b></p>
                <p class="desc"><b><?= htmlspecialchars($product['description']); ?></b></p>
                <p class="bname"><b><?= htmlspecialchars($product['brandname']); ?></b></p>
            </div>
        <?php endwhile; ?>
    </div>
</div>
