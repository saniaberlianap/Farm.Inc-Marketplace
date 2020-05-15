<?php

include("config.php");

$id_produk = $_POST['id_produk'];

$sql = "SELECT DISTINCT nohp, alamat FROM pengguna WHERE id_pengguna = (SELECT pengguna_id FROM produk WHERE id_produk = '$id_produk')";
$result = array();
$query = mysqli_query($db, $sql);

while ($row = mysqli_fetch_array($query)) {
    array_push($result, array(
        'nohp' => $row['nohp'],
        'alamat' => $row['alamat']
        // 'pengguna_id' => $row['pengguna_id']
    ));
}
echo json_encode(array("result" => $result));
