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
    $confirm_password = $_POST['confirm-password'];

    if ($password !== $confirm_password) {
        $register_error = "Passwords do not match.";
    } else {
        $db = new Database();
        $user = new User($db);

        if ($user->createUser($email, $password)) {
            $_SESSION['user_email'] = $email; 
            header("Location: dashboard.php");
            exit();
        } else {
            $register_error = "Error: Could not register user.";
        }
    }
}
?>
