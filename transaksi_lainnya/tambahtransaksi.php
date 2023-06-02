<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Transaksi lainnya</h1>
<form method="POST" action="transaksilainnya.php">
      <label for="deskripsi">deskripsi :</label>
      <input type="text" id="deskripsi" name="deskripsi" required><br><br>
      <label for="pegawai_id_pegawai">pegawai_id_pegawai :</label>
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

        // Query untuk mengambil data pegawai dari tabel
        $sql = "SELECT id_pegawai, nama FROM pegawai";
        $result = mysqli_query($conn, $sql);

        // Menghasilkan opsi dropdown berdasarkan data pegawai
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<option value='" . $row['id_pegawai'] . "'>" . $row['nama'] . "</option>";
        }

        // Tutup koneksi database
        mysqli_close($conn);
        ?>
      </select><br><br>
      
      <input type="hidden" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
      
      <input type="submit" name="konfirmasi" value="Konfirmasi">
      <button onclick="location.href='kelolaproduk.php'">Kembali</button>
    </form>
</body>
</html>
<?php
if (isset($_POST['konfirmasi'])) {
$deskripsi = $_POST['deskripsi'];
$pegawai_id_pegawai = $_POST['pegawai_id_pegawai'];
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
$sql = "INSERT INTO transaksi_lainnya (deskripsi, pegawai_id_pegawai, tanggal) VALUES ('$deskripsi', '$pegawai_id_pegawai', '$tanggal')";
if (mysqli_query($conn, $sql)) {
    // Penyimpanan berhasil
    header("Location: kelolaproduk.php"); // Redirect kembali ke halaman kelolaproduk.php
    exit();
} else {
    // Terjadi kesalahan dalam penyimpanan data
    echo "Gagal menyimpan data: " . mysqli_error($conn);
}

// Tutup koneksi database
mysqli_close($conn);
}
?>

