<?php
// Koneksi ke database
require 'koneksi.php';

// Mendapatkan data yang diubah dari form
$id_produk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$harga_produk = $_POST['harga_produk'];
$supplier = $_POST['supplier'];

// Query untuk melakukan update data produk
$sql = "UPDATE produk SET nama_produk='$nama_produk', harga_produk='$harga_produk', supplier='$supplier' WHERE id_produk='$id_produk'";
if (mysqli_query($conn, $sql)) {
  echo "Data produk berhasil diupdate.";
} else {
  echo "Terjadi kesalahan saat melakukan update data produk: " . mysqli_error($conn);
}

// Tutup koneksi database
mysqli_close($conn);
?>
