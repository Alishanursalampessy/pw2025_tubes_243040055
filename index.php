<?php
session_start();
include 'database2.php';

$error = ""; // Inisialisasi variabel error

// Cek apakah tombol login ditekan
if (isset($_POST['login'])) {
    global $db;

    // Jika login sebagai admin
    if ($_POST["username"] == "admin" && $_POST["password"] == "admin123") {
        $_SESSION['login'] = true;
        $_SESSION['username'] = "admin";
        header("Location: ./admin/php/dashboard.php");
        exit;
    }

    // Pastikan koneksi database tersedia
    if (!$db) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Ambil input username dan password dengan sanitasi
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Cek username di database
    $result = mysqli_query($db, "SELECT * FROM data_pendaftaran WHERE username = '$username'");

    if (!$result) {
        die("Query gagal: " . mysqli_error($db));
    }

    // Jika username ditemukan
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);

        if ($password === $data['password']) {
            // Set session (tanpa menyimpan password)
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['email'] = $data['email'];

            // Redirect ke halaman utama
            header("Location: ./public/php/home.php");
            exit(); // Menghentikan eksekusi kode setelah redirect
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Dose Coffes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Pacifico&display=swap" rel="stylesheet">

</head>
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<style>
    body {
        font-family: 'Roboto', Arial, sans-serif;
        min-height: 100vh;
        background: linear-gradient(120deg, #7B4F27 0%, #D2B48C 100%);
        display: flex;
        flex-direction: column;
        animation: fadeInBg 1.2s;
    }

    @keyframes fadeInBg {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .login-container {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 5rem;
    }

    .glass-card {
        background: rgba(255, 250, 240, 0.98);
        border-radius: 36px;
        box-shadow: 0 10px 40px 0 rgba(111, 78, 55, 0.18);
        backdrop-filter: blur(18px);
        border: 2px solid rgba(123, 79, 39, 0.13);
        padding: 3.2rem 2.7rem 2.4rem 2.7rem;
        width: 410px;
        position: relative;
        overflow: hidden;
        animation: fadeInUp 1s;
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

    .glass-card::before {
        content: '';
        position: absolute;
        top: -60px;
        left: -60px;
        width: 140px;
        height: 140px;
        background: radial-gradient(circle, #6F4E37 60%, #fff0 100%);
        border-radius: 50%;
        opacity: 0.16;
        z-index: 0;
    }

    .glass-card .card-title {
        font-weight: bold;
        color: #7B4F27;
        letter-spacing: 1.2px;
        font-size: 1.7rem;
        text-shadow: 0 2px 8px #d2b48c33;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .card-title .user-icon {
        font-size: 1.5rem;
        color: #A67B5B;
        margin-right: 6px;
        vertical-align: middle;
    }

    .form-label {
        color: #7B4F27;
        font-weight: 600;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .form-label .input-icon {
        font-size: 1.1rem;
        color: #A67B5B;
        margin-right: 4px;
        vertical-align: middle;
    }

    .form-control {
        border-radius: 14px;
        border: 1.5px solid #D2B48C;
        background: #f9f6f2;
        transition: box-shadow 0.2s, border-color 0.2s;
    }

    .form-control:focus {
        border-color: #7B4F27;
        box-shadow: 0 0 0 0.2rem rgba(123, 79, 39, 0.13);
        background: #fff;
    }

    .btn-primary {
        background: linear-gradient(90deg, #7B4F27 60%, #A67B5B 100%);
        border: none;
        font-weight: bold;
        letter-spacing: 1.2px;
        transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
        box-shadow: 0 2px 12px rgba(123, 79, 39, 0.13);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-primary .login-icon {
        font-size: 1.2rem;
        margin-right: 4px;
        vertical-align: middle;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #5C3A1A 60%, #A67B5B 100%);
        transform: scale(1.045);
        box-shadow: 0 4px 18px #a67b5b33;
    }

    .login-illustration {
        width: 120px;
        display: block;
        margin: 0 auto 1.5rem auto;
        opacity: 0.98;
        filter: drop-shadow(0 2px 12px #a67b5b33);
        transition: transform 0.22s;
        border-radius: 50%;
        background: #fff7f0;
        padding: 8px;
        box-shadow: 0 2px 12px #d2b48c22;
    }

    .glass-card:hover .login-illustration {
        transform: scale(1.09) rotate(-2deg);
    }

    .register-link {
        display: block;
        text-align: center;
        margin-top: 1.5rem;
        color: #5C3A1A;
        font-size: 1.05rem;
        font-weight: 500;
        letter-spacing: 0.7px;
        transition: color 0.2s;
    }

    .register-link:hover {
        text-decoration: underline;
        color: #7B4F27;
    }

    .divider {
        text-align: center;
        margin: 1.7rem 0 1.1rem 0;
        color: #a67b5b;
        font-size: 1rem;
        position: relative;
    }

    .divider::before,
    .divider::after {
        content: '';
        display: inline-block;
        width: 40%;
        height: 1.5px;
        background: #d2b48c;
        vertical-align: middle;
        margin: 0 8px;
    }

    .social-login {
        display: flex;
        gap: 16px;
        justify-content: center;
    }

    .social-btn {
        border: none;
        background: #fff;
        border-radius: 50%;
        width: 46px;
        height: 46px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 10px #a67b5b22;
        transition: box-shadow 0.2s, transform 0.2s, background 0.2s;
        cursor: pointer;
    }

    .social-btn:hover {
        box-shadow: 0 4px 18px #a67b5b44;
        transform: scale(1.13);
        background: #f6e9d7;
    }

    .social-btn img {
        width: 26px;
        height: 26px;
    }

    .forgot-link {
        display: block;
        text-align: right;
        margin-top: -10px;
        margin-bottom: 10px;
        font-size: 0.97rem;
        color: #a67b5b;
        text-decoration: none;
        transition: color 0.2s;
    }

    .forgot-link:hover {
        color: #7B4F27;
        text-decoration: underline;
    }

    /* Decorative coffee beans */
    body::after {
        content: '';
        position: fixed;
        bottom: 0;
        right: 0;
        width: 120px;
        height: 120px;
        background: url('./img/bean-decor.png') no-repeat center/contain;
        opacity: 0.13;
        pointer-events: none;
        z-index: 1;
    }

    @media (max-width: 576px) {
        .glass-card {
            width: 100%;
            padding: 2rem 1rem 1.5rem 1rem;
        }

        .navbar-brand {
            font-size: 1.2rem;
        }
    }
</style>
<!-- Font Awesome CDN for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<body>

    <div class="container login-container mb-5">
        <div class="glass-card shadow" data-aos="zoom-in" data-aos-delay="200">
            <img src="./img/logo.png" alt="Login Illustration" class="login-illustration" data-aos="fade-up" data-aos-delay="400">
            <h5 class="card-title text-center mb-4" data-aos="fade-up" data-aos-delay="500">Welcome Back!</h5>
            <form method="post" autocomplete="off" data-aos="fade-up" data-aos-delay="600">
                <!-- ...form Anda tetap... -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required autofocus>
                </div>
                <div class="mb-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <a href="#" class="forgot-link">Lupa password?</a>
                <button type="submit" class="btn btn-primary w-100 mt-2" name="login">Login</button>
            </form>
            <a href="pendaftaran.php" class="register-link">Belum punya akun? <b>Daftar di sini</b></a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Tambahkan AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>