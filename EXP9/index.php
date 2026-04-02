<?php
include "db.php";
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gustavopolos</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h1>🛍️ Gustavopolos</h1>
    <button id="themeToggle">🌙</button>
</header>

<nav>
    <a href="#">Home</a>
    <a href="#">Products</a>
    <a href="#">Offers</a>
    <a href="#">Contact</a>
    <a href="add_product.php">Add Product</a>
</nav>

<section class="products">

<?php while($row = $result->fetch_assoc()) { ?>

<article class="card">
    <figure>
        <img src="images/<?php echo $row['image']; ?>" alt="">
        <figcaption><?php echo $row['name']; ?></figcaption>
    </figure>

    <p class="price">₹<?php echo $row['price']; ?></p>

    <meter value="<?php echo $row['rating']; ?>" min="0" max="5"></meter>

    <p class="stock"><?php echo $row['stock']; ?></p>
</article>

<?php } ?>

</section>

<aside>
    <details>
        <summary>🔥 Today’s Offers</summary>
        <p>20% off on Electronics</p>
        <p>Buy 1 Get 1 Free</p>
    </details>
</aside>

<footer>
    <p>© 2026 Gustavopolos</p>
    <address>Bangalore, India</address>
</footer>

<script>
document.getElementById("themeToggle").onclick = function () {
    document.body.classList.toggle("dark");
};
</script>

</body>
</html>