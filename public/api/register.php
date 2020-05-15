<?php

include("config.php");

    $nama= $_POST['nama'];
    $email= $_POST['email'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $created_at = $_POST['created_at'];

    $sql= "INSERT INTO `pengguna` (`id_pengguna`, `nama`, `email`, `password`, `alamat`, `nohp`, `created_at`, `updated_at`) 
        VALUES (NULL, '$nama', '$email', '$password', '$alamat', '$nohp', '$created_at', NULL)";
    $query = mysqli_query($db, $sql);

    if($query) {

    } else {
        die("Gagal menyimpan perubahan...");
    }

?>