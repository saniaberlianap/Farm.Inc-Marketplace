<?php

include("config.php");

$sql = "SELECT * FROM produk ORDER BY created_at DESC";
$result = array();
$query = mysqli_query($db, $sql);

while ($row = mysqli_fetch_array($query)) {
    array_push($result, array(
        'id_produk' => $row['id_produk'],
        'kategori' => $row['kategori'],
        'nama_produk' => $row['nama_produk'],
        'deskripsi' => $row['deskripsi'],
        'harga' => $row['harga'],
        'image' => $row['image'],
        'pengguna_id' => $row['pengguna_id']
    ));
}
echo json_encode(array("result" => $result));
