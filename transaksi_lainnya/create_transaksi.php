<!DOCTYPE html>
<html>
<head>
    <title>Create Transaction</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Create Transaction</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <input class="form-control" type="text" name="deskripsi" required>
            </div>
            <div class="form-group">
                <label for="nominal">Nominal:</label>
                <input class="form-control" type="number" name="nominal" required>
            </div>
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php
require_once "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $deskripsi = $_POST['deskripsi'];
    $nominal = $_POST['nominal'];
    $pencatat_id = $_SESSION["userdata"]["id_pegawai"];
    $tanggal = date('Y-m-d');

    $sql = "INSERT INTO transaksi_lainnya (deskripsi, nominal, pegawai_id_pencatat, tanggal) VALUES ('$deskripsi', '$nominal', '$pencatat_id', '$tanggal')";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../lainnya.php');// ganti
    } else {
        echo "Error creating transaction: " . $conn->error;
    }

    $conn->close();
}
?>