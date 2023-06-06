<?php
include 'koneksi.php';

$query_perkulakan = "SELECT tp.id_transaksi_perkulakan, tp.tanggal, tp.kuantitas, pg.nama AS nama_pegawai, pr.nama_produk, s.nama_supplier, (tp.kuantitas * pr.harga_produk) AS subtotal
                    FROM transaksi_perkulakan tp
                    JOIN produk pr ON tp.produk_id_produk = pr.id_produk
                    JOIN supplier s ON tp.supplier_id_supplier = s.id_supplier
                    JOIN pegawai pg ON tp.pegawai_id_pencatat = pg.id_pegawai";
$result_perkulakan = $conn->query($query_perkulakan);

if ($result_perkulakan === false) {
    echo "Error retrieving perkulakan data: " . $conn->error;
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Data Perkulakan</title>
    </head>
    <body>
        <h2>Data Perkulakan</h2>
        <a href="transaksi_perkulakan/create_perkulakan.php">Tambah Transaksi Perkulakan</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Kuantitas</th>
            <th>Pencatat</th>
            <th>Nama Produk</th>
            <th>Nama Supplier</th>
            <th>Subtotal</th>
            <th>Aksi</th>
        </tr>
        <?php
        while ($row = $result_perkulakan->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_transaksi_perkulakan'] . "</td>";
            echo "<td>" . $row['tanggal'] . "</td>";
            echo "<td>" . $row['kuantitas'] . "</td>";
            echo "<td>" . $row['nama_pegawai'] . "</td>";
            echo "<td>" . $row['nama_produk'] . "</td>";
            echo "<td>" . $row['nama_supplier'] . "</td>";
            echo "<td> Rp." . number_format(-$row['subtotal'], 0, ',', '.') . "</td>";
            echo "<td><a href='transaksi_perkulakan/edit_perkulakan.php?id_perkulakan=" . $row['id_transaksi_perkulakan'] . "'>Edit</a>";
            echo "<span class=\"action-separator\">|</span>";
            echo "<a href='transaksi_perkulakan/delete_perkulakan.php?id_perkulakan=" . $row['id_transaksi_perkulakan'] . "'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
</body>
</html>

<?php
$conn->close();
?>
