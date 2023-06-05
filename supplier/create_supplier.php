<!DOCTYPE html>
<html>
<head>
    <title>Add Supplier</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Add Supplier</h2>
        <form method="POST" action="create_supplier.php">
            <div class="form-group">
                <label for="nama_supplier">Nama Supplier:</label>
                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="no_telepon">No. Telepon:</label>
                <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Supplier</button>
        </form>
    </div>
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
