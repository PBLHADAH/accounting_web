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

    .header-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    h2 {
        margin: 0;
    }

    .add-link {
        background-color: #007bff;
        color: #fff;
        padding: 5px 14px;
        text-decoration: none;
        border-radius: 4px;
    }

    .add-link:hover {
        background-color: #0069d9;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ccc;
    }

    th {
        background-color: #f8f8f8;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .action-separator {
        margin: 0 5px;
    }

    a {
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
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
                echo "<a href=\"transaksi_penjualan/delete_penjualan.php?id_transaksi=" . $row['id_transaksi_penjualan'] . "\" onclick=\"return confirm('Are you sure?');\">Delete</a>";
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
