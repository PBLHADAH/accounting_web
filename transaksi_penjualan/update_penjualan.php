<!DOCTYPE html>
<html>
<head>
    <title>Ubah Penjualan</title>
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
    <h1>Ubah Transaksi Penjualan</h1>
    <?php
    require_once "../koneksi.php";

    // Mengecek apakah ID transaksi diberikan dalam parameter URL
    if (isset($_GET['id_transaksi'])) {
        $id_transaksi = $_GET['id_transaksi'];

        // Membuat koneksi ke database
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Memeriksa koneksi database
        if (!$conn) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }

        // Query untuk mendapatkan data transaksi berdasarkan ID transaksi
        $sql = "SELECT * FROM transaksi_penjualan WHERE id_transaksi_penjualan='$id_transaksi'";
        $result = mysqli_query($conn, $sql);

        // Memeriksa apakah data transaksi ditemukan
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Menampilkan form untuk mengubah data transaksi
            ?>
            <form action="" method="POST">
                <input type="hidden" name="id_transaksi" value="<?php echo $row['id_transaksi_penjualan']; ?>">
                <label for="penjualan_retail">Retail:</label>
                <input type="text" id="penjualan_retail" name="penjualan_retail" value="<?php echo $row['penjualan_retail']; ?>" required><br><br>
                <label for="penjualan_grosir">Grosir:</label>
                <input type="text" id="penjualan_grosir" name="penjualan_grosir" value="<?php echo $row['penjualan_grosir']; ?>" required><br><br>
                <label for="penjualan_aksesoris">Aksesoris:</label>
                <input type="text" id="penjualan_aksesoris" name="penjualan_aksesoris" value="<?php echo $row['penjualan_aksesoris']; ?>" required><br><br>
                <label for="pegawai_id_pegawai">Pegawai:</label>
                <select id="pegawai_id_pegawai" name="pegawai_id_pegawai" required>
                    <?php
                    // Query untuk mengambil data pegawai dengan jabatan "pegawai" dari tabel
                    $sql = "SELECT id_pegawai, nama FROM pegawai WHERE jabatan = 'pegawai'";
                    $result = mysqli_query($conn, $sql);

                    // Menghasilkan opsi dropdown berdasarkan data pegawai dengan jabatan "pegawai"
                    while ($pegawai = mysqli_fetch_assoc($result)) {
                        $selected = ($pegawai['id_pegawai'] == $row['pegawai_id_pegawai']) ? "selected" : "";
                        echo "<option value='" . $pegawai['id_pegawai'] . "' $selected>" . $pegawai['nama'] . "</option>";
                    }
                    ?>
                </select><br><br>
                <label for="pegawai_id_manajer">Manajer:</label>
                <select id="pegawai_id_manajer" name="pegawai_id_manajer" required>
                    <?php
                    // Query untuk mengambil data pegawai dengan jabatan "manajer" dari tabel
                    $sql = "SELECT id_pegawai, nama FROM pegawai WHERE jabatan = 'manajer'";
                    $result = mysqli_query($conn, $sql);

                    // Menghasilkan opsi dropdown berdasarkan data pegawai dengan jabatan "manajer"
                    while ($pegawai = mysqli_fetch_assoc($result)) {
                        $selected = ($pegawai['id_pegawai'] == $row['pegawai_id_manajer']) ? "selected" : "";
                        echo "<option value='" . $pegawai['id_pegawai'] . "' $selected>" . $pegawai['nama'] . "</option>";
                    }
                    ?>
                </select><br><br>
                <input type="hidden" id="tanggal" name="tanggal" value="<?php echo $row['tanggal']; ?>">
                <button onclick="location.href='Table_penjualan.php'">Kembali</button>
                <input type="submit" name="submit" value="Simpan Perubahan">
            </form>
            <?php
        } else {
            echo "Transaksi tidak ditemukan.";
        }

        // Tutup koneksi database
        mysqli_close($conn);
    } else {
        echo "ID transaksi tidak diberikan.";
    }
    ?>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $id_transaksi = $_POST['id_transaksi'];
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

    // Query untuk mengupdate data transaksi berdasarkan ID transaksi
    $sql = "UPDATE transaksi_penjualan SET penjualan_retail='$penjualan_retail', penjualan_grosir='$penjualan_grosir', penjualan_aksesoris='$penjualan_aksesoris', pegawai_id_pegawai='$pegawai_id_pegawai', pegawai_id_manajer='$pegawai_id_manajer', tanggal='$tanggal' WHERE id_transaksi_penjualan='$id_transaksi'";

    if (mysqli_query($conn, $sql)) {
        // Perubahan berhasil
        header("Location: Table_penjualan.php"); // Redirect kembali ke halaman Table_penjualan.php
        exit();
    } else {
        // Terjadi kesalahan dalam melakukan perubahan data
        echo "Gagal melakukan perubahan data: " . mysqli_error($conn);
    }

    // Tutup koneksi database
    mysqli_close($conn);
}
?>
