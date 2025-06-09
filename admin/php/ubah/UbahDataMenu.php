<?php
include '../database.php';


$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$menu = select("SELECT * FROM data_menu2 WHERE id = $id");

if (!$menu || count($menu) === 0) {
    echo "<script>alert('Data menu tidak ditemukan!');location.href = '../DataMenu.php';</script>";
    exit;
}
$menu = $menu[0];

if (isset($_POST['ubah'])) {
    if (ubah_menu($_POST) > 0) {
        echo "<script>alert('Menu berhasil diubah!.');location.href = '../DataMenu.php';</script>";
    } else {
        echo "<script>alert('Menu gagal diubah!.');location.href = '../DataMenu.php';</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Ubah Menu</title>
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
                <a href="DataPendaftaran.php">Data Pendaftaran</a>
                <a class="active" href="DataMenu.php">Data Menu</a>
                <a href="DataPesanan.php">Data Pesanan</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <h3>Ubah Menu</h3>
        <form method="post" autocomplete="off">
            <input type="hidden" name="id" value="<?= $menu['id'] ?>">
            <div class="form-group">
                <label for="nama_makanan" class="form-label">Nama Makanan</label>
                <input id="nama_makanan" name="nama" required class="form-control" placeholder="Masukkan nama makanan" type="text" value="<?= $menu['nama'] ?>">
            </div>
            <div class="form-group">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input id="deskripsi" name="deskripsi" required class="form-control" placeholder="Masukkan deskripsi" type="text" value="<?= $menu['deskripsi'] ?>">
            </div>
            <div class="form-group">
                <label for="harga" class="form-label">Harga</label>
                <input id="harga" name="harga" required min="0" class="form-control" placeholder="Masukkan harga" type="number" step="0.01" value="<?= $menu['harga'] ?>">
            </div>
            <div class="form-group">
                <label for="kategori" class="form-label">Kategori</label>
                <input id="kategori" name="kategori" required class="form-control" placeholder="Kategori" type="number" min="0" value="<?= $menu['kategori'] ?>">
            </div>
            <div class="form-group">
                <label for="status_ketersediaan" class="form-label">Status Ketersediaan</label>
                <select id="status_ketersediaan" name="status_ketersediaan" required class="form-control" type="number" min="0" value="<?= $menu['status_ketersediaan'] ?>">
                    <option value="">Pilih status</option>
                    <option value="Tersedia" <?= (isset($menu['status_ketersediaan']) && $menu['status_ketersediaan'] == 'Tersedia') ? 'selected' : '' ?>>Tersedia</option>
                    <option value="Habis" <?= (isset($menu['status_ketersediaan']) && $menu['status_ketersediaan'] == 'Habis') ? 'selected' : '' ?>>Tidak Tersedia</option>
                </select>
            </div>
            <button class="btn-success" type="submit" name="ubah">Submit</button>
        </form>
    </div>
</body>

</html>