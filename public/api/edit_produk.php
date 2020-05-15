<?php

include("config.php");

$id_produk = $_POST['id_produk'];
$kategori = $_POST['kategori'];
$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$image = $_POST['image'];
$updated_at = $_POST['updated_at'];

$sql = "UPDATE `produk` SET kategori = '$kategori', nama_produk = '$nama_produk', deskripsi = '$deskripsi', harga = '$harga', image = '$image', updated_at = '$updated_at' WHERE id_produk = '$id_produk'";
$query = mysqli_query($db, $sql);

if ($query) {
} else {
    die("Gagal menyimpan perubahan...");
}
