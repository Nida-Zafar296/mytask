<?php 

require_once 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    $db = new Database();
    $user = new User($db);

    if ($user->createUser( $email, $password)) {
        echo "User registered successfully!";
    } else {
        echo "Error: Could not register user.";
    }
}
?>