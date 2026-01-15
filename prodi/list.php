<?php
include "koneksi.php";


$tampil = mysqli_query($koneksi, "SELECT * FROM prodi");
$no = 1;
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold">List Data Prodi</h4>
    <a href="index.php?p=create_prodi" class="btn btn-primary btn-sm">
        Tambah Prodi
    </a>
</div>

<table class="table table-bordered table-hover text-center align-middle">
    <thead class="table-info">
        <tr>
            <th>No</th>
            <th>Nama Prodi</th>
            <th>Jenjang</th>
            <th>Keterangan</th>
            <th width="150">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (mysqli_num_rows($tampil) > 0): ?>
            <?php while ($data = mysqli_fetch_assoc($tampil)): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($data['nama_prodi']) ?></td>
                    <td><?= htmlspecialchars($data['jenjang']) ?></td>
                    <td><?= htmlspecialchars($data['keterangan']) ?></td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="index.php?p=edit_prodi&id=<?= $data['id'] ?>"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>
                            <button class="btn btn-danger btn-sm"
                                onclick="showDeletePopup(<?= $data['id'] ?>, '<?= addslashes($data['nama_prodi']) ?>')">
                                Hapus
                            </button>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-muted">Data prodi belum tersedia</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

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

    function showDeletePopup(id, name) {
        document.getElementById('popupMessage').innerText =
            `Apakah Anda yakin ingin menghapus data "${name}"?`;

        deleteUrl = `index.php?p=hapus_prodi&id=${id}`;
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
    text-align: center;
    min-width: 300px;
}
.popup-buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 15px;
}
.popup-btn {
    padding: 6px 16px;
    border-radius: 6px;
    border: none;
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
