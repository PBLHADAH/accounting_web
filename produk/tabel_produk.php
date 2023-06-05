<!DOCTYPE html>
<html>
<head>
  <title>Kelola Produk</title>
</head>
<body>
<table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Koneksi ke database
        require 'koneksi.php';

        // Query untuk mendapatkan data semua produk
        $sql = "SELECT * FROM produk";
        $result = mysqli_query($conn, $sql);
        
        // Memeriksa apakah ada produk yang ditemukan
        if (mysqli_num_rows($result) > 0) {
          
          // Menampilkan data produk ke dalam tabel
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_produk'] . "</td>";
            echo "<td>" . $row['nama_produk'] . "</td>";
            echo "<td> Rp." . number_format($row['harga_produk'], 0, ',', '.') . "</td>";
            echo "</tr>";
          }

        } 
  ?>
</tbody>
    </table>
</body>
</html>
