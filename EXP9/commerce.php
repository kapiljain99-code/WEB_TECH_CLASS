<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h2>Your Cart 🛍️</h2>

<?php
if(!empty($_SESSION['cart'])) {
    $total = 0;

    foreach($_SESSION['cart'] as $item) {
        echo "<p>{$item['name']} - ₹{$item['price']}</p>";
        $total += $item['price'];
    }

    echo "<h3>Total: ₹$total</h3>";
} else {
    echo "<p>Cart is empty</p>";
}
?>

<a href="index.php"><button>Back to Store</button></a>

</div>

</body>
</html>