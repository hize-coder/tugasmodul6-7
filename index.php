<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_akademik";

$koneksi = mysqli_connect($hostname, $username, $password, $database);

if (!$koneksi) {
    echo "Koneksi error: " . mysqli_connect_error();
    exit;
}
?>