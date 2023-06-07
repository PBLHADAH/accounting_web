<?php
include 'koneksi.php';

$sql = "SELECT * FROM supplier";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Supplier Details</title>
</head>
<body>
    <h2>Supplier Details</h2>
    <a href="supplier/create_supplier.php">Add Supplier</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Aksi</th>
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
                echo "<td>";
                echo "<a href=\"supplier/update_supplier.php?id_supplier=" . $row['id_supplier'] . "\">Edit</a>";
                echo "<span class=\"action-separator\">|</span>";
                echo "<a href=\"supplier/delete_supplier.php?id_supplier=" . $row['id_supplier'] . "\" onclick=\"return confirm('Are you sure?');\">Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conn->close();
?>
