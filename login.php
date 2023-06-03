<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            height: 40px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            height: 40px;
            margin-top: 10px;
            background-color: #e55940;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #fb8a76;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #e55940;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
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

<!-- kodingan php -->
<?php
// Establish a connection to the database
require 'koneksi.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
            header('Location: index.php');
            exit();
        } else {
            // Invalid password, show an error message
            echo 'Invalid password.';
        }
    } else {
        // Invalid username, show an error message
        echo 'Invalid username.';
    }
}

$conn->close();
?>

