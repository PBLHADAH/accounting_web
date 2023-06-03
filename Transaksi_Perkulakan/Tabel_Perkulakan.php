<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <style>
        .form-container {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
        }
        .form-container label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .form-container input[type="text"],
    .form-container input[type="number"] {
        width: 100%;
        padding: 10px;
        border-radius: 3px;
        border: 1px solid #ccc;
    }

    .form-container button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f5f5f5;
    }
</style>
</head>
<body>
    <h2>Data Produk</h2>
    <table>
        <tr>
            <th>ID Produk</th>
            <th>Nama Produk</th>
            <th>Kuantitas</th>
            <th>Aksi</th>
        </tr>
        <?php
        require '../koneksi.php';
            // Mendapatkan data produk dari database
    $sql = "SELECT * FROM produk";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_produk = $row["id_produk"];
            $nama_produk = $row["nama_produk"];
            $kuantitas = $row["kuantitas"];
            ?>
            <tr>
                <td><?php echo $id_produk; ?></td>
                <td><?php echo $nama_produk; ?></td>
                <td><?php echo $kuantitas; ?></td>
                <td>
                    <a href="edit_produk.php?id=<?php echo $id_produk; ?>">Edit</a>
                    <a href="delete_produk.php?id=<?php echo $id_produk; ?>">Hapus</a>
                </td>
            </tr>
            <?php
        }
    } else {
        echo "<tr><td colspan='4'>Tidak ada data produk.</td></tr>";
    }

    // Menutup koneksi database
    $conn->close();
    ?>
</table>
</body>
</html>