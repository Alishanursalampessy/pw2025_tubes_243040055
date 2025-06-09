<?php include 'database.php'; ?>
<?php $data_menu = select("SELECT * FROM data_pesanan"); ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Halaman Database</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Inter:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <!-- plugin table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
</head>

<body>
    <nav>
        <div class="nav-container">
            <div class="nav-title">Admin Panel</div>
            <div class="nav-links">
                <a class="nav-link " href="DataPendaftaran.php">Data Pendaftaran</a>
                <a class="nav-link" href="DataMenu.php">Data Menu</a>
                <a class="nav-link active" href="DataPesanan.php">Data Pesanan</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1>Data dari Database</h1>
        <a href="tambah_menu.php" class="add-btn">&#43; Tambah Data</a>
        <table class="table table-hover table-striped align-middle" id="table" class="table table-striped">
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
                if (!empty($data_menu)):
                    foreach ($data_menu as $menu):
                ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $menu['nama_pelanggan']; ?></td>
                            <td><?= $menu['menu']; ?></td>
                            <td><?= $menu['jumlah']; ?></td>
                            <td><?= $menu['harga']; ?></td>
                            <a href="ubah/UbahDataPesanan.php?id=<?= urlencode($menu['id']); ?>" class="action-btn edit-btn" title="Ubah Data">
                                <span class="icon">&#9998;</span>Ubah
                            </a>
                            <a href="hapus/HapusDataPesanan.php?id=<?= urlencode($menu['id']); ?>" class="action-btn delete-btn"
                                onclick="return confirm('Yakin ingin menghapus data ini?')" title="Hapus Data">
                                <span class="icon">&#128465;</span>Hapus
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