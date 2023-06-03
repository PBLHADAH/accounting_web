<!DOCTYPE html>
<html>
<head
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
        $id_transaksi_penjualan = sanitize($_POST["id_transaksi_penjualan"]);
        $penjualan_retail = sanitize($_POST["penjualan_retail"]);
        $penjualan_grosir = sanitize($_POST["penjualan_grosir"]);
        $penjualan_aksesoris = sanitize($_POST["penjualan_aksesoris"]);
        $pegawai_id_pegawai = sanitize($_POST["pegawai_id_pegawai"]);


        $sql = "UPDATE transaksi_penjualan SET penjualan_retail='$penjualan_retail', penjualan_grosir='$penjualan_grosir', pegawai_id_pegawai_pegawai='$pegawai_id_pegawai' WHERE id_transaksi_penjualan_lainnya='$id_transaksi_penjualan'";

        if ($conn->query($sql) === TRUE) {
            header('Location: penjualan.php'); // ganti
        } else {
            echo "Error updating transaction: " . $conn->error;
        }
    } else {
        $id_transaksi_penjualan = $_GET['id_transaksi_penjualan'];

        $sql = "SELECT * FROM transaksi_lainnya WHERE id_transaksi_penjualan_lainnya='$id_transaksi_penjualan'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>

    <form action="edit_transaksi.php" method="post">
        <input type="hidden" name="id_transaksi_penjualan" value="<?php echo $row['id_transaksi_penjualan_lainnya']; ?>">
        <label for="penjualan_retail">penjualan_retail:</label><br>
        <input type="text" name="penjualan_retail" value="<?php echo $row['penjualan_retail']; ?>"><br><br>
        <label for="penjualan_grosir">penjualan_grosir:</label><br>
        <input type="number" name="penjualan_grosir" value="<?php echo $row['penjualan_grosir']; ?>"><br><br>
        <label for="pegawai_id_pegawai">Pegawai ID:</label><br>
        <select id="pegawai_id_pegawai" name="pegawai_id_pegawai" required>
        <?php
        $sql = "SELECT id_pegawai, nama FROM pegawai";
        $result = mysqli_query($conn, $sql);

        while ($pegawai = mysqli_fetch_assoc($result)) {
            $selected = ($pegawai['id_pegawai'] == $row['pegawai_id_pegawai_pegawai']) ? "selected" : "";
            echo "<option value='" . $pegawai['id_pegawai'] . "' " . $selected . ">" . $pegawai['nama'] . "</option>";
        }
        ?>
        </select><br><br>
        <input type="submit" value="Update">
    </form>

    <?php
    }

    $conn->close();
    ?>
</body>
</html>
