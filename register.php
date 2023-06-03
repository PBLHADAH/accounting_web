<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            background-color: #f5f5f5;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            color: #4CAF50;
            display: block;
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
            text-decoration: none;
        }

        @media (max-width: 500px) {
            form {
                max-width: 300px;
            }
        }
    </style>
</head>
<body>
    <h2>Register</h2>
    <form method="POST" action="register.php">
        <div class="mb-3">
            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" required>
        </div>
        <div class="mb-3">
            <label for="no_hp">No HP:</label>
            <input type="text" id="no_hp" name="no_hp" required>
        </div>
        <div class="mb-3">
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>
        </div>
        <div class="mb-3">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="konfirmasi">Konfirmasi password:</label>
            <input type="password" id="konfirmasi" name="konfirmasi" required>
        </div>
        <button type="submit">Register</button>
    </form>
    <a href="login.php">Login</a>
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
    $konfirmasi = $_POST['konfirmasi'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    $cekUser = "SELECT * FROM pegawai WHERE username = '$username'";
    $cekUserResult = $conn->query($cekUser);

    if($cekUserResult->num_rows == 0){
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        if ($password == $konfirmasi){
            $sql = "INSERT INTO pegawai (username, password, nama, alamat, no_hp) VALUES ('$username', 
            '$hashedPassword', '$nama_lengkap', '$alamat', $no_hp)";
            $conn->query($sql);
            header("Location: login.php");
            exit();
        } else{
            echo "<h2>Password tidak sesuai!</h2>";
            exit();
        }
    }
    else{
        echo "<h2>User sudah ada!</h2>";
    }
}

$conn->close();
?>