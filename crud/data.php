<?php
include"koneksi.php";

$data = mysqli_query($koneksi, 'SELECT * FROM peserta ORDER BY id ASC')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peserta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        
        .title {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .table {
            margin-top: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th,
        td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        
        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        
        img {
            width: 100px;
            height: 100px;
        }
        
        a {
            text-decoration: none;
            color: #000;
        }
        
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="title">
        <h2>Data Peserta Didik</h2>
    </div>
    <br>
    <div><a href="form.php">Tambah Data</a></div>
    <br>
    <div class="table">
    <table width ="30%" border="1">
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Gambar</th>
            <th>Alamat</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php
        while($data_user = mysqli_fetch_array($data)) {
            echo "<tr>";
            echo "<td>".$data_user['id']."</td>";
            echo "<td>".$data_user['nama']."</td>";
            echo "<td>".$data_user['email']."</td>";
            echo "<td> <img src='image/".$data_user['gambar']."'width='100px' height='100px'></td>";
            echo "<td>".$data_user['alamat']."</td>";
            echo "<td><a href='update.php?id=$data_user[id]'>Edit</td>";
            echo "<td><a href='delete.php?id=$data_user[id]'>Hapus</td>";
            echo "</tr>";
            }
        ?>
    </table>
    </div>
</body>
</html>