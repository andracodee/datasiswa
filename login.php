<?php 
session_start();
require 'functions.php';
if (isset($_POST["btn-sub"])) {
 $username=$_POST["username"];
 $password=$_POST["password"];
//  ambil data dari database berdasarkan username
$data=mysqli_query($koneksi, "SELECT * FROM login WHERE username='$username'");
// var_dump(mysqli_num_rows($data));
// exit;
// cek username
if (mysqli_num_rows($data) === 1) {
    
    // cek password
    $cekData=mysqli_fetch_assoc($data);
    if(password_verify($password, $cekData["password"])){
        $_SESSION["username"]=$cekData["username"];
        $_SESSION["login"]=true;
        header("Location: index.php");
    }
}
$error=true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
</head>
<body>
    <h1>FORM LOGIN</h1>
    <?php if (isset($error)) {?>
    <p style="color:red; font-style:italic"> Password salah </p>
    <?php }?>
    <form action="" method="post">
    <label for="user">USERNAME:</label>
    <input type="text" name="username" id="user">
    <br><br>
    <label for="pass">PASSWORD:</label>
    <input type="password" name="password" id="pass">
    <br><br>
    <button type="submit" name="btn-sub">Login</button>
    </form>
    <p>Kamu belum mempunyai akun? <a href="daftar.php">Daftar</a>Dulu yuk!</p>
</body>
</html>