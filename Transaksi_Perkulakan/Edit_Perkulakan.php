<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        
        .container h2 {
            margin-top: 0;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        .form-group input[type="text"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        
        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        
        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Produk</h2>
        <?php
        require_once "../koneksi.php";

        function sanitize($input)
        {
            global $conn;
            $output = mysqli_real_escape_string($conn, $input);
            $output = htmlspecialchars($output);
            return $output;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_produk = sanitize($_POST["id_produk"]);
            $nama_produk = sanitize($_POST["nama_produk"]);
            $kuantitas = sanitize($_POST["kuantitas"]);
            $sql = "UPDATE produk SET nama_produk='$nama_produk', kuantitas='$kuantitas' WHERE id_produk='$id_produk'";

            if ($conn->query($sql) === TRUE) {
                header('Location: transaksi_perkulakan.php');
                exit;
            } else {
                echo "Error updating product: " . $conn->error;
            }
        } else {
            $id_produk = $_GET['id'];

            $sql = "SELECT * FROM produk WHERE id_produk='$id_produk'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        ?>

        <form action="edit_produk.php" method="post">
            <div class="form-group">
                <label for="nama_produk">Nama Produk:</label>
                <input type="text" name="nama_produk" value="<?php echo $row['nama_produk']; ?>">
            </div>
            <div class="form-group">
                <label for="kuantitas">Kuantitas:</label>
                <input type="number" name="kuantitas" value="<?php echo $row['kuantitas']; ?>">
            </div>
            <div class="form-group">
                <input type="hidden" name="id_produk" value="<?php echo $row['id_produk']; ?>">
                <input type="submit" value="Update">
            </div>
        </form>

        <?php
        }

        $conn->close();
        ?>
    </div>
</body>
</html>