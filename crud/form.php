<!DOCTYPE html>
<html>

<head>
  <base target="_top">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="form.css">
</head>

<body>
  <div class="container">
    <br>
    <h2>Pengisian Data Kartu Pelajar SMK Negeri 1 Surabaya</h2>
    <br>
    <div id="form">
      <form action="form.php" method="POST" 
      action="" enctype="multipart/form-data">
        <div class="form-group">
          <label for="Nama" class="form-label">Nama</label>
          <input type="text" class="form-control " id="nama" name="nama">
        </div>
        <br>
        <div class="form-group">
          <label for="NISN" class="form-label">Email</label>
          <input type="text" class="form-control " id="email" name="email">
        </div>
        <br>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar">
        </div>
        <br>
        <div class="form-group">
          <label for="Alamat" class="form-label">Alamat</label>
          <input type="text" class="form-control " id="alamat" name="alamat">
        </div>

        <div><input type="submit" name="submit" value="Submit"></div>
      </form>
    </div>
  </div>
</body>
</html>

<?php
if(isset($_POST['submit'])) {
  $folder='./image/';
  $foto=$_FILES['gambar']['name'];
  // var_dump($_FILES);
  // die();
  $source=$_FILES['gambar']['tmp_name'];
  move_uploaded_file($source, $folder.$foto);

  $nama=$_POST['nama'];
  $email=$_POST['email'];
  $alamat=$_POST['alamat'];

  include 'koneksi.php';

  // $data = mysqli_query($koneksi, "SELECT * FROM peserta WHERE id = '$id'");

  // while($data_user = mysqli_fetch_array($data)) {
  //     $id=$data_user['id'];
  //     $nama=$data_user['nama'];
  //     $email=$data_user['email'];
  //     $gambar=$data_user['gambar'];
  //     $alamat=$data_user['alamat'];
  // }

  $data = mysqli_query($koneksi, "INSERT INTO peserta VALUES('', '$nama', '$email', '$foto', '$alamat')");

  // var_dump($_POST);
  // var_dump($_FILES);

  header("Location: data.php");

}
?>