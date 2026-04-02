<?php
session_start();
include "db.php";

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="commerce.css">
</head>
<body>

<div class="container">
<h2>🛒 Your Cart</h2>

<form method="POST" action="update_cart.php">

<?php
if(empty($_SESSION['cart'])) {
    echo "<p>Cart Empty</p>";
} else {

foreach($_SESSION['cart'] as $id => $qty) {

$res = $conn->query("SELECT * FROM products WHERE id=$id");

if($res && $res->num_rows > 0) {

$row = $res->fetch_assoc();
$price = $row['price'];

$subtotal = $price * $qty;
$total += $subtotal;
?>

<div class="cart-item">
<img src="images/<?php echo $row['image']; ?>">

<div>
<h3><?php echo $row['name']; ?></h3>
<p>₹<?php echo $price; ?></p>

<input type="number" name="qty[<?php echo $id; ?>]" value="<?php echo $qty; ?>" min="1">

<p>Subtotal: ₹<?php echo $subtotal; ?></p>

<a href="remove_from_cart.php?id=<?php echo $id; ?>" class="remove">❌ Remove</a>
</div>
</div>

<?php } } } ?>

<h2>Total: ₹<?php echo $total; ?></h2>

<button class="btn">Update Cart</button>

</form>

<a href="index.php"><button class="back">⬅ Shop</button></a>

</div>

</body>
</html>