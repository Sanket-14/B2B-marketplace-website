<?php
session_start(); // Start the session

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Delete the "remember_token" cookie
if (isset($_COOKIE["buyer_remember_token"])) {
    setcookie("buyer_remember_token", "", time() - 3600, "/"); // Set the cookie to expire in the past
}

// Redirect to the login page
header("Location: buyer_login.php");
exit();
?>