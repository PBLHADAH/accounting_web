<!DOCTYPE html>
<html>
<head>
    <title>Tambah Penjualan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Transaksi Penjualan</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="penjualan_retail">Retail:</label>
                <input type="text" class="form-control" id="penjualan_retail" name="penjualan_retail" required>
            </div>
            <div class="form-group">
                <label for="penjualan_grosir">Grosir:</label>
                <input type="text" class="form-control" id="penjualan_grosir" name="penjualan_grosir" required>
            </div>
            <div class="form-group">
                <label for="penjualan_aksesoris">Aksesoris:</label>
                <input type="text" class="form-control" id="penjualan_aksesoris" name="penjualan_aksesoris" required>
            </div>
            <div class="form-group">
                <label for="pegawai_id_pegawai">Pegawai:</label>
                <select class="form-control" id="pegawai_id_pegawai" name="pegawai_id_pegawai" required>
                    <option value="">Pilih pegawai</option>
                    <?php
                    // Koneksi ke database
                    require 'koneksi.php';

                    // Membuat koneksi ke database
                    $conn = mysqli_connect($servername, $username, $password, $dbname);

                    // Memeriksa koneksi database
                    if (!$conn) {
                        die("Koneksi database gagal: " . mysqli_connect_error());
                    }

                    // Query untuk mengambil data pegawai dengan jabatan "pegawai" dari tabel
                    $sql = "SELECT id_pegawai, nama FROM pegawai WHERE jabatan = 'pegawai'";
                    $result = mysqli_query($conn, $sql);

                    // Menghasilkan opsi dropdown berdasarkan data pegawai dengan jabatan "pegawai"
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['id_pegawai'] . "'>" . $row['nama'] . "</option>";
                    }

                    // Tutup koneksi database
                    mysqli_close($conn);
                    ?>
                </select>
            </div>
            <input type="hidden" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
            <button class="btn btn-primary" onclick="location.href='../penjualan.php'">Kembali</button>
            <input type="submit" name="submit" value="Konfirmasi" class="btn btn-success">
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    session_start();
    $penjualan_retail = $_POST['penjualan_retail'];
    $penjualan_grosir = $_POST['penjualan_grosir'];
    $penjualan_aksesoris = $_POST['penjualan_aksesoris'];
    $pegawai_id_pegawai = $_POST['pegawai_id_pegawai'];
    $pencatat_id = $_SESSION["userdata"]["id_pegawai"];;
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
$sql = "INSERT INTO transaksi_penjualan (penjualan_retail, penjualan_grosir, penjualan_aksesoris, pegawai_id_pegawai, pegawai_id_pencatat, tanggal) VALUES ('$penjualan_retail', '$penjualan_grosir', '$penjualan_aksesoris', '$pegawai_id_pegawai', '$pencatat_id', '$tanggal')";

    if (mysqli_query($conn, $sql)) {
        // Penyimpanan berhasil
        header("Location: ../penjualan.php"); // Redirect kembali ke halaman kelolaproduk.php
        exit();
    } else {
        // Terjadi kesalahan dalam penyimpanan data
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }

    // Tutup koneksi database
    mysqli_close($conn);
}
?>
