 <?php
    include 'koneksi.php';

    // Retrieve data from the 'pegawai' table
    $sql =  "SELECT *FROM pegawai";
    $result = $conn->query($sql);
    ?>

 <!DOCTYPE html>
 <html>

 <head>
     <title>Tabel Pegawai</title>
     <style>
         .header-container {
             display: flex;
             align-items: center;
             justify-content: space-between;
             margin-bottom: 20px;
         }

         h2 {
             margin: 0;
         }

         .add-link {
             background-color: #007bff;
             color: #fff;
             padding: 5px 14px;
             text-decoration: none;
             border-radius: 4px;
         }

         .add-link:hover {
             background-color: #0069d9;
         }

         table {
             width: 100%;
             border-collapse: collapse;
         }

         th,
         td {
             padding: 10px;
             text-align: left;
             border-bottom: 1px solid #ccc;
         }

         th {
             background-color: #f8f8f8;
         }

         tr:nth-child(even) {
             background-color: #f2f2f2;
         }

         .action-separator {
             margin: 0 5px;
         }

         a {
             color: #007bff;
             text-decoration: none;
         }

         a:hover {
             text-decoration: underline;
         }

         /* styling untuk tombol edit dan delete  */
         .edit-button {
             background-color: #4CAF50;
             color: white;
             padding: 8px 16px;
             text-align: center;
             text-decoration: none;
             display: inline-block;
             border-radius: 4px;
             border: none;
         }

         .delete-button {
             background-color: #f44336;
             color: white;
             padding: 8px 16px;
             text-align: center;
             text-decoration: none;
             display: inline-block;
             border-radius: 4px;
             border: none;
         }

         .action-separator {
             margin: 0 8px;
         }
     </style>
     
 </head>

 <body>
     <div class="header-container">
         <h2>Daftar Pegawai</h2>
         <a href="pegawai/create_pegawai.php" class="add-link">Tambah pegawai</a>
     </div>
     <table>
         <thead>
             <tr>
                 <th>ID</th>
                 <th>Nama</th>
                 <th>No. HP</th>
                 <th>Alamat</th>
                 <th>Username</th>
                 <th>Jabatan</th>
                 <th>Aksi</th>
             </tr>
         </thead>
         <tbody>
             <?php
                // Display rows from the 'pegawai' table
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id_pegawai'] . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['no_hp'] . "</td>";
                    echo "<td>" . $row['alamat'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['jabatan'] . "</td>";
                    echo "<td>";
                    echo "<a href=\"pegawai/update_pegawai.php?id_pegawai=" . $row['id_pegawai'] . "\">Edit</a>";
                    echo "<span class=\"action-separator\">|</span>";
                    echo "<a href=\"pegawai/delete_pegawai.php?id_pegawai=" . $row['id_pegawai'] . "\" onclick=\"return confirm('Apakah anda yakin?');\">Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
         </tbody>
     </table>
 </body>

 </html>

 <?php
    // Close the database connection
    $conn->close();
    ?>