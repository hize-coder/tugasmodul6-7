<?php
require_once __DIR__ . "/../koneksi.php";

$query = "
    SELECT mahasiswa.*, prodi.nama_prodi
    FROM mahasiswa
    JOIN prodi ON mahasiswa.id_prodi = prodi.id
";

$result = mysqli_query($koneksi, $query);
$no = 1;
?>


<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold mb-0">List Data Mahasiswa</h5>
    <a href="index.php?p=create_mhs" class="btn btn-primary btn-sm">
        Tambah Mahasiswa
    </a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle text-center">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Program Studi</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['nim']) ?></td>
                        <td><?= htmlspecialchars($row['nama_mhs']) ?></td>
                        <td><?= htmlspecialchars($row['tgl_lahir']) ?></td>
                        <td><?= htmlspecialchars($row['alamat']) ?></td>
                        <td><?= htmlspecialchars($row['nama_prodi']) ?></td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="index.php?p=edit_mhs&id=<?= $row['id'] ?>"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <button class="btn btn-danger btn-sm"
                                    onclick="showDeletePopup(
                                        <?= $row['id'] ?>,
                                        '<?= addslashes($row['nama_mhs']) ?>'
                                    )">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-muted">
                        Data mahasiswa belum tersedia
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- POPUP HAPUS -->
<div id="deletePopup" class="popup-overlay">
    <div class="popup-content">
        <h5>Konfirmasi Hapus</h5>
        <p id="popupMessage"></p>
        <div class="popup-buttons">
            <button id="confirmDelete" class="popup-btn btn-confirm">Ya, Hapus</button>
            <button id="cancelDelete" class="popup-btn btn-cancel">Batal</button>
        </div>
    </div>
</div>

<script>
    let deleteUrl = '';

    function showDeletePopup(id, nama) {
        document.getElementById('popupMessage').innerText =
            `Apakah Anda yakin ingin menghapus data "${nama}"?`;

        deleteUrl = `index.php?p=hapus_mhs&id=${id}`;
        document.getElementById('deletePopup').style.display = 'flex';
    }

    document.getElementById('confirmDelete').onclick = function () {
        window.location.href = deleteUrl;
    };

    document.getElementById('cancelDelete').onclick = function () {
        document.getElementById('deletePopup').style.display = 'none';
    };
</script>

<style>
.popup-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,.5);
    z-index: 1050;
    justify-content: center;
    align-items: center;
}
.popup-content {
    background: #fff;
    padding: 25px;
    border-radius: 10px;
    min-width: 300px;
    text-align: center;
}
.popup-buttons {
    margin-top: 15px;
    display: flex;
    justify-content: center;
    gap: 10px;
}
.popup-btn {
    border: none;
    padding: 6px 16px;
    border-radius: 6px;
    cursor: pointer;
}
.btn-confirm {
    background: #dc3545;
    color: #fff;
}
.btn-cancel {
    background: #6c757d;
    color: #fff;
}
</style>
