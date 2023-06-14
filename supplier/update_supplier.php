<?php
include 'koneksi.php';

function sanitize($input)
{
    global $conn;
    $output = mysqli_real_escape_string($conn, $input);
    $output = htmlspecialchars($output);
    return $output;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_supplier = sanitize($_POST["id_supplier"]);
    $nama_supplier = sanitize($_POST["nama_supplier"]);
    $alamat = sanitize($_POST["alamat"]);
    $no_telepon = sanitize($_POST["no_telepon"]);

    $sql = "UPDATE supplier SET nama_supplier='$nama_supplier', alamat_supplier='$alamat', no_telepon='$no_telepon' WHERE id_supplier='$id_supplier'";

    if ($conn->query($sql) === TRUE) {
        echo "Supplier updated successfully.";
        header("Location: ../supplier.php");
    } else {
        echo "Error updating supplier: " . $conn->error;
    }
} else {
    $id_supplier = $_GET['id_supplier'];

    $sql = "SELECT * FROM supplier WHERE id_supplier='$id_supplier'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Supplier | Aldyz Cell</title>
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
        <h2>Edit Supplier</h2>
        <form action="update_supplier.php" method="post">
            <input type="hidden" name="id_supplier" value="<?php echo $row['id_supplier']; ?>">
            <div class="form-group">
                <label for="nama_supplier">Nama Supplier:</label>
                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="<?php echo $row['nama_supplier']; ?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['alamat_supplier']; ?>">
            </div>
            <div class="form-group">
                <label for="no_telepon">No. Telepon:</label>
                <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?php echo $row['no_telepon']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
