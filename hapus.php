<?php 
    include('index.php');
    
    $hapus = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $_GET[id]");
    
    if ($hapus) {
        header ('location: list.php');
    }
    else {
        print('gagal menghapus data');
    }

?>