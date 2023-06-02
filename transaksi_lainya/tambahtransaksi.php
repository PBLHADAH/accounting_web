<!DOCTYPE html>
<html>
<body>
<h2>Register</h2>
<form action="login.php" method="POST">
  <label for="deskripsi">deskripsi:</label><br>
  <input type="text" id="deskripsi" name="deskripsi"><br>
  <label for="pegawai">pegawai_id_pegawai</label><br>
  <select id="pegawai" name="pegawai">
    <?php
    require 'koneksi.php';
    
    // Query SQL untuk mendapatkan daftar ID pegawai dari tabel pegawai
    $sql = "SELECT id_pegawai FROM pegawai";
    $result = $conn->query($sql);

    // Menampilkan opsi ID pegawai dalam dropdown
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['id_pegawai'] . '">' . $row['id_pegawai'] . '</option>';
    }
    ?>
  </select><br><br>
  <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>