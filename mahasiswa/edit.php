<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Data</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>

    <div style="background-color: #1d232a; margin-bottom: 25px; height: 50px; display: flex; justify-content: space-between;">
        <div style="color: white; font-size: 25px; margin: auto 0px auto 12px;">Mahasiswa</div>
        <div style="display: flex; gap: 6px; margin: auto 12px auto 0px;">
            <a href="../Home" style="text-decoration: none; color: #e4e4e4;">Home</a>
            <a href="/Mahasiswa/create.php" style="text-decoration: none; color: #e4e4e4;">Mahasiswa</a>
            <a href="../Prodi/create.php" style="text-decoration: none; color: #e4e4e4;">Prodi</a>
        </div>
    </div>
    
    <?php
    include('db_connection.php');

    $edit = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id = $_GET[id]");
    $data = mysqli_fetch_array($edit);
    ?>

    <div style="margin: auto; background-color: #1d232a; width: 500px; padding: 12px 12px; border-radius: 6px; ">

        <form method="post">
            <h1 style="text-align: center; color:white;">Input Data Mahasiswa</h1>

            <div style="display: flex; flex-direction: column; gap: 12px;">
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <label for="nim" style="color: white;">Nim</label>
                    <input type="text" value="<?php echo $data['nim'] ?>" name="nim" id="nim" placeholder="Masukkan Nim Anda" style="width: 480px; height: 32px;">
                </div>

                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <label for="nama_mhs" style="color: white;">Nama</label>
                    <input type="text" value="<?php echo $data['nama_mhs'] ?>" name="nama_mhs" id="nama_mhs" placeholder="Masukkan Nama Anda" style="width: 480px; height: 32px;">
                </div>

                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <label for="tgl_lahir" style="color: white;">Tanggal Lahir</label>
                    <input type="date" value="<?php echo date('Y-m-d', strtotime($data['tgl_lahir'])) ?>" name="tgl_lahir" id="tgl_lahir" style="width: 120px; height: 40px;">
                </div>

                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <label for="alamat" style="color: white;">Alamat</label>
                    <input type="text" value="<?php echo $data['alamat'] ?>" name="alamat" id="alamat" placeholder="Masukkan Alamat Anda" style="width: 480px; height: 32px;">
                </div>
                
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <label for="tgl_lahir" style="color: white;">Prodi</label>
                    <select name="prodi" id="prodi" style="height: 32px; margin-bottom: 12px;">
                        <option value="" disabled selected>Pilih Prodi</option>
                        <?php
                            $tampil = mysqli_query($koneksi,'SELECT * FROM prodi');
                            
                            while($data = mysqli_fetch_array($tampil)){
                        ?>
                        <option value="<?php echo $data['id']?>"><?php echo $data['nama_prodi']?></option>
                        <?php    
                            }
                        ?>
                    </select>
                </div>
                
                <div style="display: flex; flex-direction: row; gap:12px; justify-content: space-between;">
                    <button type="submit" name="Submit" style="background-color: #00d3bb; color: #084d49; border-radius: 6px; width: 60px; height: 30px;">Edit</button>
                    <button type="reset" name="Reset" style="background-color: #00d3bb; color: #084d49; border-radius: 6px; width: 60px; height: 30px; margin-right: 12px;">Reset</button>
                </div>
        </form>
    </div>

    <?php

    if (isset($_POST['Submit'])) {

        $update = mysqli_query($koneksi, "UPDATE mahasiswa SET nim = '$_POST[nim] ', nama_mhs = '$_POST[nama_mhs]', tgl_lahir = '$_POST[tgl_lahir]', alamat = '$_POST[alamat]', id_prodi = '$_POST[prodi]' WHERE id = $_GET[id]");

        if ($update) {
            echo "Terimakasih telah mengedit data mahasiswa <br>";
            echo "<a href=list.php style='text-align:center;'>Tampilkan list tamu</a>";
        } else {
            echo "Proses edit data mahasiswa gagal";
        }
    }
    ?>
</body>

</html>