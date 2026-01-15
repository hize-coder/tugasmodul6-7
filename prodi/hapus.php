<?php
include("./Mahasiswa/db_connection.php");  

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan");
}

$id = (int) $_GET['id'];

$hapus = mysqli_query($koneksi, "DELETE FROM prodi WHERE id = $id");

if ($hapus) {
    header("Location: ../index.php?p=data_prodi");
    exit;
} else {
    echo "Gagal menghapus data";
}
