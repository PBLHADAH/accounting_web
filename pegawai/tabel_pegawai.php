<?php
// Database connection details
require '../koneksi.php';

// Query to retrieve data from the 'pegawai' table
$query = "SELECT * FROM pegawai";

// Execute the query
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Pegawai Table</title>
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
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>No. HP</th>
                <th>Alamat</th>
                <th>Username</th>
                <th>Jabatan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch rows from the result set
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id_pegawai'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['no_hp'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['jabatan'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
// Close the result set and database connection
$result->close();
$conn->close();

?>
