<?php
session_start();
include '../database.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$pesanan = select("SELECT * FROM data_pesanan WHERE id = $id");
if (!$pesanan) {
    echo "<script>alert('Data pesanan tidak ditemukan.');location.href='../DataPesanan.php';</script>";
    exit;
}
$pesanan = $pesanan[0];

if (isset($_POST['ubah'])) {
    if (ubah_pesanan($_POST, $id) > 0) {
        echo "<script>alert('Data pesanan berhasil diubah.');location.href='../DataPesanan.php';</script>";
    } else {
        echo "<script>alert('Data pesanan gagal diubah.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Ubah Pendaftaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Inter:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/ubah.css">
</head>

<body>
    <nav>
        <div class="nav-container">
            <div class="nav-title">Admin Panel</div>
            <div class="nav-links">
                <a href="../DataPendaftaran.php">Data Pendaftaran</a>
                <a href="../DataMenu.php">Data Menu</a>
                <a class="active" href="../DataPesanan.php">Data Pesanan</a>
            </div>
        </div>
    </nav>
    <!-- card ubah pesanan -->
    <div class="container d-flex align-items-center justify-content-center" style="min-height:100vh;">
        <div class="card p-4 shadow" style="width: 500px;" data-aos="zoom-in">
            <h3 class="mb-4 text-center">Ubah Pesanan</h3>
            <form method="post" autocomplete="off">
                <input type="hidden" name="id" value="<?= htmlspecialchars($pesanan['id']); ?>">
                <div class="mb-3">
                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                    <input id="nama_pelanggan" name="nama_pelanggan" required class="form-control" placeholder="Masukkan nama pelanggan" type="text" value="<?= htmlspecialchars($pesanan['nama_pelanggan']); ?>" />
                </div>
                <div class="mb-3">
                    <label for="menu" class="form-label">Nama Menu</label>
                    <input id="menu" name="menu" required class="form-control" placeholder="Masukkan nama menu" type="text" value="<?= htmlspecialchars($pesanan['menu']); ?>" />
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input id="jumlah" name="jumlah" required class="form-control" placeholder="Jumlah" type="number" min="1" value="<?= htmlspecialchars($pesanan['jumlah']); ?>" />
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Total Harga</label>
                    <input id="harga" name="harga" required class="form-control" placeholder="Total harga" type="number" min="0" value="<?= htmlspecialchars($pesanan['harga']); ?>" />
                </div>
                <button class="btn btn-success w-100" type="submit" name="ubah">Submit</button>
            </form>
        </div>
    </div>
    <!-- akhir card pesanan -->

    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>