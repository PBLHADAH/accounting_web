<!DOCTYPE html>
<html>
<head>
  <title>Tambah Produk</title>
</head>
<body>
  <h1>Tambah Produk</h1>
  <form method="POST" action="simpan_produk.php">
    <label for="nama_produk">Nama Produk:</label>
    <input type="text" id="nama_produk" name="nama_produk" required><br><br>
    
    <label for="harga_produk">Harga Produk:</label>
    <input type="text" id="harga_produk" name="harga_produk" required><br><br>
    
    <label for="supplier">Supplier:</label>
    <input type="text" id="supplier" name="supplier" required><br><br>
    
    <input type="submit" name="konfirmasi" value="Konfirmasi">
    <button onclick="location.href='kelolaproduk.php'">Kembali</button>
  </form>
</body>
</html>
