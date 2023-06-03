<?php
include '../koneksi.php';

// Function to sanitize user inputs
function sanitize($input)
{
    global $conn;
    $output = mysqli_real_escape_string($conn, $input);
    $output = htmlspecialchars($output);
    return $output;
}

// Check if the form is submitted for editing the record
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pegawai = sanitize($_POST["id_pegawai"]);
    $nama = sanitize($_POST["nama"]);
    $no_hp = sanitize($_POST["no_hp"]);
    $alamat = sanitize($_POST["alamat"]);
    $username = sanitize($_POST["username"]);
    $password = sanitize($_POST["password"]);
    $jabatan = sanitize($_POST["jabatan"]);

    $sql = "UPDATE pegawai SET nama='$nama', no_hp='$no_hp', alamat='$alamat', username='$username', password='$password', jabatan='$jabatan' WHERE id_pegawai='$id_pegawai'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully.";
        header("location: ../pegawai.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    // Retrieve the id_pegawai from the URL parameter
    $id_pegawai = $_GET['id_pegawai'];

    // Retrieve the record from the 'pegawai' table based on id_pegawai
    $sql = "SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pegawai</title>
</head>
<body>
    <h2>Edit Pegawai</h2>
    <form action="update_pegawai.php" method="post">
        <input type="hidden" name="id_pegawai" value="<?php echo $row['id_pegawai']; ?>">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br><br>
        <label for="no_hp">No. HP:</label>
        <input type="text" name="no_hp" value="<?php echo $row['no_hp']; ?>"><br><br>
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"><br><br>
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $row['username']; ?>"><br><br>
        <label for="password">Password:</label>
        <input type="text" name="password" value="<?php echo $row['password']; ?>"><br><br>
        <label for="jabatan">Jabatan:</label>
        <select name="jabatan">
            <option value="manajer" <?php echo ($row['jabatan'] == 'manajer') ? 'selected' : ''; ?>>Manajer</option>
            <option value="pegawai" <?php echo ($row['jabatan'] == 'pegawai') ? 'selected' : ''; ?>>Pegawai</option>
        </select><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>

<?php
}
// Close the database connection
$conn->close();
?>
