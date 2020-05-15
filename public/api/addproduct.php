<?php

include("config.php");

    $pengguna_id = $_POST['pengguna_id'];
    $kategori = $_POST['kategori'];
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $image = $_POST['image'];
    $created_at = $_POST['created_at'];

    $sql= "INSERT INTO `produk` (`id_produk`, `pengguna_id`, `kategori`, `nama_produk`, `deskripsi`, `harga`, `image`, `created_at`, `updated_at`) 
        VALUES (NULL, '$pengguna_id', '$kategori', '$nama_produk', '$deskripsi', '$harga', '$image', '$created_at', NULL)";
    $query = mysqli_query($db, $sql);

    if($query) {

    } else {
        die("Gagal menyimpan perubahan...");
    }
