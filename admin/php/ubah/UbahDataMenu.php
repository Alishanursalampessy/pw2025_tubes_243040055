<?php
include '../database.php';


$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$menu = select("SELECT * FROM data_menu2 WHERE id = $id");
$menu = is_array($menu) && count($menu) > 0 ? $menu[0] : null;

if (!$menu) {
    echo "<script>alert('Data menu tidak ditemukan!');location.href = '../DataMenu.php';</script>";
    exit;
}


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

        .container {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 12px 40px rgba(123, 79, 39, 0.18);
            padding: 44px 36px 36px 36px;
            max-width: 420px;
            width: 100%;
            position: relative;
        }

        h3 {
            color: #7b4f27;
            text-align: center;
            margin-bottom: 32px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;
            margin-bottom: 7px;
            color: #7b4f27;
            font-weight: 600;
        }

        .form-control {
            width: 93%;
            padding: 12px 16px;
            border: 1.5px solid #c7a17a;
            border-radius: 10px;
            background: #f9f6f2;
            font-size: 1rem;
            color: #7b4f27;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-control:focus {
            border-color: #a9744f;
            outline: none;
            background: #fff;
            box-shadow: 0 0 0 2px #f7e7d3;
        }

        .form-control:invalid {
            border-color: #e74c3c;
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
        }

        .toggle-password {
            position: absolute;
            right: 18px;
            top: 38px;
            background: none;
            border: none;
            color: #a9744f;
            font-size: 1.1rem;
            cursor: pointer;
        }

        .form-group.password-group {
            position: relative;
        }

        @media (max-width: 500px) {
            .container {
                padding: 24px 8px;
            }

            .btn-back {
                left: 8px;
                top: 8px;
            }
        }
    </style>

    <div class="container">
        <h3>Ubah Menu</h3>
        <input type="hidden" name="id" value="<?= $menu['id'] ?>">
        <input type="hidden" name="id" value="<?= $data_menu2['id'] ?>">
        <div class="form-group">
            <label for="nama" class="form-label">Nama</label>
            <input id="nama" name="nama" required class="form-control" placeholder="Masukkan nama" type="text" value="<?= $menu['nama'] ?>">
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
            <select id="status_ketersediaan" name="status_ketersediaan" required class="form-control">
                <option value="">Pilih status</option>
                <option value="Tersedia" <?= (isset($menu['status_ketersediaan']) && $menu['status_ketersediaan'] == 'Tersedia') ? 'selected' : '' ?>>Tersedia</option>
                <option value="Habis" <?= (isset($menu['status_ketersediaan']) && $menu['status_ketersediaan'] == 'Habis') ? 'selected' : '' ?>>Tidak Tersedia</option>
            </select>
            </select>
        </div>
        <button class="btn-success" type="submit" name="ubah">Simpan Perubahan</button>
        </form>
    </div>
</body>

</html>