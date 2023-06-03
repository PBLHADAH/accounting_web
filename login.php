<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <a href="register.php">Register</a>
</body>
</html>
<?php
// Establish a connection to the database
require 'koneksi.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the entered username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM pegawai WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // The user exists, compare the hashed passwords
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Passwords match, redirect to a welcome page
            session_start();
            $_SESSION['userdata'] = $row;
            header("Location: index.php");
            exit();
        } else {
            // Invalid password, show an error message
            echo "Invalid password.";
        }
    } else {
        // Invalid username, show an error message
        echo "Invalid username.";
    }

}

$conn->close();
?>

