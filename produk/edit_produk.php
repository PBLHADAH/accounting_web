<?php
// Ubah variabel koneksi ke database sesuai dengan konfigurasi Anda
require 'koneksi.php';

// Membuat koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi database
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Periksa apakah parameter id_produk diterima melalui URL
if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    // Query untuk mendapatkan data produk berdasarkan id_produk
    $sql = "SELECT id_produk, nama_produk, harga_produk, supplier FROM produk WHERE id_produk = $id_produk";
    $result = mysqli_query($conn, $sql);

    // Memeriksa apakah data produk ditemukan
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $nama_produk = $row['nama_produk'];
        $harga_produk = $row['harga_produk'];
        $supplier = $row['supplier'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Produk</title>
</head>
<body>
  <h1>Edit Produk</h1>
  <form method="POST" action="edit_produk.php">
    <label for="nama_produk">Nama Produk:</label>
    <input type="text" id="nama_produk" name="nama_produk" value="<?php echo $nama_produk; ?>" required><br><br>
    
    <label for="harga_produk">Harga Produk:</label>
    <input type="text" id="harga_produk" name="harga_produk" value="<?php echo $harga_produk; ?>" required><br><br>
    
    <label for="supplier">Supplier:</label>
    <input type="text" id="supplier" name="supplier" value="<?php echo $supplier; ?>" required><br><br>
    
    <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
    <input type="submit" name="konfirmasi" value="Konfirmasi">
    <button onclick="location.href='kelolaproduk.php'">Kembali</button>
  </form>
</body>
</html>
<?php
        // Periksa apakah form dikirimkan
        if (isset($_POST['konfirmasi'])) {
            $id_produk = $_POST['id_produk'];
            $nama_produk = $_POST['nama_produk'];
            $harga_produk = $_POST['harga_produk'];
            $supplier = $_POST['supplier'];

            // Query untuk mengupdate data produk
            $sql = "UPDATE produk SET nama_produk = '$nama_produk', harga_produk = '$harga_produk', supplier = '$supplier' WHERE id_produk = $id_produk";

            if (mysqli_query($conn, $sql)) {
                echo "Data produk berhasil diperbarui.";
            } else {
                echo "Gagal memperbarui data produk: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Data produk tidak ditemukan.";
    }
} else {
    echo "Parameter id_produk tidak ditemukan.";
}

// Tutup koneksi database
mysqli_close($conn);
?>
