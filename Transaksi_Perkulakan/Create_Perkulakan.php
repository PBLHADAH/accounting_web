<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Perkulakan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        
        .form-container h2 {
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
        
        .form-group button[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        
        .form-group button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Transaksi Perkulakan</h2>
        <h3>Tambah Produk</h3>
        <form method="POST" action="form_produk.php">
            <div class="form-group">
                <label for="produk">Produk:</label>
                <input type="text" id="produk" name="nama_produk" required>
            </div>
            <div class="form-group">
                <label for="kuantitas">Kuantitas:</label>
                <input type="number" id="kuantitas" name="kuantitas" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require '../koneksi.php';

            // Mendapatkan nilai input dari form
            $nama_produk = $_POST["nama_produk"];
            $kuantitas = $_POST["kuantitas"];

            // Menyimpan data produk ke dalam database
            $sql = "INSERT INTO produk (nama_produk, kuantitas) VALUES ('$nama_produk', '$kuantitas')";
            if ($conn->query($sql) === TRUE) {
                
                header('Location: transaksi_perkulakan.php');




            } else {
                echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }

            // Menutup koneksi database
            $conn->close();
        }
        ?>
    </div>
</body>
</html>