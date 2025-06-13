<?php
include 'database.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$menu = select("SELECT * FROM data_menu2 WHERE id = $id");

if (!$menu || count($menu) === 0) {
    echo "<script>alert('Data menu tidak ditemukan!');location.href = '../DataMenu.php';</script>";
    exit;
}
$menu = $menu[0];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Detail Menu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Inter:400,600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', Arial, sans-serif;
            background: linear-gradient(120deg, #a47149 60%, #f3e9e1 100%);
            min-height: 100vh;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background: #6d4c2c;
            box-shadow: 0 2px 8px rgba(80, 50, 20, 0.08);
        }

        .nav-title {
            font-weight: 700;
            font-size: 1.5rem;
            color: #fff3e0;
            letter-spacing: 1px;
            text-shadow: 1px 1px 2px #5d3a1a33;
        }

        .nav-links a {
            margin-left: 1.5rem;
            color: #f3e9e1;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .nav-links a.active,
        .nav-links a:hover {
            color: #ffb300;
            text-decoration: underline;
        }

        .card-custom {
            animation: fadeInUp 0.7s;
            background: rgba(255, 248, 240, 0.98);
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px rgba(120, 72, 36, 0.13);
            border: 2px solid #a47149;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .img-preview {
            max-height: 220px;
            object-fit: cover;
            border-radius: 1rem;
            box-shadow: 0 4px 16px rgba(120, 72, 36, 0.13);
            border: 2px solid #a47149;
            background: #f3e9e1;
            transition: transform 0.3s;
        }

        .img-preview:hover {
            transform: scale(1.08);
        }

        .badge-kategori {
            background: linear-gradient(90deg, #a47149 60%, #ffb300 100%);
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 1rem;
            box-shadow: 0 2px 8px #a4714922;
        }

        .btn-custom {
            font-weight: 600;
            border-radius: 0.75rem;
            background: #a47149;
            color: #fff3e0;
            border: none;
            transition: background 0.2s, color 0.2s;
        }

        .btn-custom:hover {
            background: #ffb300;
            color: #fff;
        }

        .table th {
            color: #a47149;
        }

        .badge.bg-success {
            background: #a47149 !important;
            color: #fff3e0 !important;
        }

        .badge.bg-danger {
            background: #6d4c2c !important;
            color: #fff3e0 !important;
        }

        /* Tambahan untuk mengubah warna tulisan utama menjadi coklat */
        .text-success {
            color: #a47149 !important;
        }
    </style>
</head>

<body>

    <div class="container d-flex align-items-center justify-content-center" style="min-height:100vh;">
        <div class="card card-custom p-4 shadow-lg border-0" style="max-width: 750px; width:100%;">
            <div class="text-center mb-4">
                <h2 class="fw-bold text-success mb-1" style="letter-spacing:1px;">
                    <i class="bi bi-egg-fried"></i> Detail Menu
                </h2>
                <span class="badge badge-kategori px-3 py-2"><?= htmlspecialchars($menu['kategori']) ?></span>
            </div>
            <div class="row mb-4 align-items-center">
                <div class="col-md-5 text-center mb-3 mb-md-0">
                    <?php if (!empty($menu['foto_menu']) && file_exists("../img/" . $menu['foto_menu'])): ?>
                        <img src="../img/<?= htmlspecialchars($menu['foto_menu']) ?>" alt="Foto Produk" class="img-fluid img-preview">
                    <?php else: ?>
                        <img src="https://cdn-icons-png.flaticon.com/512/1046/1046857.png" alt="Tidak ada foto" class="img-fluid img-preview opacity-50" style="background:#f8f9fa;">
                        <div class="text-muted mt-2">Tidak ada foto</div>
                    <?php endif; ?>
                </div>
                <div class="col-md-7">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <th class="text-secondary" style="width: 45%;"><i class="bi bi-emoji-smile"></i> Nama Makanan</th>
                            <td class="fw-semibold fs-5"><?= htmlspecialchars($menu['nama']) ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary"><i class="bi bi-cash-coin"></i> Harga</th>
                            <td class="fw-semibold text-success fs-5">Rp <?= number_format($menu['harga'], 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary"><i class="bi bi-tags"></i> Kategori</th>
                            <td><?= htmlspecialchars($menu['kategori']) ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary"><i class="bi bi-check-circle"></i> Status Ketersediaan</th>
                            <td>
                                <?php if (strtolower($menu['status_ketersediaan']) == 'tersedia'): ?>
                                    <span class="badge bg-success px-3 py-2" style="font-size:1rem;"><i class="bi bi-check-circle"></i> Tersedia</span>
                                <?php else: ?>
                                    <span class="badge bg-danger px-3 py-2" style="font-size:1rem;"><i class="bi bi-x-circle"></i> Habis</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php if (!empty($menu['deskripsi'])): ?>
                            <tr>
                                <th class="text-secondary align-top"><i class="bi bi-card-text"></i> Deskripsi</th>
                                <td><?= nl2br(htmlspecialchars($menu['deskripsi'])) ?></td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <a href="DataMenu.php" class="btn btn-outline-success btn-custom w-50">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>