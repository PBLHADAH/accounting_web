<!DOCTYPE html>
<html>
<head>
    <title>Add Supplier | Aldyz Cell</title>
  
  <?php
  $iconPath = 'book2.ico';
  echo '<link rel="icon" type="image/x-icon" href="' . $iconPath . '">';
  ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 40px;
        }

        .container {
            max-width: 400px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            margin: 0 auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
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
        <h2>Add Supplier</h2>
        <form method="POST" action="create_supplier.php">
            <div class="form-group">
                <label for="nama_supplier">Nama Supplier:</label>
                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="no_telepon">No. Telepon:</label>
                <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Supplier</button>
        </form>
    </div>
</body>
</html>

<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_supplier = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];

    $sql = "INSERT INTO supplier (nama_supplier, alamat_supplier, no_telepon) VALUES ('$nama_supplier', '$alamat', '$no_telepon')";

    if ($conn->query($sql) === TRUE) {
        echo "Supplier added successfully.";
        header("Location: ../supplier.php");
    } else {
        echo "Error adding supplier: " . $conn->error;
    }
}

$conn->close();
?>
