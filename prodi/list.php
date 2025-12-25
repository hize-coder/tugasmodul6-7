<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Mahasiswa</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;    
        }
        
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            min-width: 300px;
        }

        .popup-buttons {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .popup-btn {
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-confirm {
            background-color: #dc3545;
            color: white;
        }

        .btn-cancel {
            background-color: #6c757d;
            color: white;
        }

        .btn-confirm:hover {
            background-color: #c82333;
        }

        .btn-cancel:hover {
            background-color: #5a6268;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 15px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-delete:hover {
            background-color: #c82333;
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

    <div style="display: flex; flex-direction: column; justify-content: center;">

        <div style="display: flex; justify-content: center; flex-direction: column; margin: 6px auto; width: 750px;">
            <h1 style="text-align: center;">List data Prodi</h1>

            <table border="1" cellpadding="10" cellspacing="0" style="text-align: center;">
                <thead style="background-color: #00bafe; color: #042e49;">
                    <tr>
                        <th>No</th>
                        <th>Nama Prodi</th>
                        <th>Jenjang</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <?php
                include('../Mahasiswa/db_connection.php');

                $tampil = mysqli_query($koneksi, 'SELECT * FROM prodi');
                $no = 1;
                while ($data = mysqli_fetch_array($tampil)) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data['nama_prodi']; ?></td>
                            <td><?php echo $data['jenjang']; ?></td>
                            <td><?php echo $data['keterangan']; ?></td>
                            <td>
                                <div style="display: flex; justify-content: space-evenly;">
                                    <button style="background-color: #00d3bb; padding: 5px 15px; border-radius: 6px; border: none;">
                                        <a href="edit.php?id=<?php echo $data['id'] ?>" style="text-decoration: none; color:#1d232a;">Edit</a>
                                    </button>
                                    <button class="btn-delete"
                                        onclick="showDeletePopup(<?php echo $data['id']; ?>, '<?php echo addslashes($data['nama_prodi']); ?>')">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                <?php
                    $no++;
                }
                ?>
            </table>
        </div>

        <div style="display: flex; justify-content: center; border: 2px solid grey; width: 460px; margin: 12px auto ; background-color: #1d232a; border-radius: 6px;">
            <p style="color: white;">Klik <button style="margin: auto; background-color: #00d3bb; width: 60px; height: 30px; border-radius: 8px; margin-left: 6px; margin-right: 6px;">
                    <a href="create.php" style="text-decoration:none; color: #084d49;">Disini</a>
                </button> untuk proses input buku tamu</p>
        </div>
    </div>

    <div id="deletePopup" class="popup-overlay">
        <div class="popup-content">
            <h3>Konfirmasi Hapus</h3>
            <p id="popupMessage">Apakah Anda yakin ingin menghapus data ini?</p>
            <div class="popup-buttons">
                <button id="confirmDelete" class="popup-btn btn-confirm">Ya,Hapus</button>
                <button id="cancelDelete" class="popup-btn btn-cancel">Batal</button>
            </div>
        </div>
    </div>

    <script>
        let studentIdToDelete = null;
        let deleteUrl = '';


        function showDeletePopup(id, name) {
            studentIdToDelete = id;

            document.getElementById('popupMessage').textContent =
                `Apakah Anda yakin ingin menghapus data "${name}"?`;

            document.getElementById('deletePopup').style.display = 'flex';

            deleteUrl = `hapus.php?id=${id}`;
        }

        function hideDeletePopup() {
            document.getElementById('deletePopup').style.display = 'none';
            studentIdToDelete = null;
        }

        document.getElementById('confirmDelete').addEventListener('click', function() {
            if (studentIdToDelete !== null) {
                window.location.href = deleteUrl;
            }
        });

        document.getElementById('cancelDelete').addEventListener('click', hideDeletePopup);

        document.getElementById('deletePopup').addEventListener('click', function(e) {
            if (e.target === this) {
                hideDeletePopup();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                hideDeletePopup();
            }
        });
    </script>



</body>

</html>