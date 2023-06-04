<?php
require 'koneksi.php';

$query = "SELECT * FROM supplier";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Supplier Table</title>
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
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id_supplier'] . "</td>";
                echo "<td>" . $row['nama_supplier'] . "</td>";
                echo "<td>" . $row['alamat_supplier'] . "</td>";
                echo "<td>" . $row['no_telepon'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
