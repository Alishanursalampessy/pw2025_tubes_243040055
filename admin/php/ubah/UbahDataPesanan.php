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
    <title>Ubah Pesanan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Inter:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #a9744f 0%, #7b4f27 100%);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container-custom {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 12px 40px rgba(123, 79, 39, 0.18);
            padding: 44px 36px 36px 36px;
            max-width: 420px;
            width: 100%;
            position: relative;
        }

        .header-icon {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .header-icon img {
            width: 60px;
            height: 60px;
        }

        h3 {
            color: #7b4f27;
            text-align: center;
            margin-bottom: 24px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .form-label {
            color: #7b4f27;
            font-weight: 600;
        }

        .form-control {
            border: 1.5px solid #c7a17a;
            border-radius: 10px;
            background: #f9f6f2;
            color: #7b4f27;
            font-size: 1rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-control:focus {
            border-color: #a9744f;
            background: #fff;
            box-shadow: 0 0 0 2px #f7e7d3;
        }

        .btn-success {
            width: 100%;
            padding: 13px 0;
            background: linear-gradient(90deg, #a9744f 0%, #7b4f27 100%);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(123, 79, 39, 0.10);
            transition: background 0.2s, transform 0.2s;
            margin-top: 10px;
        }

        .btn-success:hover {
            background: linear-gradient(90deg, #7b4f27 0%, #a9744f 100%);
            transform: translateY(-2px) scale(1.03);
        }

        .btn-back {
            position: absolute;
            left: 18px;
            top: 18px;
            background: none;
            border: none;
            color: #a9744f;
            font-size: 1.2rem;
            cursor: pointer;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 4px;
            text-decoration: none;
        }

        .btn-back:hover {
            color: #7b4f27;
            text-decoration: underline;
        }

        @media (max-width: 500px) {
            .container-custom {
                padding: 24px 8px;
            }

            .btn-back {
                left: 8px;
                top: 8px;
            }
        }
    </style>
</head>

<body>
    <div class="container-custom">
        <h3>Ubah Data Pesanan</h3>
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
            <button class="btn btn-success" type="submit" name="ubah">Simpan Perubahan</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>