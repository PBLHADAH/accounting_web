<!DOCTYPE html>
<html>
<head>
  <title>Tambah Produk</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Tambah Produk</h1>
    <form method="POST" action="">
      <div class="form-group">
        <label for="nama_produk">Nama Produk:</label>
        <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
      </div>

      <div class="form-group">
        <label for="harga_produk">Harga Produk:</label>
        <input type="text" class="form-control" id="harga_produk" name="harga_produk" required>
      </div>

      <button type="submit" name="konfirmasi" class="btn btn-primary">Konfirmasi</button>
      <a href="../produk.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>

  <!-- Include Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>


<?php
if (isset($_POST['konfirmasi'])) {
  $nama_produk = $_POST['nama_produk'];
  $harga_produk = $_POST['harga_produk'];

  // Koneksi ke database
  require '../koneksi.php';

  // Query untuk menyimpan data produk ke tabel
  $sql = "INSERT INTO produk (nama_produk, harga_produk) VALUES ('$nama_produk', '$harga_produk')";
  if (mysqli_query($conn, $sql)) {
    // Penyimpanan berhasil
    header("Location: ../produk.php"); // Redirect kembali ke halaman produk.php
  } else {
    // Terjadi kesalahan dalam penyimpanan data
    echo "Gagal menyimpan data: " . mysqli_error($conn);
  }

  // Tutup koneksi database
  mysqli_close($conn);
}
?>
