<?php

include("config.php");

$id_produk = $_POST['id_produk'];

$sql = "DELETE FROM produk WHERE id_produk = '$id_produk'";
$query = mysqli_query($db, $sql);

if ($query) {
} else {
    die("Gagal menyimpan perubahan...");
}
