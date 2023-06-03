<?php

require "../koneksi.php";

// Query to retrieve data from the transaksi_lainnya table
$sql = "SELECT * FROM transaksi_lainnya";

// Execute the query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Deskripsi</th>
            <th>Nominal</th>
            <th>Pegawai ID</th>
            <th>Tanggal</th>
          </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id_transaksi_lainnya"] . "</td>";
        echo "<td>" . $row["deskripsi"] . "</td>";
        echo "<td>" . $row["nominal"] . "</td>";
        echo "<td>" . $row["pegawai_id_pegawai"] . "</td>";
        echo "<td>" . $row["tanggal"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No data found.";
}

?>
