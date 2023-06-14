<!DOCTYPE html>
<html>
<head>
  <title>Kelola Produk</title>
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
    <h2>Kelola Produk</h2>
    <a href='produk/create_produk.php' class="add-link">Tambah Produk</a>
  </div>
  
  <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Aksi</th>
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
            echo "<td><a href='produk/update_produk.php?id_produk=" . $row['id_produk'] . "'>Edit</a>";
            echo "<span class=\"action-separator\">|</span>";
            echo "<form method='POST' action='produk/delete_produk.php'>";
            echo "<input type='hidden' name='id_produk' value='" . $row['id_produk'] . "'>";
            echo "<input type='submit' name='delete' value='Hapus'></form></td>";
            echo "</tr>";
          }

        } 
  ?>
</tbody>
    </table>
</body>
</html>             