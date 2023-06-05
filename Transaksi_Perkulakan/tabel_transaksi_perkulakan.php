<?php
require 'koneksi.php';

$query = "SELECT tp.id_transaksi_perkulakan, tp.tanggal, tp.kuantitas, tp.pegawai_id_pencatat, pg.nama AS nama_pegawai, pr.nama_produk, s.nama_supplier, (tp.kuantitas * pr.harga_produk) AS subtotal
            FROM transaksi_perkulakan tp
            JOIN pegawai pg ON tp.pegawai_id_pencatat = pg.id_pegawai
            JOIN produk pr ON tp.produk_id_produk = pr.id_produk
            JOIN supplier s ON tp.supplier_id_supplier = s.id_supplier
            ORDER BY tp.id_transaksi_perkulakan";

$result = $conn->query($query);
// if ($row_perkulakan === false) {
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
            <th>Action</th>
        </tr>
        <?php
        while ($row_perkulakan  = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row_perkulakan['id_transaksi_perkulakan'] . "</td>";
            echo "<td>" . $row_perkulakan['tanggal'] . "</td>";
            echo "<td>" . $row_perkulakan['kuantitas'] . "</td>";
            echo "<td>" . $row_perkulakan['nama_pegawai'] . "</td>";
            echo "<td>" . $row_perkulakan['nama_produk'] . "</td>";
            echo "<td>" . $row_perkulakan['nama_supplier'] . "</td>";
            echo "<td>" . $row_perkulakan['subtotal'] . "</td>";
            echo "<td><a href='transaksi_perkulakan/edit_perkulakan.php?id_perkulakan=" . $row_perkulakan['id_transaksi_perkulakan'] . "'>Edit</a> | <a href='transaksi_perkulakan/delete_perkulakan.php?id_perkulakan=" . $row_perkulakan['id_transaksi_perkulakan'] . "'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
<?php
$conn->close();
?>