<!DOCTYPE html>
<html>
<head>
    <title>Add Supplier</title>
</head>
<body>
    <h2>Add Supplier</h2>
    <form method="POST" action="create_supplier.php">
        <label>Nama Supplier:</label>
        <input type="text" name="nama_supplier" required><br><br>
        <label>Alamat:</label>
        <input type="text" name="alamat" required><br><br>
        <label>No. Telepon:</label>
        <input type="text" name="no_telepon" required><br><br>
        <input type="submit" value="Add Supplier">
    </form>
</body>
</html>

<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_supplier = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];

    $sql = "INSERT INTO supplier (nama_supplier, alamat_supplier, no_telepon) VALUES ('$nama_supplier', '$alamat', '$no_telepon')";

    if ($conn->query($sql) === TRUE) {
        echo "Supplier added successfully.";
        header("Location: ../supplier.php");
    } else {
        echo "Error adding supplier: " . $conn->error;
    }
}

$conn->close();
?>
