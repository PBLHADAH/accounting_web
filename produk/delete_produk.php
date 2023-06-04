<?php
require '../koneksi.php';
if (isset($_POST['delete'])) {
  $id_produk = $_POST['id_produk'];

  // Koneksi ke database

  // Memeriksa koneksi database
  if (!$conn) {
      die("Koneksi database gagal: " . mysqli_connect_error());
  }

  // Query untuk menghapus data produk berdasarkan ID
  $sql = "DELETE FROM produk WHERE id_produk = '$id_produk'";
  if (mysqli_query($conn, $sql)) {
    // Penghapusan berhasil
    header("Location: ../produk.php"); // Redirect kembali ke halaman produk.php
  } else {
    // Terjadi kesalahan dalam penghapusan data
    echo "Gagal menghapus data: " . mysqli_error($conn);
  }

  // Tutup koneksi database
  mysqli_close($conn);
}
?>
