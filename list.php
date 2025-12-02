<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Mahasiswa</title>
</head>

<body>

    <div style="display: flex; flex-direction: column; justify-content: center;">

        <div style="display: flex; justify-content: center; flex-direction: column; margin: 6px auto; width: 750px;">
            <h1 style="text-align: center;">List data Mahasiswa</h1>

            <table border="1" cellpadding="10" cellspacing="0" style="text-align: center;">
                <thead style="background-color: #00bafe; color: #042e49;">
                    <tr>
                        <th>No</th>
                        <th>Nim</th>
                        <th>Nama Mahasiswa</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <?php
                include('index.php');

                $tampil = mysqli_query($koneksi, 'SELECT * FROM mahasiswa');
                $no=1;
                while ($data = mysqli_fetch_array($tampil)) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data['nim']; ?></td>
                            <td><?php echo $data['nama_mhs']; ?></td>
                            <td><?php echo $data['tgl_lahir']; ?></td>
                            <td><?php echo $data['alamat']; ?></td>
                            <td><div style="display: flex; justify-content: space-between;"><button type="Edit" name="edit" style="background-color: #00bafe; margin-right: 12px; width: 50px; border-radius: 6px; flex: 1;"><a href="edit.php?id=<?php echo $data['id'] ?>" style="text-decoration: none; color:#1d232a;">Edit</a></button>|<button type="Delete" name="delete" style="background-color: #f82834; margin-left: 12px; border-radius: 6px; flex:1;"><a href="hapus.php?id=<?php echo $data['id']?>" style="text-decoration: none; color:#1d232a;">Hapus</a></button></div></td>
                        </tr>
                    </tbody>
                <?php
                $no++;
                }
                ?>
            </table>
        </div>

        <div style="display: flex; justify-content: center; border: 2px solid grey; width: 460px; margin: 12px auto ; background-color: #1d232a; border-radius: 6px;">
            <p style="color: white;">Klik <button style="margin: auto; background-color: #00d3bb; width: 60px; height: 30px; border-radius: 8px; margin-left: 6px; margin-right: 6px;"><a href="create.php" style="text-decoration:none; color: #084d49;">Disini</a></button></a>untuk proses input buku tamu</p>
        </div>
    </div>

</body>

</html>