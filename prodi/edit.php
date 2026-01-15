<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Data</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
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

    <?php
    include('./Mahasiswa/db_connection.php');

    $edit = mysqli_query($koneksi, "SELECT * FROM prodi WHERE id = $_GET[id]");
    $data = mysqli_fetch_array($edit);
    ?>

    <div style="margin: auto; background-color: #1d232a; width: 500px; padding: 12px 12px; border-radius: 6px; ">

        <form method="post">
            <h1 style="text-align: center; color:white;">Input Data Prodi</h1>

            <div style="display: flex; flex-direction: column; gap: 12px;">
                <label for="nama_mhs" style="color: white;">Nama Prodi</label>
                <input type="text" value="<?php echo $data['nama_prodi'] ?>" name="nama_prodi" id="nama_prodi" placeholder="Masukkan Nama Prodi Anda" style="height: 32px;">
            </div>

            <div style="display: flex; flex-direction: column; gap: 12px;">
                <label for="jenjang" style="color: white;">Jenjang</label>
                <select name="jenjang" id="jenjang" style="height: 32px; margin-bottom: 12px;">
                    <option value="" disabled>Pilih Jenjang</option>
                    <option value="d2" <?php echo ($data['jenjang'] == 'd2') ? 'selected' : ''; ?>>D2</option>
                    <option value="d3" <?php echo ($data['jenjang'] == 'd3') ? 'selected' : ''; ?>>D3</option>
                    <option value="d4" <?php echo ($data['jenjang'] == 'd4') ? 'selected' : ''; ?>>D4</option>
                    <option value="s2" <?php echo ($data['jenjang'] == 's2') ? 'selected' : ''; ?>>S2</option>
                </select>
            </div>

            <div style="display: flex; flex-direction: column; gap: 12px;">
                <label for="alamat" style="color: white;">Keterangan</label>
                <input type="text" value="<?php echo $data['keterangan'] ?>" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan Anda" style="width: 480px; height: 32px;">
            </div>
            <div style="display: flex; flex-direction: row; gap:12px; justify-content: space-between;">
                <button type="submit" name="Submit" style="background-color: #00d3bb; color: #084d49; border-radius: 6px; width: 60px; height: 30px;">Edit</button>
                <button type="reset" name="Reset" style="background-color: #00d3bb; color: #084d49; border-radius: 6px; width: 60px; height: 30px; margin-right: 12px;">Reset</button>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['Submit'])) {

        $nama_prodi = $_POST['nama_prodi'];
        $jenjang    = $_POST['jenjang'];
        $keterangan = $_POST['keterangan'];
        $id         = $_GET['id'];

        $update = mysqli_query(
            $koneksi,
            "UPDATE prodi SET 
            nama_prodi='$nama_prodi',
            jenjang='$jenjang',
            keterangan='$keterangan'
         WHERE id='$id'"
        );

        if ($update) {
            echo "
            <script>
            window.location.href = list.php;
            </script>";
            exit;
        } else {
            echo "Proses edit data prodi gagal";
        }
    }
    ?>

</body>

</html>