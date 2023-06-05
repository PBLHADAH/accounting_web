<?php
require_once "koneksi.php";

$sql = "SELECT DATE(tp.tanggal) AS tanggal, 
        SUM(tp.penjualan_retail + tp.penjualan_grosir + tp.penjualan_aksesoris + tl.nominal) AS pemasukan,
        SUM(tpk.kuantitas * pr.harga_produk * -1) AS pengeluaran,
        SUM(tp.penjualan_retail + tp.penjualan_grosir + tp.penjualan_aksesoris + tl.nominal) 
        + SUM(tpk.kuantitas * pr.harga_produk * -1) AS subtotal
        FROM transaksi_penjualan tp
        LEFT JOIN transaksi_lainnya tl ON DATE(tp.tanggal) = DATE(tl.tanggal)
        INNER JOIN transaksi_perkulakan tpk ON DATE(tp.tanggal) = DATE(tpk.tanggal)
        INNER JOIN produk pr ON tpk.produk_id_produk = pr.id_produk
        GROUP BY DATE(tp.tanggal)";
$result = $conn->query($sql);
?>

<table>
    <!-- Table headers -->
    <h1>Transaksi Harian</h1>
    <thead>
        <tr>
            <th>Date</th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['tanggal'] . "</td>";
            echo "<td> Rp." . number_format($row['pemasukan'], 0, ',', '.') . "</td>";
            echo "<td> Rp." . number_format($row['pengeluaran'], 0, ',', '.') . "</td>";
            echo "<td> Rp." . number_format($row['subtotal'], 0, ',', '.') . "</td>";
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