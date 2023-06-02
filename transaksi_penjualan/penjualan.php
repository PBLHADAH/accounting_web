<?php
require_once "../koneksi.php";

$sql = "SELECT * FROM transaksi_penjualan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Penjualan</title>
    <style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		tr:hover {
			background-color: #f5f5f5;
		}
		th {
			background-color: #353A40;
			color: white;
		}
	</style>
</head>
<body>
    <h2>Transactions</h2>
    <a href="">tambah_penjualan</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>penjualan retail</th>
                <th>penjualan grosir</th>
                <th>Pegawai ID</th>
                <th>Mnajer ID</th>
                <th>Tanggal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id_transaksi_penjualan'] . "</td>";
                echo "<td>" . $row['penjualan_retail'] . "</td>";
                echo "<td>" . $row['penjualan_grosir'] . "</td>";
                echo "<td>" . $row['pegawai_id_pegawai'] . "</td>";
                echo "<td>" . $row['pegawai_id_manajer'] . "</td>";
                echo "<td>" . $row['tanggal'] . "</td>";
                echo "<td>";
                echo "<a href=\"edit_transaksi.php?id_transaksi=" . $row['id_transaksi_penjualan'] . "\">Edit</a>";
                echo "<a href=\"delete_transaksi.php?id_transaksi=" . $row['id_transaksi_penjualan'] . "\" onclick=\"return confirm('Are you sure?');\">Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
$result->close();
$conn->close();
?>
