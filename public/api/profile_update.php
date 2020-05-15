<?php

include("config.php");

    $id_pengguna = $_POST['id_pengguna'];
    $nama= $_POST['nama'];
    $email= $_POST['email'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $updated_at = $_POST['updated_at'];

    $sql= "UPDATE `pengguna` SET nama = '$nama', email = '$email', password = '$password', alamat = '$alamat', nohp = '$nohp', updated_at = '$updated_at' WHERE id_pengguna = '$id_pengguna'";
    $query = mysqli_query($db, $sql);

    if($query) {

    } else {
        die("Gagal menyimpan perubahan...");
    }

?>