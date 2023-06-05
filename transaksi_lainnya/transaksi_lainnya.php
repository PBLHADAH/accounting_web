<?php
require_once "koneksi.php";

$sql = "SELECT * FROM transaksi_lainnya";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Lainnya</title>
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

        form {
            display: inline-block;
        }
    </style>
</head>
<body>
    <h2>Transaksi Lainnya</h2>
    <a href="transaksi_lainnya/create_transaksi.php">Tambah Transaksi Lainnya</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Deskripsi</th>
                <th>Nominal</th>
                <th>Pencatat</th>
                <th>Tanggal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                $pencatat = mysqli_query($conn, "SELECT nama FROM pegawai WHERE id_pegawai=" . $row['pegawai_id_pencatat']);
                $pencatat_hasil = $pencatat->fetch_assoc();
                echo "<tr>";
                echo "<td>" . $row['id_transaksi_lainnya'] . "</td>";
                echo "<td>" . $row['deskripsi'] . "</td>";
                echo "<td> Rp." . number_format($row['nominal'], 0, ',', '.') . "</td>";
                echo "<td>" . $pencatat_hasil['nama'] . "</td>";
                echo "<td>" . $row['tanggal'] . "</td>";
                echo "<td>";
                echo "<a href=\"transaksi_lainnya/edit_transaksi.php?id_transaksi=" . $row['id_transaksi_lainnya'] . "\">Edit</a>";
                echo "<a href=\"transaksi_lainnya/delete_transaksi.php?id_transaksi=" . $row['id_transaksi_lainnya'] . "\" onclick=\"return confirm('Are you sure?');\">Delete</a>";
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
