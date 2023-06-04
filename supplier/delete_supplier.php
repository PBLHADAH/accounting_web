<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id_supplier"])) {
        $id_supplier = $_GET["id_supplier"];

        $deleteSql = "DELETE FROM supplier WHERE id_supplier='$id_supplier'";

        if ($conn->query($deleteSql) === TRUE) {
            echo "Supplier deleted successfully.";
            header("Location: ../supplier.php");
        } else {
            echo "Error deleting supplier: " . $conn->error;
        }
    }
}

$conn->close();
?>
