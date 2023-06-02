<!DOCTYPE html>
<html>
<head>
  <title>Edit Produk</title>
</head>
<body>
  <h1>Edit Produk</h1>

  <?php
  // Koneksi ke database
  require 'koneksi.php';

  // Mendapatkan id_produk dari URL
  $id_produk = $_GET['id_produk'];

  // Query untuk mendapatkan data produk berdasarkan id_produk
  $sql = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
  $result = mysqli_query($conn, $sql);

  // Memeriksa apakah produk ditemukan
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    ?>

    <form method="POST" action="update_produk.php">
      <input type="hidden" name="id_produk" value="<?php echo $row['id_produk']; ?>">
      <label for="nama_produk">Nama Produk:</label>
      <input type="text" name="nama_produk" value="<?php echo $row['nama_produk']; ?>"><br>
      <label for="harga_produk">Harga Produk:</label>
      <input type="text" name="harga_produk" value="<?php echo $row['harga_produk']; ?>"><br>
      <label for="supplier">Supplier:</label>
      <input type="text" name="supplier" value="<?php echo $row['supplier']; ?>"><br>
      <input type="submit" name="update" value="Update">
    </form>

    <?php
  } else {
    echo "Produk tidak ditemukan.";
  }

  // Tutup koneksi database
  mysqli_close($conn);
  ?>

</body>
</html>
