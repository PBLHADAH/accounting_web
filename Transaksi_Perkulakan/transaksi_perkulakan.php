<?php
include '../koneksi.php';

// Retrieve data from the 'transaksi_perkulakan' table
$sql = "SELECT * FROM transaksi_perkulakan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Perkulakan Table</title>
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
    </style>
</head>
<body>
    <h2>Transaksi Perkulakan Table</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Pegawai ID Pegawai</th>
                <th>Tanggal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Display rows from the 'transaksi_perkulakan' table
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id_transaksi_perkulakan'] . "</td>";
                echo "<td>" . $row['pegawai_id_pegawai'] . "</td>";
                echo "<td>" . $row["tanggal"] . "</td>";
                echo "<td><a href='edit_transaksi_perkulakan.php?id_transaksi_perkulakan=" . $row['id_transaksi_perkulakan'] . "'>Edit</a> | <a href='delete_transaksi_perkulakan.php?id_transaksi_perkulakan=" . $row['id_transaksi_perkulakan'] . "'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <a href="create_transaksi_perkulakan.php">Create Transaksi Perkulakan</a>
</body>
</html>
