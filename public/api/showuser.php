<?php

include("config.php");

$id_pengguna= $_POST['id_pengguna'];

$sql= "SELECT * FROM pengguna WHERE id_pengguna = '$id_pengguna'";
$result = array();
$query = mysqli_query($db, $sql);

while ($row = mysqli_fetch_array($query)) {
    array_push($result, array(
        'id_pengguna' => $row['id_pengguna'],
        'nama' => $row['nama'],
        'email' => $row['email'],
        'password' => $row['password'],
        'alamat' => $row['alamat'],
        'nohp' => $row['nohp']
    ));
}
echo json_encode(array("result" => $result));