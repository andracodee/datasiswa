<?php 
require 'functions.php';

if (isset($_POST["tekan"])) {
    
    if (register($_POST) > 0) {
    echo "<script>
            alert('user baru berhasil ditambahkan!');
            document.location.href='login.php';
          </script>";
    }else {
        echo mysqli_error($koneksi);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Daftar</title>
</head>
<body>
<h2>-Form Daftar-</h2> 
<form action="" method="post">
    <ul>
    <label for="username">Username : </label>
    <input type="text" name="username" id="username">
    </ul>
    <ul>
    <label for="password">Password : </label>
    <input type="password" name="password" id="password">
    </ul>
    <ul>
    <label for="password2">Confirm Password : </label>
    <input type="password" name="password2" id="password2">
    </ul>
    <button type="submit" name="tekan">Daftar!</button>
</form>   
</body>
</html>