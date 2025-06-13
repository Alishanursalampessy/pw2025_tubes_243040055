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
                        <a class="nav-link" aria-current="page" href="home.php"><i class="bi bi-house-door"></i> Beranda</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="menu.php"><i class="bi bi-star"></i> Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="pesanan.php"><i class="bi bi-cup-hot"></i> Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- awal form pesanan -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="shadow-lg rounded-5 p-0 position-relative overflow-hidden" style="background: linear-gradient(135deg, #fffdfa 80%, #f5e6d6 100%); border: 2.5px solid #a67c52;">
                    <!-- Decorative Top Bar -->
                    <div class="w-100" style="height:70px;background:linear-gradient(90deg,#a67c52 60%,#6f4e37 100%);z-index:1;display:flex;align-items:center;justify-content:center;gap:32px;position:relative;">
                        <i class="fa-solid fa-mug-hot fa-2x text-white animate__animated animate__bounceInDown"></i>
                        <i class="fa-solid fa-coffee-bean fa-lg text-white animate__animated animate__fadeInDown animate__delay-1s"></i>
                        <i class="fa-solid fa-leaf fa-lg text-white animate__animated animate__fadeInDown animate__delay-2s"></i>
                    </div>
                    <div class="p-5 pt-5 position-relative" style="z-index:2;">
                        <h2 class="fw-bold mb-2 text-center" style="font-family:'Pacifico',cursive;color:#a67c52;letter-spacing:1px;text-shadow:1px 2px 8px #e6d3c0;">
                            <i class="fa-solid fa-mug-hot me-2"></i>Formulir Pemesanan
                        </h2>
                        <p class="mb-4 text-muted text-center" style="font-size:1.08rem;">Isi data berikut untuk memesan minuman favoritmu dan nikmati pengalaman ngopi terbaik!</p>
                        <form method="POST" autocomplete="off">
                            <div class="mb-3">
                                <label for="nama" class="form-label fw-semibold">Nama Pemesan</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light rounded-start-pill"><i class="fa-solid fa-user"></i></span>
                                    <input type="text" class="form-control rounded-end-pill ps-3" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="menu" class="form-label fw-semibold">Menu</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light rounded-start-pill"><i class="fa-solid fa-mug-saucer"></i></span>
                                    <select class="form-select rounded-end-pill ps-3" id="menu" name="menu" required>
                                        <option value="" disabled selected>Pilih menu</option>
                                        <option value="Cappuccino">Cappuccino</option>
                                        <option value="Espresso">Espresso</option>
                                        <option value="Latte">Latte</option>
                                        <option value="Americano">Americano</option>
                                        <option value="Mocha">Mocha</option>
                                        <option value="Matcha Latte">Matcha Latte</option>
                                        <option value="Caramel Macchiato">Caramel Macchiato</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label fw-semibold">Jumlah</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light rounded-start-pill"><i class="fa-solid fa-sort-numeric-up"></i></span>
                                    <input type="number" class="form-control rounded-end-pill ps-3" id="jumlah" name="jumlah" min="1" placeholder="Jumlah pesanan" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="harga" class="form-label fw-semibold">Harga Satuan (Rp)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light rounded-start-pill"><i class="fa-solid fa-money-bill-wave"></i></span>
                                    <input type="number" class="form-control rounded-end-pill ps-3" id="harga" name="harga" min="0" placeholder="Harga menu" required>
                                </div>
                            </div>
                            <div class="mb-4 text-center">
                                <div style="font-size:1.05rem;color:#a67c52;font-style:italic;">
                                    <i class="fa-solid fa-star text-warning"></i>
                                    Setiap pesanan dibuat dengan cinta & kopi terbaik!
                                    <i class="fa-solid fa-heart text-danger"></i>
                                </div>
                            </div>
                            <button type="submit" class="btn w-100 py-2 fw-bold text-white rounded-pill shadow animate__animated animate__pulse animate__infinite" style="background:linear-gradient(90deg,#a67c52 60%,#6f4e37 100%);font-size:1.15rem;letter-spacing:0.5px;box-shadow:0 4px 16px rgba(166,124,82,0.13);transition:background 0.3s;">
                                <i class="fa-solid fa-paper-plane me-2"></i>Pesan Sekarang
                            </button>
                        </form>
                    </div>
                    <!-- Decorative Bottom Bar -->
                    <div class="w-100" style="height:22px;background:linear-gradient(90deg,#6f4e37 60%,#a67c52 100%);z-index:1;display:flex;align-items:center;justify-content:center;">
                        <span style="color:#fff;font-size:1rem;letter-spacing:1px;">
                            <i class="fa-solid fa-heart me-1"></i> Dose Coffee &mdash; Freshly Brewed Everyday
                        </span>
                    </div>
                    <!-- Decorative floating beans -->
                    <img src="../img/bean1.png" alt="" style="position:absolute;top:30px;right:-30px;width:50px;opacity:0.15;transform:rotate(15deg);z-index:0;">
                    <img src="../img/bean2.png" alt="" style="position:absolute;bottom:40px;left:-25px;width:40px;opacity:0.13;transform:rotate(-10deg);z-index:0;">
                </div>
            </div>
        </div>
    </div>
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <style>
        @keyframes swing {
            0% {
                transform: rotate(-5deg);
            }

            100% {
                transform: rotate(5deg);
            }
        }

        input:focus,
        select:focus {
            border-color: #a67c52 !important;
            box-shadow: 0 0 0 0.2rem rgba(166, 124, 82, 0.15) !important;
        }

        .btn:hover {
            background: linear-gradient(90deg, #6f4e37 60%, #a67c52 100%) !important;
        }
    </style>



    <!-- akhir form pesanan -->



</body>

</html>