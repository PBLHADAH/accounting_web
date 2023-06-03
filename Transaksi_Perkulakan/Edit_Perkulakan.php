<!DOCTYPE html>
<html>
<head>
    <title>Edit Transaksi Perkulakan</title>
</head>
<body>
    <h2>Edit Transaksi Perkulakan</h2>
    <?php
    // Establish a connection to the database
    include '../koneksi.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET["id_transaksi_perkulakan"])) {
            $id_transaksi_perkulakan = $_GET["id_transaksi_perkulakan"];

            $selectSql = "SELECT * FROM transaksi_perkulakan WHERE id_transaksi_perkulakan='$id_transaksi_perkulakan'";
            $result = $conn->query($selectSql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();

                echo "<form method='POST'>";
                echo "<input type='hidden' name='id_transaksi_perkulakan' value='" . $row['id_transaksi_perkulakan'] . "'>";
                echo "<label>Pegawai ID Pegawai:</label>";
                echo "<input type='number' name='pegawai_id_pegawai' value='" . $row['pegawai_id_pegawai'] . "' required><br><br>";
                echo "<label>Tanggal:</label>";
                echo "<input type='datetime-local' name='tanggal' value='" . $row['tanggal'] . "' required><br><br>";
                echo "<input type='submit' value='Update'>";
                echo "</form>";
            } else {
                echo "Record not found.";
            }
        }
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the entered data
        $id_transaksi_perkulakan = $_POST['id_transaksi_perkulakan'];
        $pegawai_id_pegawai = $_POST['pegawai_id_pegawai'];
        $tanggal = $_POST['tanggal'];

        // Update the transaction in the database
        $updateSql = "UPDATE transaksi_perkulakan SET pegawai_id_pegawai='$pegawai_id_pegawai', tanggal='$tanggal' WHERE id_transaksi_perkulakan='$id_transaksi_perkulakan'";

        if ($conn->query($updateSql) === TRUE) {
            echo "Transaksi Perkulakan updated successfully.";
            header("Location: transaksi_perkulakan.php");
        } else {
            echo "Error updating Transaksi Perkulakan: " . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
