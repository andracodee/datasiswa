<?php 
require 'functions.php';
$id=$_GET['id'];
if (hapus($id) > 0) {
    echo "<script>
    alert('Data berhasi dihapus!');
    document.location.href='index.php';
    </script>";
}
else {
    echo "<script>
    alert('Data gagal dihapus!');
    history.go(-1);
    </script>";
}
?>