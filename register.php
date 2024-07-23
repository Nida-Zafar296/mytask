<?php
session_start();
if (isset($_SESSION['user_email'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Register</h2>
            <form id="registerForm" method="post" action="register-form.php">
                <div class="input-group">
                    <label for="registerEmail">Email:</label>
                    <input type="email" id="registerEmail" name="email" required>
                </div>
                <div class="input-group">
                    <label for="registerPassword">Password:</label>
                    <input type="password" id="registerPassword" name="password" required>
                </div>
                <div class="input-group">
                    <label for="registerConfirmPassword">Confirm Password:</label>
                    <input type="password" id="registerConfirmPassword" name="confirm-password" required>
                </div>
                <button type="submit" title="click to submit">Register</button><br>
                <button type="submit" onclick="location.href='login.php'" title="click to submit" >Login</button>
            </form>
        </div>
    </div>
    <script src="register.js"></script>
</body>
</html>