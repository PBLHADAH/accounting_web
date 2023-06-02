<?php
if (isset($_POST['konfirmasi'])) {
  $nama_produk = $_POST['nama_produk'];
  $harga_produk = $_POST['harga_produk'];
  $supplier = $_POST['supplier'];

  // Koneksi ke database
  require 'koneksi.php';

  // Membuat koneksi ke database
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Memeriksa koneksi database
  if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
  }

  // Query untuk menyimpan data produk ke tabel
  $sql = "INSERT INTO produk (nama_produk, harga_produk, supplier) VALUES ('$nama_produk', '$harga_produk', '$supplier')";
  if (mysqli_query($conn, $sql)) {
    // Penyimpanan berhasil
    header("Location: create_produk.php"); // Redirect kembali ke halaman create_produk.php
  } else {
    // Terjadi kesalahan dalam penyimpanan data
    echo "Gagal menyimpan data: " . mysqli_error($conn);
  }

  // Tutup koneksi database
  mysqli_close($conn);
}
?>
