<!DOCTYPE html>
<html>
<head>
  <title>transaksi penjualan</title>
  <style>
        table {
            border-collapse: collapse;
            width: 70%;
            margin: 0 auto;
            font-family: Arial, sans-serif;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #4CAF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .button-container {
            margin-top: 10px;
        }

        .button-container button {
            margin-right: 5px;
        }
    </style>
</head>
<body>
  <h1>tampilan transaksi penjualan</h1>
  <button onclick="location.href='create_produk.php'">Tambah Produk</button> <!-- Tambahkan tombol Tambah Produk -->

  <?php
  // Koneksi ke database
  require 'koneksi.php';

  // Query untuk mendapatkan data semua produk
  $sql = "SELECT * FROM transaksi_penjualan";
  $result = mysqli_query($conn, $sql);

  // Memeriksa apakah ada produk yang ditemukan
  if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>
        <th>id_transaksi_penjualan</th>
        <th>penjualan_retail</th>
        <th>penjualan_grosir</th>
        <th>penjualan_aksesoris</th>
        <th>pegawai_id_pegawai</th>
        <th>pegawai_id_manajer</th>
        <th>tanggal</th>

        </tr>";
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
      echo "<td><a href='update_produk.php?id_transaksi_penjualan=" . $row['id_transaksi_penjualan'] . "'>edit</a> | ";
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