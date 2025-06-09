<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dose coffe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/pesanan.css">
</head>

<body>
    <!-- Awal Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark mb-4 py-2">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center me-4" href="/php/home.php">
                <img src="../img/logo.png" alt="Logo" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fw-bold">
                    <li class="nav-item">
                        <a class="nav-link " href="home.php"><i class="fa-solid fa-house"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.php"><i class="fa-solid fa-utensils"></i> Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="pesanan.php"><i class="fa-solid fa-envelope"></i> Pesan</a>
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
                <div class="shadow-lg rounded-5 p-0" style="background: #fffdfa; border: 2.5px solid #a67c52; overflow: hidden; position: relative;">
                    <!-- Decorative Top Bar -->
                    <div style="position:absolute;top:0;left:0;width:100%;height:70px;background:linear-gradient(90deg,#a67c52 60%,#6f4e37 100%);z-index:1;display:flex;flex-direction:row;align-items:center;justify-content:center;">
                        <i class="fa-solid fa-mug-hot fa-2x text-white mx-4"></i>
                        <i class="fa-solid fa-coffee-bean fa-lg text-white mx-4"></i>
                        <i class="fa-solid fa-leaf fa-lg text-white mx-4"></i>
                    </div>
                    <div class="p-5 pt-5" style="position:relative;z-index:2;">
                        <h2 class="fw-bold mb-2 text-center" style="font-family:'Pacifico',cursive;color:#a67c52;letter-spacing:1px;text-shadow:1px 2px 8px #e6d3c0;">
                            <i class="fa-solid fa-mug-hot me-2"></i>Formulir Pemesanan
                        </h2>
                        <p class="mb-4 text-muted text-center" style="font-size:1.08rem;">Isi data berikut untuk memesan minuman favoritmu dan nikmati pengalaman ngopi terbaik!</p>
                        <form action="proses_pesanan.php" method="POST" autocomplete="off">
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
                                <img src="../img/coffee-cup.png" alt="Coffee Cup" style="width:60px;filter:drop-shadow(0 2px 8px #a67c52);margin-bottom:10px;animation: swing 1.5s infinite alternate;">
                                <div style="font-size:0.97rem;color:#a67c52;font-style:italic;">Setiap pesanan dibuat dengan cinta & kopi terbaik!</div>
                            </div>
                            <button type="submit" class="btn w-100 py-2 fw-bold text-white rounded-pill shadow" style="background:linear-gradient(90deg,#a67c52 60%,#6f4e37 100%);font-size:1.15rem;letter-spacing:0.5px;box-shadow:0 4px 16px rgba(166,124,82,0.13);transition:background 0.3s;">
                                <i class="fa-solid fa-paper-plane me-2"></i>Pesan Sekarang
                            </button>
                        </form>
                    </div>
                    <!-- Decorative Bottom Bar -->
                    <div style="position:absolute;bottom:0;left:0;width:100%;height:18px;background:linear-gradient(90deg,#6f4e37 60%,#a67c52 100%);z-index:1;display:flex;align-items:center;justify-content:center;">
                        <span style="color:#fff;font-size:0.95rem;letter-spacing:1px;"><i class="fa-solid fa-heart me-1"></i> Dose Coffee</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
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