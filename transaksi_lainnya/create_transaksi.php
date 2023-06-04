<!DOCTYPE html>
<html>
<head>
    <title>Create Transaction</title>
</head>
<body>
    <h2>Create Transaction</h2>
    <form action="" method="POST">
        <label for="deskripsi">Deskripsi:</label><br>
        <input type="text" name="deskripsi" required><br><br>
        <label for="nominal">Nominal:</label><br>
        <input type="number" name="nominal" required><br><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
<?php
require_once "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $deskripsi = $_POST['deskripsi'];
    $nominal = $_POST['nominal'];
    $pencatat_id = $_SESSION["userdata"]["id_pegawai"];

    $sql = "INSERT INTO transaksi_lainnya (deskripsi, nominal, pegawai_id_pencatat) VALUES ('$deskripsi', '$nominal', '$pencatat_id')";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../lainnya.php');// ganti
    } else {
        echo "Error creating transaction: " . $conn->error;
    }

    $conn->close();
}
?>