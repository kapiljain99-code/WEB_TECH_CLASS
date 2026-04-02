<?php
include "db.php";
$msg = "";



if(isset($_POST['add'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $rating = $_POST['rating'];
    $stock = $_POST['stock'];

    // IMAGE UPLOAD
    $imageName = $_FILES['image']['name'];
    $tempName = $_FILES['image']['tmp_name'];

    // SAVE IMAGE IN FOLDER
    move_uploaded_file($tempName, "images/" . $imageName);

    // INSERT INTO DB
    $sql = "INSERT INTO products (name, price, image, rating, stock)
            VALUES ('$name', '$price', '$imageName', '$rating', '$stock')";

    if($conn->query($sql)) {
        $msg = "✅ Product Added Successfully!";
    } else {
        $msg = "❌ Error!";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h2>➕ Add Product</h2>

<form method="POST" enctype="multipart/form-data">

<input name="name" placeholder="📦 Product Name" required>
<input name="price" type="number" placeholder="💰 Price" required>

<!-- 🔥 IMAGE UPLOAD -->
<input type="file" name="image" required>

<input name="rating" placeholder="⭐ Rating (0-5)" required>
<input name="stock" placeholder="📊 Stock" required>

<button name="add">Add Product</button>

</form>

<p><?php echo $msg; ?></p>

<a href="index.php"><button>⬅ Back</button></a>

</div>

</body>
</html>