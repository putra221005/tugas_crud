<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi File</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://c4.wallpaperflare.com/wallpaper/246/739/689/digital-digital-art-artwork-illustration-abstract-hd-wallpaper-preview.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 20px;
        }
        
        h2 {
            text-align: center;
        }
        
        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        input[type="email"],
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
        
        input[type="submit"] {
            background-color: #4CAF50;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Form Registrasi</h2>
	<form action="" method="POST">
		<label>Email:</label>
		<input type="email" name="email"><br>

		<label>Username:</label>
		<input type="text" name="username"><br>

		<label>Password:</label>
		<input type="password" name="password"><br>

		<input type="submit" name="submit" value="Daftar">
	</form>
</body>
</html>

<?php
// include "koneksi.php";

if(isset($_POST['submit'])) {
  
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password = $_POST["password"];
    $hash = password_hash($password, PASSWORD_DEFAULT);
  
    include 'koneksi.php';

    $data = mysqli_query($koneksi, "INSERT INTO user_login VALUES('', '$email', '$username', '$hash')");
    if ($data) {
        header("location: data.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
    if(!isset($_POST['email']) && !isset($_POST['username']) && !isset($_POST['password'])){
        echo"Silahkan Isi Data Anda";
    }
} 
?>