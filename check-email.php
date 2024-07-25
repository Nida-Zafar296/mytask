<?php
require_once 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];

    $user = new User();
    $existingUser = $user->getUserByEmail($email);

    if ($existingUser) {
        echo 'Email already exists';
    } else {
        echo ''; 
    }
}
?>