<?php
session_start();
include "db.php";

$count = isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0;

$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
<title>Gustavopolos</title>
<link rel="stylesheet" href="commerce.css">
</head>
<body>

<header>
    <h1>🛍️ Gustavopolos</h1>
    <button id="toggle">🌙</button>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="add_product.php">Add Product</a>
    <a href="cart.php">Cart (<?php echo $count; ?>)</a>
</nav>

<section class="products">

<?php while($row = $result->fetch_assoc()) { ?>

<div class="card">
    <img src="images/<?php echo $row['image']; ?>">
    <h3><?php echo $row['name']; ?></h3>
<p>₹<?php echo $row['price']; ?></p>
<p style="color:gray;">⭐ <?php echo $row['rating']; ?></p>
<p style="color:green;"><?php echo $row['stock']; ?></p>

    <a href="add_to_cart.php?id=<?php echo $row['id']; ?>">
        <button class="btn">Add to Cart</button>
    </a>
</div>

<?php } ?>

</section>

<script>
const toggle = document.getElementById("toggle");
toggle.onclick = () => {
    document.body.classList.toggle("dark");
}
</script>

</body>
</html>