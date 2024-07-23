<?php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: deshboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Convert file to PHP format and only load this page if user is not logged in. Otherwise redirect to dashboard page. -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Hello Welcome!</h1>
        
        <div class="button-container">
            <a href="login.php" class="button" title="click to login">Login</a><br>
            <a href="register.php" class="button" title="click to register">Register</a>
        </div>
    </div>
</body>
</html>