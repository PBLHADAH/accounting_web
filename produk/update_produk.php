<?php
// Koneksi ke database
require '../koneksi.php';

// Mendapatkan id_produk dari URL jika ada
$id_produk = isset($_GET['id_produk']) ? $_GET['id_produk'] : '';

// Memeriksa apakah ada data yang dikirimkan melalui formulir
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Mendapatkan data yang diubah dari form
  $id_produk = $_POST['id_produk'];
  $nama_produk = $_POST['nama_produk'];
  $harga_produk = $_POST['harga_produk'];

  // Query untuk melakukan update data produk
  $sql = "UPDATE produk SET nama_produk='$nama_produk', harga_produk='$harga_produk' WHERE id_produk='$id_produk'";
  if (mysqli_query($conn, $sql)) {
    echo "Data produk berhasil diupdate.";
    header('location: ../produk.php');
  } else {
    echo "Terjadi kesalahan saat melakukan update data produk: " . mysqli_error($conn);
  }
}

// Query untuk mendapatkan data produk berdasarkan id_produk
$sql = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
$result = mysqli_query($conn, $sql);

// Memeriksa apakah produk ditemukan
if (mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Produk</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Edit Produk</h1>

    <form method="POST" action="">
      <input type="hidden" name="id_produk" value="<?php echo $row['id_produk']; ?>">
      
      <div class="form-group">
        <label for="nama_produk">Nama Produk:</label>
        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo $row['nama_produk']; ?>">
      </div>
      
      <div class="form-group">
        <label for="harga_produk">Harga Produk:</label>
        <input type="text" class="form-control" id="harga_produk" name="harga_produk" value="<?php echo $row['harga_produk']; ?>">
      </div>
      
      <button type="submit" name="update" class="btn btn-primary">Update</button>
      <a href="../produk.php" class="btn btn-secondary">Kembali</a>

    </form>
  </div>

</body>
</html>








</body>
</html>

<?php
} else {
  echo "Produk tidak ditemukan.";
}

// Tutup koneksi database
mysqli_close($conn);
?>
