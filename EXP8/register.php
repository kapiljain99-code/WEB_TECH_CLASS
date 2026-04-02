<?php
session_start();
$msg = "";

if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($name) || empty($email) || empty($password)) {
        $msg = "All fields are required!";
    } else {
        $_SESSION['user'] = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];
        $msg = "Registered Successfully! You can login below.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">

    <style>
        .switch-box {
            margin-top: 20px;
            text-align: center;
            padding: 10px;
            background: #f1f1f1;
            border-radius: 10px;
        }

        .switch-box a {
            color: #007bff;
            font-weight: bold;
            text-decoration: none;
        }

        .mini-login {
            margin-top: 20px;
            padding: 15px;
            border-top: 1px solid #ddd;
        }

        .mini-login h3 {
            text-align: center;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Register</h2>

    <p style="text-align:center;color:green;"><?php echo $msg; ?></p>


    <form method="POST">
        <input type="text" name="name" placeholder="Enter Name">
        <input type="email" name="email" placeholder="Enter Email">
        <input type="password" name="password" placeholder="Enter Password">
        <button name="register">Register</button>
    </form>

    
    <div class="switch-box">
        Already have an account? 
        <a href="login.php">Go to Login</a>
    </div>

  

</div>

</body>
</html>