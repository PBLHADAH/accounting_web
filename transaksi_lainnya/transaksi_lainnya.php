<?php
require_once "koneksi.php";

$sql = "SELECT * FROM transaksi_lainnya";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Lainnya</title>
    <style>
 .header-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    h2 {
        margin: 0;
    }

    .add-link {
        background-color: #007bff;
        color: #fff;
        padding: 5px 14px;
        text-decoration: none;
        border-radius: 4px;
    }

    .add-link:hover {
        background-color: #0069d9;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ccc;
    }

    th {
        background-color: #f8f8f8;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .action-separator {
        margin: 0 5px;
    }

    a {
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
    </style>
</head>
<body>
    
    <div class="header-container">
        <h2>Transaksi Lainnya</h2>
        <a href="transaksi_lainnya/create_transaksi.php" class="add-link">Tambah Transaksi Lainnya</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Deskripsi</th>
                <th>Nominal</th>
                <th>Pencatat</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                $pencatat = mysqli_query($conn, "SELECT nama FROM pegawai WHERE id_pegawai=" . $row['pegawai_id_pencatat']);
                $pencatat_hasil = $pencatat->fetch_assoc();
                echo "<tr>";
                echo "<td>" . $row['id_transaksi_lainnya'] . "</td>";
                echo "<td>" . $row['deskripsi'] . "</td>";
                echo "<td> Rp." . number_format($row['nominal'], 0, ',', '.') . "</td>";
                echo "<td>" . $pencatat_hasil['nama'] . "</td>";
                echo "<td>" . $row['tanggal'] . "</td>";
                echo "<td>";
                echo "<a href=\"transaksi_lainnya/edit_transaksi.php?id_transaksi=" . $row['id_transaksi_lainnya'] . "\">Edit</a>";
                echo "<span class=\"action-separator\">|</span>";
                echo "<a href=\"transaksi_lainnya/delete_transaksi.php?id_transaksi=" . $row['id_transaksi_lainnya'] . "\" onclick=\"return confirm('Are you sure?');\">Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
$result->close();
$conn->close();
?>
