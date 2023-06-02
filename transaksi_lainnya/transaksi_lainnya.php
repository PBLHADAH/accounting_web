<?php
require_once "../koneksi.php";

$sql = "SELECT * FROM transaksi_lainnya";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transactions</title>
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
    <h2>Transactions</h2>
    <a href="create_transaksi.php">Create Transaction</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Deskripsi</th>
                <th>Nominal</th>
                <th>Pegawai ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id_transaksi_lainnya'] . "</td>";
                echo "<td>" . $row['deskripsi'] . "</td>";
                echo "<td>" . $row['nominal'] . "</td>";
                echo "<td>" . $row['pegawai_id_pegawai'] . "</td>";
                echo "<td>";
                echo "<a href=\"edit_transaksi.php?id_transaksi=" . $row['id_transaksi_lainnya'] . "\">Edit</a>";
                echo "<a href=\"delete_transaksi.php?id_transaksi=" . $row['id_transaksi_lainnya'] . "\" onclick=\"return confirm('Are you sure?');\">Delete</a>";
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
