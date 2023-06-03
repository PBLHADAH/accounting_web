<?php
require_once "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id_transaksi"])) {
        $id_transaksi = $_GET["id_transaksi"];

        // Mendapatkan nomor id_transaksi_penjualan data yang akan dihapus
        $query = $conn->query("SELECT id_transaksi_penjualan FROM transaksi_penjualan WHERE id_transaksi_penjualan = '$id_transaksi'");

        if ($query && $query->num_rows > 0) {
            $data = $query->fetch_assoc();
            $urutan_hapus = $data["id_transaksi_penjualan"];

            $deleteSql = "DELETE FROM transaksi_penjualan WHERE id_transaksi_penjualan='$id_transaksi'";

            if ($conn->query($deleteSql) === TRUE) {
                // Mengambil data dengan nomor id_transaksi_penjualan lebih tinggi dari data yang dihapus
                $query = $conn->query("SELECT id_transaksi_penjualan FROM transaksi_penjualan WHERE id_transaksi_penjualan > $urutan_hapus ORDER BY id_transaksi_penjualan ASC");

                // Menggeser nomor id_transaksi_penjualan data yang ada di bawahnya
                while ($row = $query->fetch_assoc()) {
                    $id_transaksi = $row["id_transaksi_penjualan"];
                    $updateSql = "UPDATE transaksi_penjualan SET id_transaksi_penjualan = id_transaksi_penjualan - 1 WHERE id_transaksi_penjualan = '$id_transaksi'";
                    $conn->query($updateSql);
                }

                // Reset nilai auto increment
                $resetSql = "ALTER TABLE transaksi_penjualan AUTO_INCREMENT = 1";
                $conn->query($resetSql);

                header('Location: Table_penjualan.php'); // Ganti dengan halaman yang sesuai
            } else {
                echo "Error deleting transaction: " . $conn->error;
            }
        } else {
            echo "Error retrieving data: " . $conn->error;
        }
    }
}

$conn->close();
?>
