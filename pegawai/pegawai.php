 <?php
include 'koneksi.php';

// Retrieve data from the 'pegawai' table
$sql =  "SELECT *FROM pegawai";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tabel Pegawai</title>

</head>
<body>
    <h2>Daftar Pegawai</h2>
    <a href="pegawai/create_pegawai.php">Tambah pegawai</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>No. HP</th>
                <th>Alamat</th>
                <th>Username</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Display rows from the 'pegawai' table
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id_pegawai'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['no_hp'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['jabatan'] . "</td>";
                echo "<td>";
                echo "<a href=\"pegawai/update_pegawai.php?id_pegawai=" . $row['id_pegawai'] . "\">Edit</a>";
                echo "<span class=\"action-separator\">|</span>";
                echo "<a href=\"pegawai/delete_pegawai.php?id_pegawai=" . $row['id_pegawai'] . "\" onclick=\"return confirm('Apakah anda yakin?');\">Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
