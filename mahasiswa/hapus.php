<?php 
    include('db_connection.php');
    
    $hapus = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $_GET[id]");
    
    if ($hapus) {
        header ('location: ../index.php');
    }
    else {
        print('gagal menghapus data');
    }

?>