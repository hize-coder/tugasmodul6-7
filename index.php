<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Akademik</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            background: whitesmoke;
        }

        .content-card {
            border-radius: 16px;
            border: none;
            box-shadow: 0 6px 18px rgba(0, 0, 0, .06);
        }

        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, .06);
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">Data Akademik</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav gap-1">
                    <a class="nav-link <?= (!isset($_GET['p']) || $_GET['p'] == 'home') ? 'active fw-semibold' : '' ?>"
                        href="index.php">Home</a>

                    <a class="nav-link <?= (isset($_GET['p']) && str_contains($_GET['p'], 'mhs')) ? 'active fw-semibold' : '' ?>"
                        href="index.php?p=data_mhs">Mahasiswa</a>

                    <a class="nav-link <?= (isset($_GET['p']) && str_contains($_GET['p'], 'prodi')) ? 'active fw-semibold' : '' ?>"
                        href="index.php?p=data_prodi">Program Studi</a>
                </div>

                <div class="ms-auto d-flex align-items-center gap-2">
                    <a href="pengguna/edit.php"
                        class="btn btn-sm d-flex align-items-center gap-1"
                        title="Edit Profil">
                        <i class="bi bi-person-circle fs-5"></i>
                        <span><?= htmlspecialchars($_SESSION['nama'] ?? 'Pengguna') ?></span>
                    </a>

                    <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
                </div>

            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="container py-4 flex-grow-1">

        <!-- JUDUL HALAMAN -->
        <h4 class="fw-bold mb-3">
            <?php
            $p = $_GET['p'] ?? 'home';
            if ($p == 'data_mhs') echo "Data Mahasiswa";
            elseif ($p == 'create_mhs') echo "Tambah Mahasiswa";
            elseif ($p == 'edit_mhs') echo "Edit Mahasiswa";
            elseif ($p == 'hapus_mhs') echo "Hapus Mahasiswa";
            elseif ($p == 'data_prodi') echo "Data Program Studi";
            elseif ($p == 'create_prodi') echo "Tambah Program Studi";
            elseif ($p == 'edit_prodi') echo "Edit Program Studi";
            elseif ($p == 'hapus_prodi') echo "Hapus Program Studi";
            else echo "Dashboard";
            ?>
        </h4>

        <!-- CARD CONTENT -->
        <div class="card content-card">
            <div class="card-body p-4">

                <?php
                $page = $_GET['p'] ?? 'home';

                switch ($page) {
                    case 'home':
                        include "home.php";
                        break;

                    case 'data_mhs':
                        include "mahasiswa/list.php";
                        break;
                    case 'create_mhs':
                        include "mahasiswa/create.php";
                        break;
                    case 'edit_mhs':
                        include "mahasiswa/edit.php";
                        break;
                    case 'hapus_mhs':
                        include "mahasiswa/hapus.php";
                        break;

                    case 'data_prodi':
                        include "prodi/list.php";
                        break;
                    case 'create_prodi':
                        include "prodi/create.php";
                        break;
                    case 'edit_prodi':
                        include "prodi/edit.php";
                        break;
                    case 'hapus_prodi':
                        include "prodi/hapus.php";
                        break;

                    default:
                        echo "<div class='alert alert-warning'>Halaman tidak ditemukan</div>";
                        break;
                }
                ?>

            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="border-top bg-white py-3 mt-auto">
        <div class="container text-center text-muted small">
            © <?= date('Y') ?> Data Akademik Mahasiswa
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>