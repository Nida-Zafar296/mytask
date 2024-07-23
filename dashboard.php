<?php


require_once 'User.php';

$user = new User(new Database());


if (!$user->isLoggedIn()) {
    header("Location: login.php");
    exit();
}

$userEmail = $_SESSION['user_email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
    <h2>Welcome, <?php echo $userEmail; ?></h2>
    <p>This is your dashboard.</p>
    <p><a href="logout.php">Logout</a></p>
</div>
</body>
</html>
