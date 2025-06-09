<?php
session_start();

$error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'] ?? "";
    $password = $_POST['password'] ?? "";

    if ($username === "alishnrsaa" && $password === "021006") {
        $_SESSION['username'] = $username;
        header("Location: ./admin/php/DataPesanan.php");
        exit();
    } else {
        $error = "Username atau Password salah!!";
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
        background: linear-gradient(120deg, #f6e9d7 0%, #b1927c 100%);
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

    .navbar {
        margin-bottom: 30px;
        height: 70px;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.07);
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(6px);
    }

    .navbar-brand {
        font-family: 'Pacifico', cursive;
        font-weight: bold;
        font-size: 2rem;
        color: #AB7743 !important;
        letter-spacing: 2px;
        text-shadow: 1px 2px 8px #e9d5c0;
    }

    .login-container {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.96);
        border-radius: 32px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18);
        backdrop-filter: blur(14px);
        border: 1.5px solid rgba(171, 119, 67, 0.13);
        padding: 3rem 2.5rem 2.2rem 2.5rem;
        width: 390px;
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
        width: 130px;
        height: 130px;
        background: linear-gradient(135deg, #AB7743 60%, #fff0 100%);
        border-radius: 50%;
        opacity: 0.13;
        z-index: 0;
    }

    .glass-card .card-title {
        font-weight: bold;
        color: #AB7743;
        letter-spacing: 1px;
        font-size: 1.6rem;
    }

    .form-label {
        color: #AB7743;
        font-weight: 500;
    }

    .form-control {
        border-radius: 12px;
        transition: box-shadow 0.2s, border-color 0.2s;
    }

    .form-control:focus {
        border-color: #AB7743;
        box-shadow: 0 0 0 0.2rem rgba(171, 119, 67, 0.15);
    }

    .btn-primary {
        background: linear-gradient(90deg, #AB7743 60%, #b1927c 100%);
        border: none;
        font-weight: bold;
        letter-spacing: 1px;
        transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
        box-shadow: 0 2px 8px rgba(171, 119, 67, 0.08);
        border-radius: 14px;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #8c5d2c 60%, #b1927c 100%);
        transform: scale(1.04);
        box-shadow: 0 4px 16px #b1927c33;
    }

    .login-illustration {
        width: 110px;
        display: block;
        margin: 0 auto 1.3rem auto;
        opacity: 0.97;
        filter: drop-shadow(0 2px 8px #b1927c33);
        transition: transform 0.2s;
    }

    .glass-card:hover .login-illustration {
        transform: scale(1.07) rotate(-2deg);
    }

    .register-link {
        display: block;
        text-align: center;
        margin-top: 1.3rem;
        color: #6F4E37;
        font-size: 1rem;
        font-weight: 500;
        letter-spacing: 0.5px;
        transition: color 0.2s;
    }

    .register-link:hover {
        text-decoration: underline;
        color: #AB7743;
    }

    .divider {
        text-align: center;
        margin: 1.5rem 0 1rem 0;
        color: #b1927c;
        font-size: 0.95rem;
        position: relative;
    }

    .divider::before,
    .divider::after {
        content: '';
        display: inline-block;
        width: 40%;
        height: 1px;
        background: #e9d5c0;
        vertical-align: middle;
        margin: 0 8px;
    }

    .social-login {
        display: flex;
        gap: 14px;
        justify-content: center;
    }

    .social-btn {
        border: none;
        background: #fff;
        border-radius: 50%;
        width: 44px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 8px #b1927c22;
        transition: box-shadow 0.2s, transform 0.2s, background 0.2s;
        cursor: pointer;
    }

    .social-btn:hover {
        box-shadow: 0 4px 16px #b1927c44;
        transform: scale(1.11);
        background: #f6e9d7;
    }

    .social-btn img {
        width: 24px;
        height: 24px;
    }

    .forgot-link {
        display: block;
        text-align: right;
        margin-top: -10px;
        margin-bottom: 10px;
        font-size: 0.95rem;
        color: #b1927c;
        text-decoration: none;
        transition: color 0.2s;
    }

    .forgot-link:hover {
        color: #AB7743;
        text-decoration: underline;
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

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mb-4" data-aos="fade-down">
        <div class="container">
            <a class="navbar-brand" href="#">Dose Coffe</a>
        </div>
    </nav>

    <div class="container login-container">
        <div class="glass-card shadow" data-aos="zoom-in" data-aos-delay="200">
            <img src="./img/logo.png" alt="Login Illustration" class="login-illustration" data-aos="fade-up" data-aos-delay="400">
            <h5 class="card-title text-center mb-4" data-aos="fade-up" data-aos-delay="500">Welcome Back!</h5>
            <form action="login.php" method="post" autocomplete="off" data-aos="fade-up" data-aos-delay="600">
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
                <button type="submit" class="btn btn-primary w-100 mt-2">Login</button>
            </form>
            <div class="divider" data-aos="fade-up" data-aos-delay="700">atau login dengan</div>
            <div class="social-login mb-2" data-aos="fade-up" data-aos-delay="800">
                <button class="social-btn" title="Login with Google">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" alt="Google">
                </button>
                <button class="social-btn" title="Login with Facebook">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/facebook/facebook-original.svg" alt="Facebook">
                </button>
            </div>
            <a href="#" class="register-link" data-aos="fade-up" data-aos-delay="900">Belum punya akun? <b>Daftar di sini</b></a>
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