<?php
include 'koneksi.php';

function sanitize($input)
{
    global $conn;
    $output = mysqli_real_escape_string($conn, $input);
    $output = htmlspecialchars($output);
    return $output;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_supplier = sanitize($_POST["id_supplier"]);
    $nama_supplier = sanitize($_POST["nama_supplier"]);
    $alamat = sanitize($_POST["alamat"]);
    $no_telepon = sanitize($_POST["no_telepon"]);

    $sql = "UPDATE supplier SET nama_supplier='$nama_supplier', alamat_supplier='$alamat', no_telepon='$no_telepon' WHERE id_supplier='$id_supplier'";

    if ($conn->query($sql) === TRUE) {
        echo "Supplier updated successfully.";
        header("Location: ../supplier.php");
    } else {
        echo "Error updating supplier: " . $conn->error;
    }
} else {
    $id_supplier = $_GET['id_supplier'];

    $sql = "SELECT * FROM supplier WHERE id_supplier='$id_supplier'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Supplier</title>
</head>
<body>
    <h2>Edit Supplier</h2>
    <form action="update_supplier.php" method="post">
        <input type="hidden" name="id_supplier" value="<?php echo $row['id_supplier']; ?>">
        <label for="nama_supplier">Nama Supplier:</label>
        <input type="text" name="nama_supplier" value="<?php echo $row['nama_supplier']; ?>"><br><br>
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="<?php echo $row['alamat_supplier']; ?>"><br><br>
        <label for="no_telepon">No. Telepon:</label>
        <input type="text" name="no_telepon" value="<?php echo $row['no_telepon']; ?>"><br><br>
        <input type="submit" value="Update">
    </form>
</body
