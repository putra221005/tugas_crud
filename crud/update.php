<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM peserta WHERE id = '$id'");
$data_user = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
        }
        
        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        img {
            width: 100px;
            height: 100px;
            margin-top: 10px;
        }
        
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>UPDATE Data</h1>
    <form action="update.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $data_user['id'] ?>">
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" value="<?php echo $data_user['nama'] ?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" value="<?php echo $data_user['email'] ?>">
    </div>
    <div class="form-group">
        <label for="gambar">Gambar</label>
        <input type="file" name="gambar">
        <img src="image/<?php echo $data_user['gambar'] ?>" width="100px" height="100px">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" value="<?php echo $data_user['alamat'] ?>">
    </div>
    <div class="form-group">
        <input type="submit" name="update" value="Update">
    </div>
</form>
</body>
</html>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $folder = './image/';
    $foto = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    if ($foto != "") {
        move_uploaded_file($source, $folder . $foto);
        $query = mysqli_query($koneksi, "UPDATE peserta SET nama='$nama', email='$email', gambar='$foto', alamat='$alamat' WHERE id='$id'");
    } else {
        $query = mysqli_query($koneksi, "UPDATE peserta SET nama='$nama', email='$email', alamat='$alamat' WHERE id='$id'");
    }

    header("Location: data.php");
}
?>