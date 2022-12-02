<?php
$koneksi = mysqli_connect('localhost','root','','andra_db');

function query($query)
{
    global $koneksi;
    $hasil = mysqli_query($koneksi, $query);//nilai objek
    $kotakbesar = [];
    while ($kotakkecil = mysqli_fetch_assoc($hasil)){
        $kotakbesar [] = $kotakkecil;
    }
    return $kotakbesar;
}
    function tambah ($post) {
        global $koneksi;

        $nama = $post["nama"];
        $nis = $post["nis"];
        $email = $post["email"];
        $jurusan = $post["jurusan"];
        // $gambar = $post["gambar"];

        $gambar = upload ();
        if (!$gambar) {
            return false;
        }

        $sql = "INSERT INTO murid VALUES (
            '', '$nis', '$nama', '$jurusan', '$email', '$gambar' 
        )";

        $hasil = mysqli_query ($koneksi, $sql);

        return mysqli_affected_rows ($koneksi);

    }

    function upload (){
        $namafile = $_FILES ["gambar"]["name"];
        $ukuranfile = $_FILES ["gambar"]["size"];
        $error = $_FILES ["gambar"]["error"];
        $tmpname = $_FILES ["gambar"]["tmp_name"];

        if ( $error === 4) {
            echo "<script>
                    alert ('plih gambar dahulu');
                  </script>";
                  return false;
        }
        $ekstensiValid = ['jpg','jpeg','png'];
        $ekstensigambar = explode ('.', $namafile);
        $ekstensigambar = strtolower (end($ekstensigambar));

        if ( !in_array($ekstensigambar, $ekstensiValid)){
            echo "
            <script>
                alert ('file yang diupload bukan gambar');
            </script>";
            return false;
        }
        if ( $ukuranfile > 2000000) {
            echo "<script>
                    alert ('maaf, ukuran gambar terlalu besar');
                  </script>";
                  return false;
        }
        $namafileBaru = uniqid();
        $namafileBaru .= '.';
        $namafileBaru .= $ekstensigambar;

        move_uploaded_file ($tmpname, 'img/' . $namafileBaru);
        return $namafileBaru;
    }

    function ubah ($post) {
        global $koneksi;

        $id = htmlspecialchars($post["id"]);
        $nama = htmlspecialchars($post["nama"]);
        $nis = htmlspecialchars($post["nis"]);
        $email = htmlspecialchars($post["email"]);
        $jurusan = htmlspecialchars($post["jurusan"]);
        $gambarlama = htmlspecialchars($post["gambarlama"]);
    
        if ( $_FILES ["gambar"]["error"] === 4){
            $gambar = $gambarlama;
        } else {
            $gambar = upload();
        }

        
        $sql = "UPDATE murid SET
            nama = '$nama',
            nisn = '$nis',
            email = '$email',
            jurusan = '$jurusan',
            gambar = '$gambar'
            
            WHERE id = $id";

    mysqli_query ($koneksi, $sql);
    return mysqli_affected_rows($koneksi);
        
}

function hapus($id){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM murid WHERE id=$id");
    return mysqli_affected_rows($koneksi);
}

function register($post){
    global $koneksi;
    $username=strtolower(stripslashes($post["username"]));
    $password=mysqli_real_escape_string($koneksi, $post["password"]);
    $password2=mysqli_real_escape_string($koneksi, $post["password2"]);
    $result=mysqli_query($koneksi, "SELECT * FROM login WHERE username='$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username telah terdaftar!');
        </script>";
    return false;    
    }if ($password != $password2) {
        echo "<script>
    alert('Konfirmasi password kamu salah!');
    </script>";
    return false;
    }  
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($koneksi,"INSERT INTO login VALUES('','$username','$password')");
    return mysqli_affected_rows($koneksi);
}
?>        