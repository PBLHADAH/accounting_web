<!DOCTYPE html>
<html>
<head>
    <title>Create Transaksi Perkulakan</title>
</head>
<body>
    <h2>Create Transaksi Perkulakan</h2>
    <form action="insert_transaksi_perkulakan.php" method="POST">
        <label for="id_transaksi_perkulakan">ID Transaksi:</label>
        <input type="number" name="id_transaksi_perkulakan" required><br><br>
        <label for="pegawai_id_pegawai">Pegawai ID:</label>
        <input type="number" name="pegawai_id_pegawai" required><br><br>
        <label for="tanggal">Tanggal:</label>
        <input type="datetime-local" name="tanggal" required><br><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
