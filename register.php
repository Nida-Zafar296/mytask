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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="register.js"></script>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Register</h2>
            <form id="registerForm" method="post" action="register-form.php">
                <div class="input-group">
                    <label for="registerEmail">Email:</label>
                    <input type="email" id="registerEmail" name="email" required>
                    <span id="emailStatus"></span> 
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
                <button type="button" onclick="location.href='login.php'" title="click to submit">Login</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#registerEmail').on('blur', function() {
                var email = $(this).val();
                if (email !== '') {
                    $.ajax({
                        url: 'check-email.php',
                        method: 'POST',
                        data: {email: email},
                        success: function(data) {
                            if (data.trim() !== '') {
                                $('#emailStatus').html('<span style="color: red;">' + data + '</span>');
                                $('#registerForm button[type="submit"]').prop('disabled', true);
                            } else {
                                $('#emailStatus').html('<span style="color: green;">Email available</span>');
                                $('#registerForm button[type="submit"]').prop('disabled', false);
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>

