<!DOCTYPE html>
<html>
<head>
    <title>tambah penjualan.</title>
    <style>
        /* Style untuk button */
        button {
            padding: 10px 20px;
            background-color: #2268EF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #1d54bf;
        }

        /* Style untuk input */
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #2268EF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #1d54bf;
        }
    </style>
</head>
<body>
    <h2>Edit Transaction</h2>
    <?php
    require_once "../koneksi.php";

            // Memeriksa koneksi database
            if (!$conn) {
                die("Koneksi database gagal: " . mysqli_connect_error());
            }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_transaksi_penjualan = sanitize($_POST["id_transaksi_penjualan"]);
        $penjualan_retail = sanitize($_POST["penjualan_retail"]);
        $penjualan_aksesoris = sanitize($_POST["penjualan_aksesoris"]);
        $pegawai_id_pegawai = sanitize($_POST["pegawai_id_pegawai"]);
        $pegawai_id_manajer = sanitize($_POST["pegawai_id_pegawai"]);
        


        $sql = "UPDATE transaksi_lainnya SET penjualan_retail='$penjualan_retail', penjualan_aksesoris='$penjualan_aksesoris', pegawai_id_pegawai_pegawai='$pegawai_id_pegawai', WHERE id_transaksi_penjualan_lainnya='$id_transaksi_penjualan'";

        if ($conn->query($sql) === TRUE) {
            header('Location: transaksi_lainnya.php'); // ganti
        } else {
            echo "Error updating transaction: " . $conn->error;
        }
    } else {
        $id_transaksi_penjualan = $_GET['id_transaksi_penjualan'];

        $sql = "SELECT * FROM transaksi_lainnya WHERE id_transaksi_penjualan_lainnya='$id_transaksi_penjualan'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>

    <form action="edit_transaksi.php" method="post">
        <input type="hidden" name="id_transaksi_penjualan" value="<?php echo $row['id_transaksi_penjualan_lainnya']; ?>">
        <label for="penjualan_retail">penjualan_retail:</label><br>
        <input type="text" name="penjualan_retail" value="<?php echo $row['penjualan_retail']; ?>"><br><br>
        <label for="penjualan_aksesoris">penjualan_aksesoris:</label><br>
        <input type="number" name="penjualan_aksesoris" value="<?php echo $row['penjualan_aksesoris']; ?>"><br><br>
        <label for="pegawai_id_pegawai">Pegawai ID:</label><br>
        <select id="pegawai_id_pegawai" name="pegawai_id_pegawai" required>
        <?php
        $sql = "SELECT id_pegawai, nama FROM pegawai";
        $result = mysqli_query($conn, $sql);

        while ($pegawai = mysqli_fetch_assoc($result)) {
            $selected = ($pegawai['id_pegawai'] == $row['pegawai_id_pegawai_pegawai']) ? "selected" : "";
            echo "<option value='" . $pegawai['id_pegawai'] . "' " . $selected . ">" . $pegawai['nama'] . "</option>";
        }
        ?>
        </select><br><br>

        <input type="hidden" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d'); ?>">

        <button onclick="location.href='Table_penjualan.php'">Kembali</button>
        <input type="submit" name="submit" value="Konfirmasi">
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $penjualan_retail = $_POST['penjualan_retail'];
    $penjualan_grosir = $_POST['penjualan_grosir'];
    $penjualan_aksesoris = $_POST['penjualan_aksesoris'];
    $pegawai_id_pegawai = $_POST['pegawai_id_pegawai'];
    $pegawai_id_manajer = $_POST['pegawai_id_manajer'];
    $tanggal = $_POST['tanggal'];

    // Koneksi ke database
    require 'koneksi.php';

    // Membuat koneksi ke database
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Memeriksa koneksi database
    if (!$conn) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Query untuk menyimpan data produk ke tabel
    // Query untuk menyimpan data produk ke tabel
// Query untuk menyimpan data produk ke tabel
$sql = "INSERT INTO transaksi_penjualan (penjualan_retail, penjualan_grosir, penjualan_aksesoris, pegawai_id_pegawai, pegawai_id_manajer, tanggal) VALUES ('$penjualan_retail', '$penjualan_grosir', '$penjualan_aksesoris', '$pegawai_id_pegawai', '$pegawai_id_manajer', '$tanggal')";

    if (mysqli_query($conn, $sql)) {
        // Penyimpanan berhasil
        header("Location: Table_penjualan.php"); // Redirect kembali ke halaman kelolaproduk.php
        exit();
    } else {
        // Terjadi kesalahan dalam penyimpanan data
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }

    // Tutup koneksi database
    mysqli_close($conn);
}
?>