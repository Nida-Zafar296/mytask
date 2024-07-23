<?php
session_start();


if (isset($_SESSION['user_email'])) {
    header("Location: dashboard.php");
    exit();
}

require_once 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $db = new Database();
    $user = new User($db);

    if ($user->verifyUser($email, $password)) {
        $_SESSION['user_email'] = $email; 
        header("Location: dashboard.php");
        exit();
    } else {
        $login_error = "Invalid email or password";
    }
}
?>
