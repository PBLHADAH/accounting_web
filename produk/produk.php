<!DOCTYPE html>
<html>
<head>
  <title>Kelola Produk</title>
</head>
<body>
  <h1>Kelola Produk</h1>
  <button onclick="location.href='produk/create_produk.php'">Tambah Produk</button> <!-- Tambahkan tombol Tambah Produk -->

  <?php
  // Koneksi ke database
  require 'koneksi.php';

  // Query untuk mendapatkan data semua produk
  $sql = "SELECT * FROM produk";
  $result = mysqli_query($conn, $sql);

  // Memeriksa apakah ada produk yang ditemukan
  if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID Produk</th><th>Nama Produk</th><th>Harga Produk</th><th>Aksi</th></tr>";
    // Menampilkan data produk ke dalam tabel
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row['id_produk'] . "</td>";
      echo "<td>" . $row['nama_produk'] . "</td>";
      echo "<td>" . $row['harga_produk'] . "</td>";
      echo "<td><a href='produk/update_produk.php?id_produk=" . $row['id_produk'] . "'>Edit</a> | ";
      echo "<form method='POST' action='produk/delete_produk.php'>";
      echo "<input type='hidden' name='id_produk' value='" . $row['id_produk'] . "'>";
      echo "<input type='submit' name='delete' value='Hapus'></form></td>";
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
                   