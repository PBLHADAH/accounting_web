<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produk = $_POST["nama_produk"];
    $kuantitas = $_POST["kuantitas"];

    // Menyimpan data ke tabel produk di database
    $sql = "INSERT INTO produk (nama_produk, kuantitas) VALUES ('$produk', $kuantitas)";

    if ($conn->query($sql) === TRUE) {
        echo "Data produk berhasil disimpan ke database.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Metode HTTP yang digunakan bukan POST.";
}

// Menutup koneksi database
$conn->close();
?>