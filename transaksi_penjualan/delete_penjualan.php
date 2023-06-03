<?php
require_once "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id_transaksi"])) {
        $id_transaksi = $_GET["id_transaksi"];

        $deleteSql = "DELETE FROM transaksi_penjualan WHERE id_transaksi_penjualan='$id_transaksi'";

        if ($conn->query($deleteSql) === TRUE) {
            header('Location: penjualan.php'); // ganti
        } else {
            echo "Error deleting transaction: " . $conn->error;
        }
    }
}

$conn->close();
?>
