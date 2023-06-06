<?php
require_once "koneksi.php";  

$sql = "SELECT tp.*, p1.nama AS nama_pegawai, p2.nama AS nama_manajer, 
        (tp.penjualan_retail + tp.penjualan_grosir + tp.penjualan_aksesoris) AS subtotal
        FROM transaksi_penjualan tp
        INNER JOIN pegawai p1 ON tp.pegawai_id_pegawai = p1.id_pegawai
        INNER JOIN pegawai p2 ON tp.pegawai_id_pencatat = p2.id_pegawai";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Penjualan</title>
    <style>
        /* CSS styles */

        /* ... */

    </style>
</head>
<body>
    <!-- HTML content -->

    <div class="header-container">
        <h2>Penjualan</h2>
        <a href="transaksi_penjualan/create_penjualan.php" class="add-link">Tambah Penjualan</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>penjualan retail</th>
                <th>penjualan grosir</th>
                <th>penjualan Aksesoris</th>
                <th>subtotal</th>
                <th>Pegawai</th>
                <th>Manajer</th>
                <th>Tanggal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id_transaksi_penjualan'] . "</td>";
                echo "<td> Rp." . number_format($row['penjualan_retail'], 0, ',', '.') . "</td>";
                echo "<td> Rp." . number_format($row['penjualan_grosir'], 0, ',', '.') . "</td>";
                echo "<td> Rp." . number_format($row['penjualan_aksesoris'], 0, ',', '.') . "</td>";
                echo "<td> Rp." . number_format($row['subtotal'], 0, ',', '.') . "</td>";
                echo "<td>" . $row['nama_pegawai'] . "</td>";
                echo "<td>" . $row['nama_manajer'] . "</td>";
                echo "<td>" . $row['tanggal'] . "</td>";
                echo "<td>";
                echo "<a href=\"transaksi_penjualan/update_penjualan.php?id_transaksi=" . $row['id_transaksi_penjualan'] . "\">Edit</a>";
                echo "<span class=\"action-separator\">|</span>";
                echo "<a href=\"transaksi_penjualan/delete_penjualan.php?id_transaksi=" . $row['id_transaksi_penjualan'] . "\" onclick=\"return confirm('Are you sure?');\"> Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- ... -->

</body>
</html>

<?php
$result->close();
$conn->close();
?>
