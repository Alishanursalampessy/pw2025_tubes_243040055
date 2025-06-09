<?php include '../../database2.php'; ?>
<?php $data_pendaftaran = select("SELECT * FROM data_pendaftaran"); ?>
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
                <a class="nav-link active" href="DataPendaftaran.php">Data Pendaftaran</a>
                <a class="nav-link" href="DataMenu.php">Data Menu</a>
                <a class="nav-link" href="DataPesanan.php">Data Pesanan</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1>Data dari Database</h1>
        <a href="TambahMenu.php" class="add-btn">&#43; Tambah Data</a>
        <table class="table table-hover table-striped align-middle" id="table" class="table table-striped">
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
                                <a href="ubah/UbahDataPendaftaran.php?id=<?= urlencode($pendaftar['id']); ?>" class="action-btn edit-btn" title="Ubah Data">
                                    <span class="icon">&#9998;</span>Ubah
                                </a>
                                <a href="hapus/HapusDataPendaftaran.php?id=<?= urlencode($pendaftar['id']); ?>" class="action-btn delete-btn"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')" title="Hapus Data">
                                    <span class="icon">&#128465;</span>Hapus
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