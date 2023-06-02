<?php
require_once "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id_transaksi"])) {
        $id_transaksi = $_GET["id_transaksi"];

        $deleteSql = "DELETE FROM transaksi_lainnya WHERE id_transaksi_lainnya='$id_transaksi'";

        if ($conn->query($deleteSql) === TRUE) {
            header('Location: transaksi_lainnya.php'); // ganti
        } else {
            echo "Error deleting transaction: " . $conn->error;
        }
    }
}

$conn->close();
?>
