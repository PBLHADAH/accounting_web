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
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <title>Edit Transaction</title>
</head>
<body>
<div class="container">
    <h2>Edit Transaction</h2>
    <form action="edit_transaksi.php" method="post">
        <input type="hidden" name="id_transaksi" value="<?php echo $row['id_transaksi_lainnya']; ?>">
        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <input class="form-control" type="text" name="deskripsi" value="<?php echo $row['deskripsi']; ?>">
        </div>
        <div class="form-group">
            <label for="nominal">Nominal:</label>
            <input class="form-control" type="number" name="nominal" value="<?php echo $row['nominal']; ?>">
        </div>
        <button class="btn btn-primary" type="submit">Update</button>
    </form>
</div>

    <?php
    }

    $conn->close();
    ?>
</body>
</html>
