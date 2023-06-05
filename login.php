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
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Montserrat, sans-serif;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-form {
            width: 400px;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
        }

        .login-form h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 30px;
            font-weight: bold;
        }

        .login-form input {
            width: 100%;
            height: 40px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .login-form button {
            width: 100%;
            height: 40px;
            background-color: #f794a4;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="login-container">
    <div class="login-form">
        <h1>Login!</h1>
        <form action="" method="post">
            <input type="text" placeholder="Username" name="username" required>
            <input type="password" placeholder="Password" name="password" required>
            <button type="submit">LOG IN</button>
        </form>
    </div>
</div>
</body>
</html>
