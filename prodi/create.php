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
        <div style="color: white; font-size: 25px; margin: auto 0px auto 12px;">Prodi</div>
        <div style="display: flex; gap: 6px; margin: auto 12px auto 0px;">
            <a href="../Home" style="text-decoration: none; color: #e4e4e4;">Home</a>
            <a href="../Mahasiswa/create.php" style="text-decoration: none; color: #e4e4e4;">Mahasiswa</a>
            <a href="/Prodi/create.php" style="text-decoration: none; color: #e4e4e4;">Prodi</a>
        </div>
    </div>

    <div style="margin: auto; background-color: #1d232a; width: 500px; padding: 12px 12px; border-radius: 6px; ">

        <form method="post">
            <h1 style="text-align: center; color:white;">Input Data Prodi</h1>

                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <label for="nama_mhs" style="color: white;">Nama Prodi</label>
                    <input type="text" name="nama_prodi" id="nama_prodi" placeholder="Masukkan Nama Prodi Anda" style="height: 32px; margin-bottom: 12px;">
                </div>

                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <label for="tgl_lahir" style="color: white;">Jenjang</label>
                    <select name="jenjang" id="jenjang" style="height: 32px; margin-bottom: 12px;">
                        <option value="" disabled selected>Pilih Jenjang</option>
                        <option value="d2">D2</option>
                        <option value="d3">D3</option>
                        <option value="d4">D4</option>
                        <option value="s2">S2</option>
                    </select>
                </div>

                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <label for="alamat" style="color: white;">Keterangan</label>
                    <input type="text" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan Anda" style="height: 32px; margin-bottom: 12px;">
                </div>
                <div style="display: flex; flex-direction: row; gap:12px; justify-content: space-between;">
                    <button type="submit" name="Submit" style="background-color: #00d3bb; color: #084d49; border-radius: 6px; width: 60px; height: 30px;">Submit</button>
                    <button type="reset" name="Reset" style="background-color: #00d3bb; color: #084d49; border-radius: 6px; width: 60px; height: 30px;">Reset</button>
                </div>
        </form>
    </div>

    <?php

    include('../Mahasiswa/db_connection.php');

    if (isset($_POST['Submit'])) {
        $nama_prodi = $_POST['nama_prodi'];
        $jenjang = $_POST['jenjang'];
        $keterangan = $_POST['keterangan'];

        $sql = mysqli_query($koneksi, "INSERT INTO prodi(nama_prodi,jenjang,keterangan)
            VALUES ('$nama_prodi', '$jenjang', '$keterangan')");

        if ($sql) {
            echo "Terimakasih telah mengisi data prodi <br>";
            echo "<a href=list.php>Tampilkan list data prodi</a>";
        } else {
            echo "Proses input data prodi gagal";
        }
    }

    ?>
</body>

</html>