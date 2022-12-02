<?php 
require 'functions.php';

// tangkap data id dari URL
$id = $_GET ["id"];


// lakukan query data berdasarkan id
$siswa = query ("SELECT * FROM murid WHERE id = $id") [0];
// var_dump($siswa);
// exit;

// cek apakah tombol kirim sudah ditekan
if (isset ($_POST["tekan"])) {
     // cek apakah data berhasil diubah
        if (ubah ($_POST) > 0){
            echo "<script>
                    alert ('data berhasil diubah')
                    document.location.href = 'index.php';
                  </script>
            ";
        } else {
            echo "<script>
                    alert ('data gagal diubah');
                    history.go(-1);
                  </script>
            ";
        }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>Form Ubah</h1>

<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $siswa ["id"]; ?>">
    <input type="hidden" name="gambarlama" value="<?= $siswa ["gambar"]; ?>">
    <ul>
        <li>
            <label for="nama">Nama :</label>
            <input type="text" name="nama" id="nama" value="<?= $siswa ["nama"]; ?>">
        </li>
        <li>
            <label for="nis">Nisn :</label>
            <input type="text" name="nis" id="nis" value="<?= $siswa ["nisn"]; ?>">
        </li>
        <li>
            <label for="email">Email :</label>
            <input type="text" name="email" id="email" value="<?= $siswa ["email"]; ?>">
        </li>
        <li>
            <label for="jur">Jurusan :</label>
            <input type="text" name="jurusan" id="jur" value="<?= $siswa ["jurusan"]; ?>">
        </li>
        <li>
            <label for="gambar">Gambar :</label><br>
            <img src="img/<?= $siswa ['gambar']; ?>" width="75">
            <input type="file" name="gambar" id="gambar" value="<?= $siswa ["gambar"]; ?>">
        </li>
        <li>
            <button type="submit" name="tekan">KIRIM DATA!!</button>
        </li>
    </ul>

</body>
</html>