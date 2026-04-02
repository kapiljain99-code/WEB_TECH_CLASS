<?php
session_start();

foreach($_POST['qty'] as $id => $qty) {
    if($qty <= 0) {
        unset($_SESSION['cart'][$id]);
    } else {
        $_SESSION['cart'][$id] = $qty;
    }
}

header("Location: cart.php");
?>