<!DOCTYPE html>
<html>
<head>
  <title>transaksi penjualan</title>
</head>
<body>
  <h1>tampilan transaksi penjualan</h1>
  <button onclick="location.href='create_produk.php'">Tambah Produk</button> <!-- Tambahkan tombol Tambah Produk -->

  <?php
  // Koneksi ke database
  require '../koneksi.php';

  // Query untuk mendapatkan data semua produk
  $sql = "SELECT * FROM transaksi_penjualan";
  $result = mysqli_query($conn, $sql);

  // Memeriksa apakah ada produk yang ditemukan
  if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID Produk</th><th>Nama Produk</th><th>Harga Produk</th><th>Supplier</th><th>Aksi</th></tr>";
    // Menampilkan data produk ke dalam tabel
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row['id_transaksi_penjualan'] . "</td>";
      echo "<td>" . $row['penjualan_retail'] . "</td>";
      echo "<td>" . $row['penjualan_grosir'] . "</td>";
      echo "<td>" . $row['penjualan_aksesoris'] . "</td>";
      echo "<td>" . $row['pegawai_id_pegawai'] . "</td>";
      echo "<td>" . $row['pegawai_id_manajer'] . "</td>";
      echo "<td>" . $row['tanggal'] . "</td>";
      echo "<td><a href='update_produk.php?id_transaksi_penjualan=" . $row['id_transaksi_penjualan'] . "'>Edit</a> | ";
      echo "<form method='POST' action='delete_produk.php'>";
      echo "<input type='hidden' name='id_transaksi_penjualan' value='" . $row['id_transaksi_penjualan'] . "'>";
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