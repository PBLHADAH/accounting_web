<?php
include 'koneksi.php';

// Retrieve data from the 'pegawai' table
$sql = "SELECT * FROM pegawai";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tabel Pegawai Detail</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        form {
            display: inline-block;
        }
    </style>
</head>
<body>
    <h2>Tabel Pegawai Detail</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>No. HP</th>
                <th>Alamat</th>
                <th>Username</th>
                <th>Password</th>
                <th>Jabatan</th>
                <th>Action</th>
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
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>" . $row['jabatan'] . "</td>";
                echo "<td>";
                echo "<a href=\"edit_pegawai.php?id_pegawai=" . $row['id_pegawai'] . "\">Edit</a>";
                echo "<a href=\"delete_pegawai.php?id_pegawai=" . $row['id_pegawai'] . "\" onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>";
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