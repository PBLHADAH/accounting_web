
<!DOCTYPE html>
<html>
<head>
  <title>Kelola Produk</title>
</head>
<body>
<table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Deskripsi</th>
                <th>Nominal</th>
                <th>Pencatat</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
        <?php

        require "koneksi.php";

        // Query to retrieve data from the transaksi_lainnya table
        $sql = "SELECT * FROM transaksi_lainnya";

        // Execute the query
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_transaksi_lainnya"] . "</td>";
                echo "<td>" . $row["deskripsi"] . "</td>";
                echo "<td> Rp." . number_format($row['nominal'], 0, ',', '.') . "</td>";
                echo "<td>" . $row["pegawai_id_pencatat"] . "</td>";
                echo "<td>" . $row["tanggal"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        }

        ?>
        </tbody>
</table>
</body>
</html>

          