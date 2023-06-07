<?php
require_once "koneksi.php";

$sql = "SELECT date,
SUM(total_harian_lainnya) AS lainnya,
SUM(total_harian_penjualan) AS penjualan,
SUM(total_harian_perkulakan * -1) AS perkulakan,
SUM(total_harian_lainnya + total_harian_penjualan + total_harian_perkulakan * -1) AS total_harian
FROM (
SELECT DATE(tl.tanggal) AS date,
    SUM(tl.nominal) AS total_harian_lainnya,
    0 AS total_harian_penjualan,
    0 AS total_harian_perkulakan
FROM transaksi_lainnya tl
GROUP BY DATE(tl.tanggal)

UNION

SELECT DATE(tp.tanggal) AS date,
    0 AS total_harian_lainnya,
    SUM(tp.penjualan_retail + tp.penjualan_grosir + tp.penjualan_aksesoris) AS total_harian_penjualan,
    0 AS total_harian_perkulakan
FROM transaksi_penjualan tp
GROUP BY DATE(tp.tanggal)

UNION

SELECT DATE(tpk.tanggal) AS date,
    0 AS total_harian_lainnya,
    0 AS total_harian_penjualan,
    SUM(tpk.kuantitas * pr.harga_produk) AS total_harian_perkulakan
FROM transaksi_perkulakan tpk
INNER JOIN produk pr ON tpk.produk_id_produk = pr.id_produk
GROUP BY DATE(tpk.tanggal)
) AS combined_data
GROUP BY date;
";
$result = $conn->query($sql);
?>

<table>
    <!-- Table headers -->
    <h1>Transaksi Harian</h1>
    <thead>
        <tr>
            <th>Date</th>
            <th>Penjualan</th>
            <th>Perkulakan</th>
            <th>Lainnya</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td> Rp." . number_format($row['penjualan'], 0, ',', '.') . "</td>";
            echo "<td> Rp." . number_format($row['perkulakan'], 0, ',', '.') . "</td>";
            echo "<td> Rp." . number_format($row['lainnya'], 0, ',', '.') . "</td>";
            echo "<td> Rp." . number_format($row['total_harian'], 0, ',', '.') . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<!-- Landing page  dan tabel -->
<div class="container">
  
  <!-- tabel -->
  <h1>Daftar Pegawai</h1>
  <?php require 'pegawai/tabel_pegawai.php'; ?>

</div>

<!-- Landing page  dan tabel -->
<div class="container">
  <h1>Daftar Produk</h1>
  <?php require 'produk/tabel_produk.php'; ?>
<!-- tabel -->
</div>
<!-- Landing page  dan tabel -->
<div class="container">
  <h1>Transaksi Penjualan</h1>
  <?php require 'transaksi_penjualan/table_penjualan.php'; ?>
</div>
<div class="container">
  <h1>Transaksi Perkulakan</h1>
  <?php require 'transaksi_perkulakan/tabel_transaksi_perkulakan.php'; ?>
</div>
<div class="container">
  <h1>Transaksi Lainnya</h1>
  <?php require 'transaksi_lainnya/tabel_transaksi_lainnya.php'; ?>
</div>
<div class="container">
  <h1>Supplier</h1>
  <?php require 'supplier/tabel_supplier.php'; ?>
</div>