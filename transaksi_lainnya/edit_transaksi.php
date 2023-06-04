<!DOCTYPE html>
<html>
<head>
    <title>Edit Transaction</title>
</head>
<body>
    <h2>Edit Transaction</h2>
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
        $id_transaksi = sanitize($_POST["id_transaksi"]);
        $deskripsi = sanitize($_POST["deskripsi"]);
        $nominal = sanitize($_POST["nominal"]);

        $sql = "UPDATE transaksi_lainnya SET deskripsi='$deskripsi', nominal='$nominal' WHERE id_transaksi_lainnya='$id_transaksi'";

        if ($conn->query($sql) === TRUE) {
            header('Location: ../lainnya.php'); // ganti
        } else {
            echo "Error updating transaction: " . $conn->error;
        }
    } else {
        $id_transaksi = $_GET['id_transaksi'];

        $sql = "SELECT * FROM transaksi_lainnya WHERE id_transaksi_lainnya='$id_transaksi'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>

    <form action="edit_transaksi.php" method="post">
        <input type="hidden" name="id_transaksi" value="<?php echo $row['id_transaksi_lainnya']; ?>">
        <label for="deskripsi">Deskripsi:</label><br>
        <input type="text" name="deskripsi" value="<?php echo $row['deskripsi']; ?>"><br><br>
        <label for="nominal">Nominal:</label><br>
        <input type="number" name="nominal" value="<?php echo $row['nominal']; ?>"><br><br>
        <input type="submit" value="Update">
    </form>

    <?php
    }

    $conn->close();
    ?>
</body>
</html>
