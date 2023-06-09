<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <h2>Register</h2>
    <form method="POST" action="register.php">
        <label>Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" required><br><br>
        <label>No Hp:</label>
        <input type="text" name="no_hp" required><br><br>
        <label>Alamat:</label>
        <input type="text" name="alamat" required><br><br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <label for="password">Konfirmasi password:</label>
        <input type="password" name="konfirmasi" required><br><br>
        <input type="submit" value="Register">
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