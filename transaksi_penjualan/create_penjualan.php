<!DOCTYPE html>
<html>
<head>
    <title>tambah penjualan</title>
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
    <h1>Transaksi Penjualan</h1>
    <form action="" method="POST">
        <label for="penjualan_retail">Retail :</label>
        <input type="text" id="penjualan_retail" name="penjualan_retail" required><br><br>
        <label for="penjualan_grosir">Grosir :</label>
        <input type="text" id="penjualan_grosir" name="penjualan_grosir" required><br><br>
        <label for="penjualan_aksesoris">Aksesoris :</label>
        <input type="text" id="penjualan_aksesoris" name="penjualan_aksesoris" required><br><br>
        <label for="pegawai_id_pegawai">Pegawai :</label>
        <select id="pegawai_id_pegawai" name="pegawai_id_pegawai" required>
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
        </select><br><br>
        
        <label for="pegawai_id_manajer">Manajer :</label>
        <select id="pegawai_id_manajer" name="pegawai_id_manajer" required>
            <option value="">Pilih manajer</option>
            <?php
            // Membuat koneksi ke database
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // Memeriksa koneksi database
            if (!$conn) {
                die("Koneksi database gagal: " . mysqli_connect_error());
            }

            // Query untuk mengambil data pegawai dengan jabatan "manajer" dari tabel
            $sql = "SELECT id_pegawai, nama FROM pegawai WHERE jabatan = 'manajer'";
            $result = mysqli_query($conn, $sql);

            // Menghasilkan opsi dropdown berdasarkan data pegawai dengan jabatan "manajer"
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id_pegawai'] . "'>" . $row['nama'] . "</option>";
            }

            // Tutup koneksi database
            mysqli_close($conn);
            ?>
        </select><br><br>

        <input type="hidden" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d'); ?>">

        <button onclick="location.href='penjualan.php'">Kembali</button>
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
        header("Location: penjualan.php"); // Redirect kembali ke halaman kelolaproduk.php
        exit();
    } else {
        // Terjadi kesalahan dalam penyimpanan data
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }

    // Tutup koneksi database
    mysqli_close($conn);
}
?>
