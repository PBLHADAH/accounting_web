<!DOCTYPE html>
<html>
<body>
<h2>Register</h2>
<form action="login.php" method="POST">
  <label for="deskripsi">deskripsi:</label><br>
  <input type="text" id="deskripsi" name="deskripsi"><br>
  <label for="pegawai_id_pegawai">pegawai_id_pegawai</label><br>
  <select id="pegawai_id_pegawai" name="pegawai_id_pegawai">
    <?php
    require 'koneksi.php';
    // Query SQL untuk mendapatkan daftar pegawai dari tabel pegawai
    $sql = "SELECT id_pegawai, nama FROM pegawai";
    $result = $conn->query($sql);

    // Menampilkan opsi nama pegawai dalam dropdown
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['id_pegawai'] . '">' . $row['nama'] . '</option>';
    }
    ?>
  </select><br><br>
  <input type="submit" name="submit" value="Submit">
</form>

<?php
require 'koneksi.php';

// Memeriksa apakah data telah dikirim melalui form
if (isset($_POST['submit'])) {
    $deskripsi = $_POST['deskripsi'];
    $pegawai_id = $_POST['pegawai_id_pegawai'];

    // Membuat prepared statement
    $stmt = $conn->prepare("INSERT INTO transaksi_lainnya (deskripsi, pegawai_id_pegawai) VALUES (?, ?)");
    $stmt->bind_param("si", $deskripsi, $pegawai_id);

    // Menjalankan prepared statement
    if ($stmt->execute()) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    // Menutup prepared statement
    $stmt->close();
}
?>

</body>
</html>
