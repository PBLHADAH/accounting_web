<?php
include '../koneksi.php';

$id_transaksi = $_GET['id_transaksi'];

$sql = "DELETE FROM transaksi_perkulakan WHERE id_transaksi='$id_transaksi'";

if ($conn->query($sql) === TRUE) {
    echo "Transaksi deleted successfully.";
    header("Location: ../transaksi_perkulakan.php");
} else {
    echo "Error deleting transaksi: " . $conn->error;
}

$conn->close();
?>
