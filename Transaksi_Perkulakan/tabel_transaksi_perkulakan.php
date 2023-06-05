<?php
require 'koneksi.php';

$query = "SELECT tp.id_transaksi_perkulakan, tp.tanggal, tp.kuantitas, tp.pegawai_id_pencatat, pg.nama AS nama_pegawai, pr.nama_produk, s.nama_supplier, (tp.kuantitas * pr.harga_produk) AS subtotal
            FROM transaksi_perkulakan tp
            JOIN pegawai pg ON tp.pegawai_id_pencatat = pg.id_pegawai
            JOIN produk pr ON tp.produk_id_produk = pr.id_produk
            JOIN supplier s ON tp.supplier_id_supplier = s.id_supplier
            ORDER BY tp.id_transaksi_perkulakan";

$result = $conn->query($query);
// if ($row === false) {
//     echo "Error executing query: " . $conn->error;
//     exit();
// }
?>

<table border="1">
        <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Kuantitas</th>
            <th>Pencatat</th>
            <th>Nama Produk</th>
            <th>Nama Supplier</th>
            <th>Subtotal</th>
        </tr>
        <?php
        while ($row  = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_transaksi_perkulakan'] . "</td>";
            echo "<td>" . $row['tanggal'] . "</td>";
            echo "<td>" . $row['kuantitas'] . "</td>";
            echo "<td>" . $row['nama_pegawai'] . "</td>";
            echo "<td>" . $row['nama_produk'] . "</td>";
            echo "<td>" . $row['nama_supplier'] . "</td>";
            echo "<td> Rp." . number_format(-$row['subtotal'], 0, ',', '.') . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
<?php
$conn->close();
?>
