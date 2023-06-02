<!DOCTYPE html>
<html>
<head>
  <title>Tambah Produk</title>
</head>
<body>
  <h1>Tambah Produk</h1>
  <form method="POST" action="">
    <label for="nama_produk">Nama Produk:</label>
    <input type="text" id="nama_produk" name="nama_produk" required><br><br>
    
    <label for="harga_produk">Harga Produk:</label>
    <input type="text" id="harga_produk" name="harga_produk" required><br><br>
    
    <label for="supplier">Supplier:</label>
    <input type="text" id="supplier" name="supplier" required><br><br>
    
    <input type="submit" name="konfirmasi" value="Konfirmasi">
    <button onclick="location.href='produk.php'">Kembali</button>
  </form>
</body>
</html>

<?php
if (isset($_POST['konfirmasi'])) {
  $nama_produk = $_POST['nama_produk'];
  $harga_produk = $_POST['harga_produk'];
  $supplier = $_POST['supplier'];

  // Koneksi ke database
  require '../koneksi.php';

  // Query untuk menyimpan data produk ke tabel
  $sql = "INSERT INTO produk (nama_produk, harga_produk, supplier) VALUES ('$nama_produk', '$harga_produk', '$supplier')";
  if (mysqli_query($conn, $sql)) {
    // Penyimpanan berhasil
    echo "Data produk berhasil disimpan.";
  } else {
    // Terjadi kesalahan dalam penyimpanan data
    echo "Gagal menyimpan data: " . mysqli_error($conn);
  }

  // Tutup koneksi database
  mysqli_close($conn);
}
?>
