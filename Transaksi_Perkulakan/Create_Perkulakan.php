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
    <title>Add Transaksi</title>
</head>
<body>
    <h2>Add Transaksi</h2>
    <form action="" method="post">
        <label for="id_produk">Produk:</label>
        <select name="id_produk">
            <?php
            while ($row_produk = $result_produk->fetch_assoc()) {
                echo "<option value='" . $row_produk['id_produk'] . "'>" . $row_produk['nama_produk'] . "</option>";
            }
            ?>
        </select><br><br>
        <label for="id_supplier">Supplier:</label>
        <select name="id_supplier">
            <?php
            while ($row_supplier = $result_supplier->fetch_assoc()) {
                echo "<option value='" . $row_supplier['id_supplier'] . "'>" . $row_supplier['nama_supplier'] . "</option>";
            }
            ?>
        </select><br><br>
        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal"><br><br>
        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah"><br><br>
        <input type="submit" value="Add">
    </form>
</body>
</html>

<?php
$conn->close();
?>
