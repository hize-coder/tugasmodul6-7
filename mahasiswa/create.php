<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Data Mahasiswa</title>
</head>

<body>

<?php
// koneksi database (sesuaikan lokasi file)
include "./koneksi.php";
?>

<div style="margin: auto; background-color: #141414; width: 500px; padding: 12px; border-radius: 6px;">

    <form method="post">
        <h1 style="text-align: center; color:white;">Input Data Mahasiswa</h1>

        <div style="display: flex; flex-direction: column; gap: 12px;">

            <label style="color:white;">NIM</label>
            <input type="text" name="nim" required style="height:32px;">

            <label style="color:white;">Nama Mahasiswa</label>
            <input type="text" name="nama_mhs" required style="height:32px;">

            <label style="color:white;">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" required style="height:32px;">

            <label style="color:white;">Alamat</label>
            <input type="text" name="alamat" required style="height:32px;">

            <label style="color:white;">Program Studi</label>
            <select name="id_prodi" required style="height:32px;">
                <option value="">-- Pilih Prodi --</option>
                <?php
                $q = mysqli_query($koneksi, "SELECT * FROM prodi");
                while ($p = mysqli_fetch_assoc($q)) {
                    echo "<option value='{$p['id']}'>{$p['nama_prodi']}</option>";
                }
                ?>
            </select>

            <div style="display:flex; justify-content:space-between; margin-top:12px;">
                <button type="submit" name="Submit"
                    style="background:#2779a9; color:white; border-radius:6px; width:80px; height:32px;">
                    Submit
                </button>

                <button type="reset"
                    style="background:#6c757d; color:white; border-radius:6px; width:80px; height:32px;">
                    Reset
                </button>
            </div>
        </div>
    </form>
</div>

<?php
// PROSES SIMPAN
if (isset($_POST['Submit'])) {

    $nim       = $_POST['nim'];
    $nama      = $_POST['nama_mhs'];
    $tgl       = $_POST['tgl_lahir'];
    $alamat    = $_POST['alamat'];
    $id_prodi  = $_POST['id_prodi'];

    $sql = mysqli_query(
        $koneksi,
        "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat, id_prodi)
         VALUES ('$nim', '$nama', '$tgl', '$alamat', '$id_prodi')"
    );

    if ($sql) {
        echo "<p style='color:lime; text-align:center; margin-top:10px;'>
                Data mahasiswa berhasil disimpan
              </p>
              <p style='text-align:center;'>
                <a href='../index.php?p=data_mhs' style='color:#2779a9;'>Lihat Data Mahasiswa</a>
              </p>";
    } else {
        echo "<p style='color:red; text-align:center;'>Gagal menyimpan data</p>";
    }
}
?>

</body>
</html>
