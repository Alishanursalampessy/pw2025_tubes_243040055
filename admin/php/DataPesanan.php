<?php
session_start();
include 'database.php';
$data_pesanan = select("SELECT * FROM data_pesanan");

if (isset($_POST['submit'])) {
    if (create_pesanan($_POST) > 0) {
        echo "<script>alert('data pesanan berhasil ditambahkan.'); window.location.href='DataPesanan.php';</script>";
        exit;
    } else {
        echo "<script>alert('data pesan gagal ditambahkan.');</script>";
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
            background: linear-gradient(135deg, #c7a17a 0%, #6f4e37 100%);
            font-family: 'Inter', sans-serif;
        }

        .nav-container {
            background: #fff8f0;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 2px 8px rgba(111, 78, 55, 0.08);
            padding: 1rem 2rem;
            margin-bottom: 2rem;
        }

        .nav-title {
            font-weight: 700;
            font-size: 1.5rem;
            color: #6f4e37;
        }

        .nav-link.active,
        .nav-link:hover {
            color: #a67c52 !important;
            font-weight: 600;
        }

        .card {
            transition: transform 0.2s, box-shadow 0.2s;
            border-radius: 1rem;
            background: #ede0d4;
            border: 1px solid #a67c52;
        }

        .card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 8px 24px rgba(111, 78, 55, 0.12);
        }

        .card-title {
            font-size: 1.1rem;
            color: #a67c52;
        }

        .display-5 {
            font-size: 2.5rem;
            color: #6f4e37;
        }

        .border-success,
        .border-primary,
        .border-warning {
            border-color: #a67c52 !important;
        }

        .text-success,
        .text-primary,
        .text-warning {
            color: #a67c52 !important;
        }

        .add-btn {
            background: #a67c52;
            color: #fff8f0;
            border: none;
            padding: 0.5rem 1.2rem;
            border-radius: 8px;
            font-weight: 600;
            margin-bottom: 1rem;
            transition: background 0.2s;
        }

        .add-btn:hover {
            background: #6f4e37;
            color: #fff8f0;
        }

        .action-btn.edit-btn {
            background: #c7a17a;
            color: #fff8f0;
            border: none;
        }

        .action-btn.edit-btn:hover {
            background: #a67c52;
            color: #fff8f0;
        }

        .action-btn.delete-btn {
            background: #6f4e37;
            color: #fff8f0;
            border: none;
        }

        .action-btn.delete-btn:hover {
            background: #a67c52;
            color: #fff8f0;
        }

        .modal-content {
            background: #ede0d4;
        }

        .btn-primary {
            background: #a67c52;
            border-color: #a67c52;
        }

        .btn-primary:hover {
            background: #6f4e37;
            border-color: #6f4e37;
        }

        .btn-secondary {
            background: #c7a17a;
            border-color: #c7a17a;
            color: #fff8f0;
        }

        .btn-secondary:hover {
            background: #a67c52;
            border-color: #a67c52;
            color: #fff8f0;
        }
    </style>
</head>

<body>
    <nav>
        <div class="nav-container d-flex align-items-center justify-content-between" style="display: flex;">
            <div class="nav-title">Dose Coffee</div>
            <div class="nav-links d-flex" style="display: flex; gap: 1rem;">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
                <a class="nav-link" href="DataPendaftaran.php">Data Pendaftaran</a>
                <a class="nav-link" href="DataMenu.php">Data Menu</a>
                <a class="nav-link active" href="DataPesanan.php">Data Pesanan</a>
            </div>
        </div>
    </nav>

    <!-- Modal Tambah Data Pesanan -->
    <div class="modal fade" id="modalTambahPesanan" tabindex="-1" aria-labelledby="modalTambahPesananLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahPesananLabel">Tambah Data Pesanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required>
                        </div>
                        <div class="mb-3">
                            <label for="menu" class="form-label">Menu</label>
                            <input type="text" class="form-control" id="menu" name="menu" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" min="0" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <button type="button" class="add-btn" data-bs-toggle="modal" data-bs-target="#modalTambahPesanan">
            &#43; Tambah Data
        </button>
        <table class="table table-hover table-striped align-middle" id="table">
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 20%;">Nama</th>
                    <th style="width: 15%;">Menu</th>
                    <th style="width: 15%;">Jumlah</th>
                    <th style="width: 20%;">Harga</th>
                    <th style="width: 20%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if (!empty($data_pesanan)):
                    foreach ($data_pesanan as $pesanan):
                ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($pesanan['nama_pelanggan']); ?></td>
                            <td><?= htmlspecialchars($pesanan['menu']); ?></td>
                            <td><?= htmlspecialchars($pesanan['jumlah']); ?></td>
                            <td><?= htmlspecialchars($pesanan['harga']); ?></td>
                            <td>
                                <a href="../php/ubah/UbahDataPesanan.php?id=<?= urlencode($pesanan['id']); ?>" class="action-btn edit-btn btn btn-warning btn-sm" title="Ubah Data">
                                    <span class="icon">&#9998;</span> Ubah
                                </a>
                                <a href="../php/hapus/HapusDataPesanan.php?id=<?= urlencode($pesanan['id']); ?>" class="action-btn delete-btn btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')" title="Hapus Data">
                                    <span class="icon">&#128465;</span> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align:center;">Tidak ada data yang tersedia</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <!-- Akhir modal  -->

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