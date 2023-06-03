<?php
include '../koneksi.php';

// Retrieve data from the 'transaksi_perkulakan' table
$sql = "SELECT * FROM transaksi_perkulakan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Perkulakan Table</title>
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
<h2>Transaksi Perkulakan Table</h2>
    <a href="create_transaksi_perkulakan.php">Create New Transaksi Perkulakan</a>
    <br><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Pegawai ID</th>
            <th>Tanggal</th>
            <th>Action</th>
        </tr>
        <?php
        // Display the data from the transaksi_perkulakan table
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id_transaksi_perkulakan'] . "</td>";
                echo "<td>" . $row['pegawai_id_pegawai'] . "</td>";
                echo "<td>" . $row['tanggal'] . "</td>";
                echo "<td>";
                echo "<form method='POST' action='delete_transaksi_perkulakan.php'>";
                echo "<input type='hidden' name='id_transaksi_perkulakan' value='" . $row['id_transaksi_perkulakan'] . "'>";
                echo "<input type='submit' value='Delete'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No records found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
