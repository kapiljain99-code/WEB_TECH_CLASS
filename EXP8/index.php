<?php
session_start();

// ADD TO CART
if (isset($_POST['add_to_cart'])) {
    $product = $_POST['product'];
    $price = $_POST['price'];

    $_SESSION['cart'][] = [
        'product' => $product,
        'price' => $price
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <a href="index.php">Home</a>
    <a href="register.php">Register</a>
    <a href="login.php">Login</a>

    <?php if(isset($_SESSION['user'])) { ?>
        <a href="contact.php">Contact</a>
        <a href="logout.php">Logout</a>
    <?php } ?>
</nav>

<div class="container">
    <h2>Welcome to My Store 🛒</h2>

    <?php if(isset($_SESSION['user'])) { ?>
        <p>Welcome <?php echo $_SESSION['user']['name']; ?> 👋</p>
    <?php } ?>

    <!-- PRODUCTS -->
    <div class="products">

        <div class="product">
            <h3>Laptop</h3>
            <p>₹60000</p>
            <form method="POST">
                <input type="hidden" name="product" value="Laptop">
                <input type="hidden" name="price" value="60000">
                <button name="add_to_cart">Add to Cart</button>
            </form>
        </div>

        <div class="product">
            <h3>Mobile</h3>
            <p>₹20000</p>
            <form method="POST">
                <input type="hidden" name="product" value="Mobile">
                <input type="hidden" name="price" value="20000">
                <button name="add_to_cart">Add to Cart</button>
            </form>
        </div>

        <div class="product">
            <h3>Headphones</h3>
            <p>₹2000</p>
            <form method="POST">
                <input type="hidden" name="product" value="Headphones">
                <input type="hidden" name="price" value="2000">
                <button name="add_to_cart">Add to Cart</button>
            </form>
        </div>

    </div>

    <!-- CART -->
    <h2>Your Cart 🛍️</h2>

    <?php
    if (!empty($_SESSION['cart'])) {
        $total = 0;

        foreach ($_SESSION['cart'] as $item) {
            echo "<p>{$item['product']} - ₹{$item['price']}</p>";
            $total += $item['price'];
        }

        echo "<h3>Total: ₹$total</h3>";
    } else {
        echo "<p>Cart is empty</p>";
    }
    ?>

</div>

</body>
</html>