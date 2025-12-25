<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Data</title>
</head>

<body>

    <?php
    include('db_connection.php');
    ?>
    <div style="margin: auto; background-color: #141414; width: 500px; padding: 12px 12px; border-radius: 6px; ">

        <form method="post">
            <h1 style="text-align: center; color:white;">Input Data Mahasiswa</h1>

            <div style="display: flex; flex-direction: column; gap: 12px;">
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <label for="nim" style="color: white;">Nim</label>
                    <input type="text" name="nim" id="nim" placeholder="Masukkan Nim Anda" style="width: 480px; height: 32px;">
                </div>

                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <label for="nama_mhs" style="color: white;">Nama</label>
                    <input type="text" name="nama_mhs" id="nama_mhs" placeholder="Masukkan Nama Anda" style="width: 480px; height: 32px;">
                </div>

                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <label for="tgl_lahir" style="color: white;">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" style="width: 120px; height: 40px;">
                </div>

                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <label for="alamat" style="color: white;">Alamat</label>
                    <input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat Anda" style="width: 480px; height: 32px;">
                </div>

                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <label for="tgl_lahir" style="color: white;">Prodi</label>
                    <select name="prodi" id="prodi" style="height: 32px; margin-bottom: 12px;">
                        <option value="" disabled selected>Pilih Prodi</option>
                        <?php
                        $tampil = mysqli_query($koneksi, 'SELECT * FROM prodi');

                        while ($data = mysqli_fetch_array($tampil)) {
                        ?>
                            <option value="<?php echo $data['id'] ?>"><?php echo $data['nama_prodi'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div style="display: flex; flex-direction: row; gap:12px; justify-content: space-between;">
                    <button type="submit" name="Submit" style="background-color: #2779a9ff; color: #f7f9fa; border-radius: 6px; width: 60px; height: 30px;">Submit</button>
                    <button type="reset" name="Reset" style="background-color: #2779a9ff; color: #f7f9fa; border-radius: 6px; width: 60px; height: 30px; margin-right: 12px;">Reset</button>
                </div>
        </form>
    </div>

    <?php

    if (isset($_POST['Submit'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama_mhs'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $prodi = $_POST['prodi'];

        $sql = mysqli_query($koneksi, "INSERT INTO mahasiswa(nim,nama_mhs,tgl_lahir,alamat,id_prodi)
            VALUES ('$nim', '$nama', '$tgl_lahir', '$alamat', '$prodi')");

        if ($sql) {
            echo "Terimakasih telah mengisi data mahasiswa <br>";
            echo "<a style='color :#2779a9ff; ' href=../index.php>Tampilkan list data mahasiswa</a>";
        } else {
            echo "Proses input data mahasiswa";
        }
    }

    ?>
</body>

</html>