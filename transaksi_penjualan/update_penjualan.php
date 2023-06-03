<!DOCTYPE html>
<html>
<head>
    <title>Edit Transaction</title>
</head>
<body>
    <h2>Edit Transaction</h2>
    <?php
    require_once "koneksi.php";

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
        $pegawai_id = sanitize($_POST["pegawai_id"]);

        $sql = "UPDATE transaksi_lainnya SET deskripsi='$deskripsi', nominal='$nominal', pegawai_id_pegawai='$pegawai_id' WHERE id_transaksi_penjualan='$id_transaksi'";

        if ($conn->query($sql) === TRUE) {
            header('Location: Table_penjualan.php');
            exit();
        } else {
            echo "Error updating transaction: " . $conn->error;
        }
    } else {
        if (isset($_GET['id_transaksi'])) {
            $id_transaksi = sanitize($_GET['id_transaksi']);

            $sql = "SELECT * FROM transaksi_lainnya WHERE id_transaksi_penjualan='$id_transaksi'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "Transaction not found.";
                exit();
            }
        } else {
            echo "Invalid request.";
            exit();
        }
    ?>
    <form action="edit_transaksi.php" method="post">
        <input type="hidden" name="id_transaksi" value="<?php echo $row['id_transaksi_penjualan']; ?>">
        <label for="deskripsi">Deskripsi:</label><br>
        <input type="text" name="deskripsi" value="<?php echo $row['deskripsi']; ?>"><br><br>
        <label for="nominal">Nominal:</label><br>
        <input type="number" name="nominal" value="<?php echo $row['nominal']; ?>"><br><br>
        <label for="pegawai_id">Pegawai ID:</label><br>
        <select id="pegawai_id" name="pegawai_id" required>
        <?php
        $sql = "SELECT id_pegawai, nama FROM pegawai";
        $result = mysqli_query($conn, $sql);

        while ($pegawai = mysqli_fetch_assoc($result)) {
            $selected = ($pegawai['id_pegawai'] == $row['pegawai_id_pegawai']) ? "selected" : "";
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
