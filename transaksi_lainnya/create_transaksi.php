<!DOCTYPE html>
<html>
<head>
    <title>Create Transaction</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
    <?php
  $iconPath = '../index/book2.ico';
  echo '<link rel="icon" type="image/x-icon" href="' . $iconPath . '">';
  ?>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 500px;
            margin-top: 50px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 3px;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
    </style>
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