<?php include 'database.php'; ?>

<?php
$data_pendaftaran = select("SELECT * FROM data_pendaftaran");

if (isset($_POST['submit'])) {
    if (create_pendaftaran($_POST, $_FILES) > 0) {
        echo "<script>alert('Data menu berhasil ditambahkan.'); window.location.href='DataMenu.php';</script>";
        exit;
    } else {
        echo "<script>alert('Data menu gagal ditambahkan.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Halaman Database</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Inter:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #f8fafc 0%, #d7b899 100%);
            font-family: 'Inter', sans-serif;
        }

        .nav-container {
            background: #fff;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            padding: 1rem 2rem;
            margin-bottom: 2rem;
        }

        .nav-title {
            font-weight: 700;
            font-size: 1.5rem;
            color: #8d6748;
            /* Coklat tua */
        }

        .nav-link.active,
        .nav-link:hover {
            color: #a9744f !important;
            /* Coklat muda */
            font-weight: 600;
        }

        .card {
            transition: transform 0.2s, box-shadow 0.2s;
            border-radius: 1rem;
        }

        .card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 8px 24px rgba(141, 103, 72, 0.12);
            /* Coklat tua transparan */
        }

        .card-title {
            font-size: 1.1rem;
            color: #a9744f;
            /* Coklat muda */
        }

        .display-5 {
            font-size: 2.5rem;
            color: #8d6748;
        }

        .border-success {
            border-color: #b68973 !important;
            /* Coklat krem */
        }

        .border-primary {
            border-color: #a9744f !important;
            /* Coklat muda */
        }

        .border-warning {
            border-color: #d7b899 !important;
            /* Coklat krem terang */
        }

        .text-success {
            color: #b68973 !important;
        }

        .text-primary {
            color: #a9744f !important;
        }

        .text-warning {
            color: #d7b899 !important;
        }
    </style>
</head>

<body>
    <nav>
        <div class="nav-container d-flex align-items-center justify-content-between" style="display: flex;">
            <div class="nav-title">Dose Coffe</div>
            <div class="nav-links d-flex" style="display: flex; gap: 1rem;">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
                <a class="nav-link active" href="DataPendaftaran.php">Data Pendaftaran</a>
                <a class="nav-link" href="DataMenu.php">Data Menu</a>
                <a class="nav-link" href="DataPesanan.php">Data Pesanan</a>
            </div>
        </div>
    </nav>


    <div class="container">
        <h1>Data dari Database</h1>
        <!-- Tombol untuk membuka modal tambah data -->
        <button type="button" class="add-btn" data-bs-toggle="modal" data-bs-target="#modalTambahData">
            &#43; Tambah Data
        </button>
        <table class="table table-hover table-striped align-middle" id="table">
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 20%;">Username</th>
                    <th style="width: 15%;">Email</th>
                    <th style="width: 15%;">Password</th>
                    <th style="width: 20%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if (!empty($data_pendaftaran)):
                    foreach ($data_pendaftaran as $pendaftar):
                ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($pendaftar['username']); ?></td>
                            <td><?= htmlspecialchars($pendaftar['email']); ?></td>
                            <td><?= htmlspecialchars($pendaftar['password']); ?></td>
                            <td>
                                <a href="../php/ubah/UbahDataPendaftaran.php?id=<?= urlencode($pendaftar['id']); ?>" class="action-btn edit-btn btn btn-warning btn-sm" title="Ubah Data">
                                    <span class="icon">&#9998;</span> Ubah
                                </a>
                                <a href="../php/hapus/HapusDataMenu.php?id=<?= urlencode($pendaftar['id']); ?>" class="action-btn delete-btn btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')" title="Hapus Data">
                                    <span class="icon">&#128465;</span> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">Tidak ada data yang tersedia</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data Pendaftaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- plagin bootstrap -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({});
        });
    </script>
</body>

</html>