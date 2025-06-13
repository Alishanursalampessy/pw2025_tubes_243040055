<?php
session_start();
$isLoggedIn = isset($_SESSION['user']);
$username = $isLoggedIn ? htmlspecialchars($_SESSION['user']['name']) : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS & JS CDN + Animate.css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../css/home.css">
    <title>Dose Coffee - Home</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark glass-navbar shadow-sm animate__animated animate__fadeInDown">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
                <img src="../img/logo.png" alt="Logo" width="48" height="48" class="me-2" style="filter: brightness(0) invert(1); background: none; border-radius: 0; box-shadow: none; padding: 0;">
                Dose Coffee
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item me-3">
                        <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-house-door"></i> Beranda</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link " href="menu.php"><i class="bi bi-star"></i> Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pesanan.php"><i class="bi bi-cup-hot"></i> Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Awal Banner -->
    <section class="banner position-relative py-4" style="background: linear-gradient(120deg, #f3e9e1 60%, #e3cfc1 100%); overflow:hidden;">
        <div class="parallax-bg"></div>
        <div class="container position-relative">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-md-8 text-center position-relative">
                    <img src="../img/banner.jpg" alt="Banner" class="img-fluid rounded shadow-lg banner-img animate__animated animate__zoomIn" style="width:100%; max-height:340px; object-fit:cover;">
                    <div class="banner-overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center">
                        <h1 class="display-4 fw-bold text-white text-shadow mb-2 animate__animated animate__fadeInDown"></h1>
                        <a href="menu.php" class="btn btn-warning btn-lg mt-3 shadow animate__animated animate__pulse animate__infinite">
                            Lihat Menu <i class="bi bi-cup-hot"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Akhir Banner -->

    <!-- Awal Menu -->
    <section id="menu-favorit" class="menu-favorit py-5" style="background: linear-gradient(120deg,rgb(139, 103, 74) 60%, #e3cfc1 100%);">
        <div class="container">
            <h2 class="text-center mb-4 fw-bold animate__animated animate__fadeInUp" style="font-size:2rem; letter-spacing:1px;">
                <i class="bi bi-stars text-warning"></i> Menu Favorit
            </h2>
            <div class="row justify-content-center">
                <!-- Menu Card 1 -->
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100 shadow menu-card animate__animated animate__fadeInUp" style="font-size:1rem;">
                        <div class="position-relative">
                            <img src="..//img/luxe.jpg" class="card-img-top" alt="Menu 1" style="height:190px;object-fit:cover;">
                            <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2 shadow pulse-badge">Best Seller</span>
                        </div>
                        <div class="card-body py-2 px-3">
                            <h5 class="card-title mb-2 fw-bold" style="font-size:1.18rem;">Luxe Latte</h5>
                            <p class="card-text mb-2" style="font-size:0.97rem;">Kopi latte creamy dengan sentuhan vanilla, favorit pelanggan setiap hari.</p>
                        </div>
                        <div class="card-footer bg-white border-0 py-2 px-3 d-flex justify-content-between align-items-center">
                        </div>
                    </div>
                </div>
                <!-- Menu Card 2 -->
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100 shadow menu-card animate__animated animate__fadeInUp" style="font-size:1rem;">
                        <div class="position-relative">
                            <img src="../img/matcha.jpg" class="card-img-top" alt="Menu 2" style="height:190px;object-fit:cover;">
                            <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2 shadow pulse-badge">Best Seller</span>
                        </div>
                        <div class="card-body py-2 px-3">
                            <h5 class="card-title mb-2 fw-bold" style="font-size:1.18rem;">Dalgona Matcha</h5>
                            <p class="card-text mb-2" style="font-size:0.97rem;">Matcha latte dengan foam dalgona, segar dan kekinian.</p>
                        </div>
                        <div class="card-footer bg-white border-0 py-2 px-3 d-flex justify-content-between align-items-center">
                        </div>
                    </div>
                </div>
                <!-- Menu Card 3 -->
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100 shadow menu-card animate__animated animate__fadeInUp" style="font-size:1rem;">
                        <div class="position-relative">
                            <img src="../img/kopigayo.jpg" class="card-img-top" alt="Menu 3" style="height:190px;object-fit:cover;">
                            <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2 shadow pulse-badge">Best Seller</span>
                        </div>
                        <div class="card-body py-2 px-3">
                            <h5 class="card-title mb-2 fw-bold" style="font-size:1.18rem;">Mystic Gayo</h5>
                            <p class="card-text mb-2" style="font-size:0.97rem;">Kopi Gayo Aceh dengan aroma khas dan aftertaste manis alami.</p>
                        </div>
                        <div class="card-footer bg-white border-0 py-2 px-3 d-flex justify-content-between align-items-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Menu -->

    <!-- Awal Informasi -->
    <section class="deskripsi py-5 bg-white position-relative overflow-hidden">
        <div class="container position-relative">
            <h2 class="text-center mb-4 fw-bold animate__animated animate__fadeInUp" style="font-size:1.7rem; letter-spacing:1px;">
                <i class="bi bi-cup-hot text-warning"></i> Setiap Tegukan, Cerita Baru Dimulai
            </h2>
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-md-7 mb-4 mb-md-0">
                    <div class="card shadow-sm border-0 h-100 animate__animated animate__fadeInLeft" style="border-radius:1.1rem;">
                        <div class="card-body">
                            <p class="mb-0" style="font-size:1.13rem; line-height:1.8; text-align: justify;">
                                <span class="badge bg-warning text-dark mb-2"><i class="bi bi-emoji-heart-eyes"></i> Cozy & Estetik</span><br>
                                Selamat datang di <b>Dose Coffee</b>, kafe dengan suasana nyaman dan estetis, menyajikan kopi berkualitas tinggi dari biji pilihan. Nikmati menu kreatif, pelayanan ramah, dan tempat yang cocok untuk bersantai, bekerja, atau bertemu teman. <span class="text-primary fw-semibold">Setiap minuman kami dibuat dengan cinta dan passion untuk kopi terbaik.</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-md-5 text-center">
                    <img src="..//img/bg2.png" alt="Interior Dose Coffee" style="max-height:270px; object-fit:cover; border-radius:1.1rem; mix-blend-mode:multiply;">
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Informasi -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>