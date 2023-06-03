<?php
require '../koneksi.php';

if(isset($_GET['id'])) {
    header('Location: transaksi_perkulakan.php');
    $id_produk = $_GET['id'];
    
    // Menghapus data produk dari database
    $sql = "DELETE FROM produk WHERE id_produk = '$id_produk'";
    if ($conn->query($sql) === TRUE) {
        echo "Data produk berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi database
$conn->close();