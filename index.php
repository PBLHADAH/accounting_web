<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['userdata'])) {
    // User is logged in, display logged-in content
    $userData = $_SESSION['userdata'];
    echo "Welcome, " . $userData['username'] . "! You are logged in.";
    echo "Welcome, " . $userData['alamat'];
    // You can display additional content for logged-in users here
} else {
    // User is not logged in, display login form or redirect to login page
    header("Location: login.php");
    exit();
}
?>
