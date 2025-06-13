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
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
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
</head>

<body>
    <div class="container" data-aos="fade-up">
        <button class="btn-back" onclick="window.location.href='../DataPendaftaran.php'">
        </button>
        <h3 data-aos="fade-down">Ubah Data Pendaftaran</h3>
        <form method="post" autocomplete="off" data-aos="zoom-in" novalidate>
            <input type="hidden" name="id" value="<?= $pendaftaran['id'] ?>">
            <div class="form-group" data-aos="fade-right">
                <label for="username" class="form-label">Username</label>
                <input id="username" name="username" required class="form-control" placeholder="Masukkan username" type="text" value="<?= htmlspecialchars($pendaftaran['username']) ?>">
            </div>
            <div class="form-group" data-aos="fade-right" data-aos-delay="100">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" required class="form-control" placeholder="Masukkan email" type="email" value="<?= htmlspecialchars($pendaftaran['email']) ?>">
            </div>
            <div class="form-group password-group" data-aos="fade-right" data-aos-delay="200">
                <label for="password" class="form-label">Password</label>
                <input id="password" name="password" required class="form-control" placeholder="Masukkan password" type="password" value="<?= htmlspecialchars($pendaftaran['password']) ?>">
                <button type="button" class="toggle-password" tabindex="-1" onclick="togglePassword()">
                    <span id="eye">&#128065;</span>
                </button>
            </div>
            <button class="btn-success" type="submit" name="ubah" data-aos="zoom-in" data-aos-delay="300">Simpan Perubahan</button>
        </form>
    </div>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();

        function togglePassword() {
            const pwd = document.getElementById('password');
            const eye = document.getElementById('eye');
            if (pwd.type === 'password') {
                pwd.type = 'text';
                eye.textContent = '🙈';
            } else {
                pwd.type = 'password';
                eye.textContent = '👁️';
            }
        }
    </script>
</body>

</html>