<?php

include("config.php");

$email= $_POST['email'];
$password= $_POST['password'];

$sql = "SELECT * FROM pengguna WHERE email='$email' AND password='$password'";
$result = array();
$query = mysqli_query($db, $sql);
$stat=mysqli_num_rows ( $query ); 

while ($row = mysqli_fetch_array($query)) {
    array_push($result, array(
        'status' => $stat,
        'id_pengguna' => $row['id_pengguna'],
        'nama' => $row['nama']
    ));
}
echo json_encode(array("result" => $result));
