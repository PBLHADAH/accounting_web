<?php
include '../koneksi.php';

function sanitize($input)
{
    global $conn;
    $output = mysqli_real_escape_string($conn, $input);
    $output = htmlspecialchars($output);
    return $output;
}

// Retrieve available products
$query_produk = "SELECT * FROM produk";
$result_produk = $conn->query($query_produk);

// Retrieve available suppliers
$query_supplier = "SELECT * FROM supplier";
$result_supplier = $conn->query($query_supplier);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_produk = sanitize($_POST["id_produk"]);
    $id_supplier = sanitize($_POST["id_supplier"]);
    $tanggal = sanitize($_POST["tanggal"]);
    $jumlah = sanitize($_POST["jumlah"]);
    session_start();
    $pencatat = $_SESSION["userdata"]["id_pegawai"];
    $sql = "INSERT INTO transaksi_perkulakan (produk_id_produk, supplier_id_supplier, tanggal, kuantitas, pegawai_id_pencatat) VALUES ('$id_produk', '$id_supplier', '$tanggal', '$jumlah', '$pencatat')";

    if ($conn->query($sql) === TRUE) {
        echo "Transaksi added successfully.";
        header("Location: ../perkulakan.php");
    } else {
        echo "Error adding transaksi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Transaksi | Aldyz Cell</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
     
    <!-- icon ico -->
   <?php
  $iconPath = '../index/book2.ico';
  echo '<link rel="icon" type="image/x-icon" href="' . $iconPath . '">';
  ?>

  <style>
       /* CSS code here */
       body {
            background-color: #f2f2f2;
        }
        .container {
            margin-top: 50px;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
  </style>

</head>
<body>
    <div class="container">
        <h2>Add Transaksi</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="id_produk">Produk:</label>
                <select class="form-control" name="id_produk">
                    <?php
                    while ($row_produk = $result_produk->fetch_assoc()) {
                        echo "<option value='" . $row_produk['id_produk'] . "'>" . $row_produk['nama_produk'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_supplier">Supplier:</label>
                <select class="form-control" name="id_supplier">
                    <?php
                    while ($row_supplier = $result_supplier->fetch_assoc()) {
                        echo "<option value='" . $row_supplier['id_supplier'] . "'>" . $row_supplier['nama_supplier'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input class="form-control" type="date" name="tanggal">
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input class="form-control" type="number" name="jumlah">
            </div>
            <button class="btn btn-primary" type="submit">Add</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
