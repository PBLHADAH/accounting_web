<!DOCTYPE html>
<html>
<head>
    <title>Create Transaction</title>
</head>
<body>
    <h2>Create Transaction</h2>
    <form action="" method="POST">
        <label for="deskripsi">Deskripsi:</label><br>
        <input type="text" name="deskripsi" required><br><br>
        <label for="nominal">Nominal:</label><br>
        <input type="number" name="nominal" required><br><br>
        <label for="pegawai_id">Pegawai ID:</label><br>
        <select id="pegawai_id" name="pegawai_id" required>
        <option value="">Pilih pegawai</option>
        <?php
        require_once "../koneksi.php";
        // Query untuk mengambil data pegawai dari tabel
        $sql = "SELECT id_pegawai, nama FROM pegawai";
        $result = mysqli_query($conn, $sql);

        // Menghasilkan opsi dropdown berdasarkan data pegawai
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<option value='" . $row['id_pegawai'] . "'>" . $row['nama'] . "</option>";
        }

        // Tutup koneksi database
        // $conn->close();
        ?>
      </select><br><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
<?php
require_once "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deskripsi = $_POST['deskripsi'];
    $nominal = $_POST['nominal'];
    $pegawai_id = $_POST['pegawai_id'];

    $sql = "INSERT INTO transaksi_lainnya (deskripsi, nominal, pegawai_id_pegawai) VALUES ('$deskripsi', '$nominal', '$pegawai_id')";

    if ($conn->query($sql) === TRUE) {
        header('Location: transaksi_lainnya.php');// ganti
    } else {
        echo "Error creating transaction: " . $conn->error;
    }

    $conn->close();
}
?>