<?php
session_start();

if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Contact Page</h2>

    <p>Welcome <?php echo $_SESSION['user']['name']; ?> 👋</p>

    <form>
        <input type="text" placeholder="Subject">
        <textarea placeholder="Message"></textarea>
        <button>Send</button>
    </form>

    
    <br><br>
    <a href="index.php">
        <button>⬅ Back to Store</button>
    </a>

</div>

</body>
</html>