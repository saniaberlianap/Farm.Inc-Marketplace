<?php

$server = "localhost";
$user = "id13569221_farm";
$password = "({c@)Id3w4Y8dOw&";
$nama_database = "id13569221_farmdb";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
