<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'])) {
        $_SESSION['userEmail'] = $_POST['email'];
        echo "success";
    } else {
        echo "failed";
    }
} else {
    echo "Invalid request";
}
?>
