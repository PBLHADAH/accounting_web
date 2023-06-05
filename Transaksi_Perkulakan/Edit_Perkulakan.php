<?php
include '../koneksi.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $id_perkulakan = $_POST['id_perkulakan'];
    $tanggal = $_POST['tanggal'];
    $kuantitas = $_POST['kuantitas'];
    $produk_id_produk = $_POST['produk_id_produk'];
    $supplier_id_supplier = $_POST['supplier_id_supplier'];

    // Update the perkulakan transaction
    $update_query = "UPDATE transaksi_perkulakan
                    SET tanggal = '$tanggal', kuantitas = '$kuantitas', produk_id_produk = '$produk_id_produk', supplier_id_supplier = '$supplier_id_supplier'
                    WHERE id_transaksi_perkulakan = '$id_perkulakan'";

    if ($conn->query($update_query) === true) {
        echo "Perkulakan transaction updated successfully.";
        header("location: ../perkulakan.php");
    } else {
        echo "Error updating perkulakan transaction: " . $conn->error;
    }
}

// Check if the id_perkulakan parameter is provided
if (isset($_GET['id_perkulakan'])) {
    $id_perkulakan = $_GET['id_perkulakan'];

    // Retrieve the perkulakan transaction details
    $query_perkulakan = "SELECT tp.id_transaksi_perkulakan, tp.tanggal, tp.kuantitas, tp.pegawai_id_pencatat, tp.produk_id_produk, tp.supplier_id_supplier, pg.nama AS nama_pegawai, pr.nama_produk, s.nama_supplier
                        FROM transaksi_perkulakan tp
                        JOIN pegawai pg ON tp.pegawai_id_pencatat = pg.id_pegawai
                        JOIN produk pr ON tp.produk_id_produk = pr.id_produk
                        JOIN supplier s ON tp.supplier_id_supplier = s.id_supplier
                        WHERE tp.id_transaksi_perkulakan = '$id_perkulakan'";

    $result_perkulakan = $conn->query($query_perkulakan);

    if ($result_perkulakan === false) {
        echo "Error retrieving perkulakan transaction details: " . $conn->error;
        exit();
    }

    // Check if the perkulakan transaction exists
    if ($result_perkulakan->num_rows === 0) {
        echo "Perkulakan transaction not found.";
        exit();
    }

    $row_perkulakan = $result_perkulakan->fetch_assoc();
} else {
    echo "Missing id_perkulakan parameter.";
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Edit Perkulakan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Edit Perkulakan</h2>
        <form method="post">
            <input type="hidden" name="id_perkulakan" value="<?php echo $row_perkulakan['id_transaksi_perkulakan']; ?>">
            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input class="form-control" type="date" name="tanggal" value="<?php echo $row_perkulakan['tanggal']; ?>">
            </div>
            <div class="form-group">
                <label for="kuantitas">Kuantitas:</label>
                <input class="form-control" type="number" name="kuantitas" value="<?php echo $row_perkulakan['kuantitas']; ?>">
            </div>
            <div class="form-group">
                <label for="produk_id_produk">Nama Produk:</label>
                <select class="form-control" name="produk_id_produk">
                    <?php
                    // Retrieve the list of products
                    $query_produk = "SELECT * FROM produk";
                    $result_produk = $conn->query($query_produk);

                    if ($result_produk === false) {
                        echo "Error retrieving produk data: " . $conn->error;
                        exit();
                    }

                    while ($row_produk = $result_produk->fetch_assoc()) {
                        $selected = ($row_produk['id_produk'] == $row_perkulakan['produk_id_produk']) ? 'selected' : '';
                        echo "<option value='" . $row_produk['id_produk'] . "' $selected>" . $row_produk['nama_produk'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="supplier_id_supplier">Nama Supplier:</label>
                <select class="form-control" name="supplier_id_supplier">
                    <?php
                    // Retrieve the list of suppliers
                    $query_supplier = "SELECT * FROM supplier";
                    $result_supplier = $conn->query($query_supplier);

                    if ($result_supplier === false) {
                        echo "Error retrieving supplier data: " . $conn->error;
                        exit();
                    }

                    while ($row_supplier = $result_supplier->fetch_assoc()) {
                        $selected = ($row_supplier['id_supplier'] == $row_perkulakan['supplier_id_supplier']) ? 'selected' : '';
                        echo "<option value='" . $row_supplier['id_supplier'] . "' $selected>" . $row_supplier['nama_supplier'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
