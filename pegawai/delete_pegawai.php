<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id_pegawai"])) {
        $id_pegawai = $_GET["id_pegawai"];

        $deleteSql = "DELETE FROM pegawai WHERE id_pegawai='$id_pegawai'";

        if ($conn->query($deleteSql) === TRUE) {
            echo "Record deleted successfully.";
            header("Location: pegawai.php");
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>
