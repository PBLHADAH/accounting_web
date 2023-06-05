<?php
include '../koneksi.php';

$id_perkulakan = $_GET['id_perkulakan'];

$sql = "DELETE FROM transaksi_perkulakan WHERE id_transaksi_perkulakan='$id_perkulakan'";

if ($conn->query($sql) === TRUE) {
    echo "Transaksi deleted successfully.";
    header("Location: ../perkulakan.php");
} else {
    echo "Error deleting transaksi: " . $conn->error;
}

$conn->close();
?>
