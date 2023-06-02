<!DOCTYPE html>
<html>
<head>
    <title>transaksi_lainnya</title>
    <style>
        table {
            border-collapse: collapse;
            width: 70%;
            margin: 0 auto;
            font-family: Arial, sans-serif;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #4CAF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .button-container {
            margin-top: 10px;
        }

        .button-container button {
            margin-right: 5px;
        }
    </style>
</head>
<body>
<?php
    // Mengimpor file koneksi.php yang berisi konfigurasi koneksi ke database
    require 'koneksi.php';

    // Fungsi untuk menghapus data berdasarkan ID transaksi
    function deleteTransaction($conn, $id) {
        $sql = "DELETE FROM transaksi_lainnya WHERE id_transaksi_lainnya = $id";
        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil dihapus.";
        } else {
            echo "Terjadi kesalahan: " . $conn->error;
        }
    }

    // Memeriksa apakah parameter 'action' diberikan dalam URL
    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        // Jika action adalah 'delete' dan parameter 'id' diberikan dalam URL
        if ($action === 'delete' && isset($_GET['id'])) {
            $id_transaksi = $_GET['id'];
            deleteTransaction($conn, $id_transaksi);
        }
    }

    // Menjalankan pernyataan SQL untuk mengambil data dari tabel transaksi_lainnya dan melakukan inner join dengan tabel pegawai
    $sql = "SELECT transaksi_lainnya.id_transaksi_lainnya, transaksi_lainnya.deskripsi, pegawai.nama, transaksi_lainnya.tanggal
            FROM transaksi_lainnya
            INNER JOIN pegawai ON transaksi_lainnya.pegawai_id_pegawai = pegawai.id_pegawai";
    $result = $conn->query($sql);

    // Memeriksa apakah ada hasil data yang ditemukan
    if ($result->num_rows > 0) {
        // Menampilkan tabel dengan data yang ditemukan
        echo '<table>';
        echo '<tr>';
        echo '<th>id_transaksi_lainnya</th>';
        echo '<th>deskripsi</th>';
        echo '<th>pegawai</th>';
        echo '<th>tanggal</th>';
        echo '<th>Aksi</th>';
        echo '</tr>';

        // Menampilkan baris data
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id_transaksi_lainnya'] . '</td>';
            echo '<td>' . $row['deskripsi'] . '</td>';
            echo '<td>' . $row['nama'] . '</td>';
            echo '<td>' . $row['tanggal'] . '</td>';
            echo '<td>';
            echo '<a href="edit_transaksi.php?id=' . $row['id_transaksi_lainnya'] . '">Edit</a>';
            echo ' | ';
            echo '<a href="?action=delete&id=' . $row['id_transaksi_lainnya'] . '">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        // Menampilkan pesan jika tidak ada data yang ditemukan
        echo 'Tidak ada data yang ditemukan.';
    }

    // Menutup koneksi ke database
?>

    <form action="tambahtransaksi.php" method="POST">
    <div action class="button-container">
        <button onclick="location.href='tambah_transaksi.php'">Tambah Transaksi</button>
    </div>
</body>
</html>
