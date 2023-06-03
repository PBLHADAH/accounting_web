<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        
        .container {
            max-width: 500px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        
        label {
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }
        
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            border: none;
        }
        
        input[type="submit"]:hover {
            background-color: #0069d9;
            cursor: pointer;
        }
        
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form method="POST" action="register.php">
            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" required>
            
            <label for="no_hp">No Hp:</label>
            <input type="text" id="no_hp" name="no_hp" required>
            
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>
            
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="konfirmasi">Konfirmasi password:</label>
            <input type="password" id="konfirmasi" name="konfirmasi" required>
            
            <input type="submit" value="Register">
        </form>
        <a href="login.php">Login</a>
    </div>
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