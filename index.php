<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:login.php");
}
require 'functions.php';
$hasil = query ("SELECT * FROM murid");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List pelajar | sekolahsaya.sch.id</title>
    <script>
        alert('selamat datang !');
    </script>
</head>
<body>
    <h3><u>List pelajar | sekolahsaya.sch.id</u></h3>
    <ol>
        <li>Aksi:</li>
        <li><a href="tambah.php">Tambah Daftar Siswa</a></li>
        <?php if (isset($_SESSION["login"])== true) : ?>
        <p>Selamat datang,<?=strtoupper($_SESSION["username"]) ?></p>
        <?php endif; ?>
        
    </ol>
    <label for="cari">Cari data...</label>
    <input type="text" name="cari" id="cari">
    <button>search!</button>
    <br><br>
    <table border="1" cellspacing="0">
        <tr>
            <td>No.</td>
            <td>NISN</td>
            <td>Nama</td>
            <td>Jurusan</td>
            <td>Email</td>
            <td>Foto Kamu</td>
            <td>Aksi</td>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($hasil as $cetak) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $cetak ['nisn']?></td>
            <td><?= $cetak ['nama']?></td>
            <td><?= $cetak ['jurusan']?></td>
            <td><?= $cetak ['email']?></td>
            <td><img src="img/<?= $cetak ['gambar']; ?>" widht="100"
            height="100"></td>
            <td>
                <a href="ubah.php?id=<?= $cetak ['id']?>">ubah</a>
                <a href="hapus.php?id=<?= $cetak ['id']?>"
                onclick="return confirm ('yakin ?')">hapus</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach;?>
        </table>
        <a href="login.php">LogOut</a>
</body>
</html>