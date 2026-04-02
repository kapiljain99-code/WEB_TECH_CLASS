<?php
include "db.php";
$msg="";

if(isset($_POST['add'])) {

    $name=$_POST['name'];
    $price=$_POST['price'];
    $rating=$_POST['rating'];
    $stock=$_POST['stock'];

    $img=$_FILES['image']['name'];
    $tmp=$_FILES['image']['tmp_name'];

    move_uploaded_file($tmp,"images/".$img);

    $sql="INSERT INTO products(name,price,image,rating,stock)
          VALUES('$name','$price','$img','$rating','$stock')";

    if($conn->query($sql)) {
        $msg="✅ Product Added!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="commerce.css">
</head>
<body>

<div class="form-box">
<h2>➕ Add Product</h2>
<p style="text-align:center; color:gray;">
Add new items to your store easily
</p>

<form method="POST" enctype="multipart/form-data">
<input name="name" placeholder="📦 Product Name" required>
<input name="price" type="number" placeholder="💰 Price" required>
<input type="file" name="image" required>
<input name="rating" placeholder="⭐ Rating" required>
<input name="stock" placeholder="📊 Stock" required>

<button class="btn" name="add">Add Product</button>
</form>

<p><?php echo $msg; ?></p>

<a href="index.php"><button class="back">⬅ Back</button></a>

</div>

</body>
</html>