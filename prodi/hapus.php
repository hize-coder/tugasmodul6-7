<?php 
    include('../Mahasiswa/db_connection.php');
    
    $hapus = mysqli_query($koneksi, "DELETE FROM prodi WHERE id = $_GET[id]");
    
    if ($hapus) {
        header ('location: list.php');
    }
    else {
        print('gagal menghapus data');
    }

?>