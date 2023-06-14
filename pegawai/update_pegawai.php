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
    <title>Edit Pegawai | Aldyz Cell</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
    <?php
  $iconPath = '../index/book2.ico';
  echo '<link rel="icon" type="image/x-icon" href="' . $iconPath . '">';
  ?>
    
    <style>
        body {
            padding: 20px;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            width: 100%;
        }

        .btn-primary {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Edit Pegawai</h2>
        <form action="update_pegawai.php" method="post">
            <input type="hidden" name="id_pegawai" value="<?php echo $row['id_pegawai']; ?>">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">
            </div>
            <div class="form-group">
                <label for="no_hp">No. HP:</label>
                <input type="text" name="no_hp" class="form-control" value="<?php echo $row['no_hp']; ?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>">
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" name="password" class="form-control" value="<?php echo $row['password']; ?>">
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan:</label>
                <select name="jabatan" class="form-control">
                    <option value="manajer" <?php echo ($row['jabatan'] == 'manajer') ? 'selected' : ''; ?>>Manajer</option>
                    <option value="pegawai" <?php echo ($row['jabatan'] == 'pegawai') ? 'selected' : ''; ?>>Pegawai</option>
                </select>
            </div>
            <input type="submit" value="Update" class="btn btn-primary">
        </form>
    </div>
</body>
</html>

<?php
}
// Close the database connection
$conn->close();
?>
