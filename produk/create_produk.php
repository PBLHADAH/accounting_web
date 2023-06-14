<!DOCTYPE html>
<html>
<head>
  <title>Tambah Produk | Aldyz Cell</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  
  <?php
  $iconPath = '../index/book2.ico';
  echo '<link rel="icon" type="image/x-icon" href="' . $iconPath . '">';
  ?>

<style>
  body {
    background-color: #f8f9fa;
    padding-top: 40px;
  }

  .container {
    max-width: 400px;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 5px;
    margin: 0 auto;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }

  h1 {
    text-align: center;
    margin-bottom: 20px;
  }

  .form-group label {
    font-weight: bold;
  }

  .form-control {
    border-radius: 5px;
  }

  .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
  }

  .btn-primary:hover {
    background-color: #0069d9;
    border-color: #0062cc;
  }

  .btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
  }

  .btn-secondary:hover {
    background-color: #5a6268;
    border-color: #545b62;
  }
</style>


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
