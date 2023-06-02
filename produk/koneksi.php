<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_aldyz";

// Membuat koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi database
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
