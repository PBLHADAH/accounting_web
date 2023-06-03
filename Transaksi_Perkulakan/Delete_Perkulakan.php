<?php
// Establish a connection to the database
require '../koneksi.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve the transaction ID from the URL parameter
    if (isset($_GET["id_transaksi_perkulakan"])) {
        $id_transaksi_perkulakan = $_GET["id_transaksi_perkulakan"];

        // Delete the transaction from the database
        $deleteSql = "DELETE FROM transaksi_perkulakan WHERE id_transaksi_perkulakan='$id_transaksi_perkulakan'";
        if ($conn->query($deleteSql) === TRUE) {
            echo "Transaction deleted successfully.";
            header("Location: transaksi_perkulakan.php");
            exit();
        } else {
            echo "Error deleting transaction: " . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>
