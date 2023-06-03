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
    .add-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: ##1d54bf;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .add-link:hover {
            background-color: #1d54bf;
        }
        /* Style untuk judul dan tautan */
        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .add-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #2268EF;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .add-link:hover {
            background-color: #1d54bf;
        }
        /* Style untuk judul dan tautan */
        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .action-separator {
            margin: 0 5px;
        }
	</style>
</head>
<body>
    <div class="header-container">
        <h2>Penjualan</h2>
        <a href="create_penjualan.php" class="add-link">Tambah Penjualan</a>
    </div>
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
                echo "<span class=\"action-separator\">|</span>";
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
