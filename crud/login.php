<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello Bro! Link login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="overlay"></div>
    <form action="" method="POST" class="box">
        <div class="header">
            <h4>Login To Your Account</h4>
            <p>Sebelum masuk silahkan isi data dibawah sini!</p>
        </div>
        <div class="login-area">
            <!-- <label for="username">Masukkan Username : </label>
            <br> -->
            <input type="text" name="username"class="username" placeholder="Username">
            <!-- <label for="password">Masukkan Password : </label>
            <br> -->
            <input type="password" name="password" class="password" placeholder="Password">
            <input type="submit" name="submit" class="login-button">
            <!-- <a href="">Forgot Password?</a> -->
            <a href="registrasi.php">Registrasi</a>
        </div>
    </form>
</body>
</html>

<?php
// include "koneksi.php";
session_start();

include 'koneksi.php';

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM user_login WHERE username='$username'");

    $cek = mysqli_fetch_assoc($query);

        
    if(isset($cek)){
        if (password_verify($password, $cek['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "login";

            header("location:data.php");
        } else {
            echo "<script>alert('Incorrect username and password');
            document.location.href='login.php'</script>\n";
        }
    }else {
        echo "<script>alert('Incorrect username and password');
        document.location.href='login.php'</script>\n";
    }
}
?>