<?php
session_start();

$msg = "";

// LOGIN LOGIC
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isset($_SESSION['user']) &&
        $email == $_SESSION['user']['email'] &&
        $password == $_SESSION['user']['password']) {

        // ✅ Redirect to home page after login
        header("Location: index.php");
        exit();
    } else {
        $msg = "❌ Invalid Email or Password!";
    }
}

// QUICK REGISTER (inside login page)
if (isset($_POST['quick_register'])) {
    $name = $_POST['r_name'];
    $email = $_POST['r_email'];
    $password = $_POST['r_password'];

    if (empty($name) || empty($email) || empty($password)) {
        $msg = "❌ All fields required for registration!";
    } else {
        $_SESSION['user'] = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];
        $msg = "✅ Registered Successfully! Now login.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">

    <style>
        .message {
            text-align: center;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .error { color: red; }
        .success { color: green; }

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

        .mini-register {
            margin-top: 20px;
            padding: 15px;
            border-top: 1px solid #ddd;
        }

        .mini-register h3 {
            text-align: center;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Login</h2>

    <!-- MESSAGE -->
    <?php if ($msg != "") { ?>
        <p class="message <?php echo (strpos($msg, '✅') !== false) ? 'success' : 'error'; ?>">
            <?php echo $msg; ?>
        </p>
    <?php } ?>

    <!-- LOGIN FORM -->
    <form method="POST">
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button name="login">Login</button>
    </form>

    <!-- SWITCH -->
    <div class="switch-box">
        Don’t have an account? 
        <a href="register.php">Go to Register</a>
    </div>


</div>

</body>
</html>