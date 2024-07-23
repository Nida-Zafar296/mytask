<?php

session_start();
if (isset($_SESSION['username'])) {
    header('Location: deshboard.php');
    exit();
}
require_once 'Database.php';
require_once 'User.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $db = new Database();
    $user = new User($db);
    if ($user->verifyUser($email, $password)) {
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['login_error'] = "Invalid email or password";
        header("Location: register.php");
        exit();
    }
}
?>