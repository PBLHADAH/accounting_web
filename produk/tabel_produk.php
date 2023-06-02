<!DOCTYPE html>
<html>
<head>
  <title>Kelola Produk</title>
</head>
<body>

  <?php
  // Koneksi ke database
  require '../koneksi.php';

  // Membuat koneksi ke database
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Memeriksa koneksi database
  if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
  }

  // Query untuk mendapatkan data semua produk
  $sql = "SELECT * FROM produk";
  $result = mysqli_query($conn, $sql);

  // Memeriksa apakah ada produk yang ditemukan
  if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID Produk</th><th>Nama Produk</th><th>Harga Produk</th><th>Supplier</th></tr>";
    // Menampilkan data produk ke dalam tabel
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row['id_produk'] . "</td>";
      echo "<td>" . $row['nama_produk'] . "</td>";
      echo "<td>" . $row['harga_produk'] . "</td>";
      echo "<td>" . $row['supplier'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "Tidak ada produk yang ditemukan.";
  }

  // Tutup koneksi database
  mysqli_close($conn);
  ?>
</body>
</html>
