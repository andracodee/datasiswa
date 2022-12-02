<?php
require 'functions.php';

// query ke database
// $sql = "INSERT INTO siswa VALUES ()";

if ( isset ($_POST ["tekan"]) ) {

    if ( tambah ($_POST) > 0 ) {
        echo "
        <script>
            alert ('data berhasil ditambahkan');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert ('data gagal ditambahkan');
            document.location.href = 'index.php';
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
    <title>Tambah Data Siswa</title>
</head>
<body>
    
<h1>Form tambah</h1>

<form action="" method="post" enctype="multipart/form-data">
    <ul>
        <li>
            <label for="nama">NAMA :</label>
            <input type="text" name="nama" id="nama">
        </li>
        <li>
            <label for="nisn">NISN :</label>
            <input type="text" name="nis" id="nisn">
        </li>
        <li>
            <label for="jurusan">JURUSAN :</label>
            <input type="text" name="jurusan" id="jurursan">
        </li>
        <li>
            <label for="email">EMAIL :</label>
            <input type="text" name="email" id="email">
        </li>
        <li>
            <label for="gambar">GAMBAR :</label>
            <input type="file" name="gambar" id="gambar">
        </li>
        <li>
            <button type="submit" name="tekan">KIRIM DATA</button>
    </ul>

</form>

</body>
</html>