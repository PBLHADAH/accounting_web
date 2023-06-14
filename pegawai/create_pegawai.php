<!DOCTYPE html>
<html>
<head>
    <title>Registration Pegawai | Aldyz Cell </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6bY/iJTQUOhwMh4nFfdYL6s1uxH+q" crossorigin="anonymous">
   
   <?php
  $iconPath = '../index/book2.ico';
  echo '<link rel="icon" type="image/x-icon" href="' . $iconPath . '">';
  ?>
  
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        
        h2 {
            text-align: center;
        }
        
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Register</h2>
    <form method="POST">
        <label>Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" required><br><br>
        <label>No Hp:</label>
        <input type="text" name="no_hp" required><br><br>
        <label>Alamat:</label>
        <input type="text" name="alamat" required><br><br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <label for="password">Konfirmasi password:</label>
        <input type="password" name="konfirmasi"><br><br>
        <select name="jabatan">
            <option value="pegawai">Pegawai</option>
            <option value="manajer">Manajer</option>
        </select><br><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>


<?php
// Establish a connection to the database
require '../koneksi.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the entered username and password
    $username = $_POST['username'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $jabatan = $_POST['jabatan'];

    // Check if the username already exists
    $cekUser = "SELECT * FROM pegawai WHERE username = '$username'";
    $cekUserResult = $conn->query($cekUser);

    if ($cekUserResult->num_rows == 0) {
        // Check if the password matches the confirmation
        if ($password == $konfirmasi) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Insert the new user into the database
            $sql = "INSERT INTO pegawai (username, password, nama, alamat, no_hp, jabatan) VALUES ('$username', '$hashedPassword', '$nama_lengkap', '$alamat', '$no_hp', '$jabatan')";
            $conn->query($sql);

            // Redirect the user back to the registration page
            header("Location: ../pegawai.php");
            exit();
        } else {
            echo "<h2>Password tidak sesuai!</h2>";
        }
    } else {
        echo "<h2>User sudah ada!</h2>";
    }
}

$conn->close();
?>