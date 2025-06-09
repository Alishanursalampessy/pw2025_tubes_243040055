<?php
include '../database.php';


$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$pendaftaran = select("SELECT * FROM data_pendaftaran WHERE id = $id");

if (!$pendaftaran || count($pendaftaran) === 0) {
    echo "<script>alert('Data pendaftaran tidak ditemukan!');location.href = '../DataPendaftaran.php';</script>";
    exit;
}
$pendaftaran = $pendaftaran[0];

if (isset($_POST['ubah'])) {
    if (ubah_pendaftaran($_POST) > 0) {
        echo "<script>alert('Pendaftaran berhasil diubah!.');location.href = '../DataPendaftaran.php';</script>";
    } else {
        echo "<script>alert('Pendaftaran gagal diubah!.');location.href = '../DataPendaftaran.php';</script>";
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
                <a class="active" href="DataPendaftaran.php">Data Pendaftaran</a>
                <a href="DataMenu.php">Data Menu</a>
                <a href="DataPesanan.php">Data Pesanan</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h3>Ubah Data Pendaftaran</h3>
        <form method="post" autocomplete="off">
            <input type="hidden" name="id" value="<?= $pendaftaran['id'] ?>">
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input id="username" name="username" required class="form-control" placeholder="Masukkan username" type="text" value="<?= htmlspecialchars($pendaftaran['username']) ?>">
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" required class="form-control" placeholder="Masukkan email" type="email" value="<?= htmlspecialchars($pendaftaran['email']) ?>">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input id="password" name="password" required class="form-control" placeholder="Masukkan password" type="password" value="<?= htmlspecialchars($pendaftaran['password']) ?>">
            </div>
            <button class="btn-success" type="submit" name="ubah">Submit</button>
        </form>
    </div>
</body>

</html>