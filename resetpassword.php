<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <form method="POST" action="reset_password.php">
        <label for="newPassword">New Password:</label>
        <input type="password" id="newPassword" name="newPassword" required>
        <input type="hidden" name="userEmail" value="<?php echo $_SESSION['resetEmail']; ?>">
        <input type="hidden" name="resetToken" value="<?php echo $_SESSION['resetToken']; ?>">
        <input type="submit" value="Reset Password">
    </form>
</body>
</html>