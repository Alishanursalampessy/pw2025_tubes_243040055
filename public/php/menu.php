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
                        <a class="nav-link active" href="menu.php"><i class="bi bi-star"></i> Menu</a>
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

    <!-- Banner Menu -->
    <section class="container mb-5 d-falex justify-content-center align-items-center" style="background: linear-gradient(120deg, #f3e9e1 60%, #e3cfc1 100%);">
        <div class="row align-items-center banner-menu p-4">
            <div class="col-md-7">
                <h1 class="display-5 fw-bold" style="font-family: Arial, sans-serif; color: #bfa074; ;">
                    Selamat Datang di Dose Coffee
                </h1>
                <a href="#daftar-menu" class="btn btn-lg mt-2 px-4 rounded-pill shadow-sm" style="background: linear-gradient(90deg, #bfa074 60%, #4e342e 100%); color:#fff;">
                    Lihat Menu <i class="fa-solid fa-arrow-down ms-2"></i>
                </a>
            </div>
            <div class="col-md-5 text-center">
            </div>
        </div>
    </section>

    <?php
    $menus = [
        [
            'kategori' => 'Hot And Ice',
            'items' => [
                [
                    'nama' => 'Americano',
                    'deskripsi' => 'Minuman kopi yang dibuat dengan mencampurkan satu atau dua shot espresso dengan air panas',
                    'harga' => 20000,
                    'gambar' => '..//img/menu1.jpg'
                ],
                [
                    'nama' => 'Cappuccino',
                    'deskripsi' => 'Minuman kopi khas Italia yang terdiri dari espresso, susu panas, dan busa susu dengan perbandingan yang biasanya',
                    'harga' => 15000,
                    'gambar' => '../img/menu2.jpg'
                ],
                [
                    'nama' => 'Exspresso',
                    'deskripsi' => 'Minuman kopi yang dibuat dengan menyeduh biji kopi yang telah digiling halus dengan tekanan tinggi',
                    'harga' => 18000,
                    'gambar' => '..//img/menu3.jpg'
                ],
                [
                    'nama' => 'Luxe Latte',
                    'deskripsi' => 'Minuman kopi berbasis espresso yang dicampur dengan susu steamed ',
                    'harga' => 15000,
                    'gambar' => '..//img/menu4.jpg'
                ],
                [
                    'nama' => 'Dalgona Matcha',
                    'deskripsi' => 'Varian Coffee, tetapi menggunakan bubuk matcha sebagai penggati utama',
                    'harga' => 22000,
                    'gambar' => ' ../img/menu5.jpg'
                ],
                [
                    'nama' => 'Mystic Gayo',
                    'deskripsi' => ' Salah satu kopi terbaik dari Indonesia yang berasal dari Dataran Tinggi Gayo, Aceh Tengah',
                    'harga' => 10000,
                    'gambar' => '..//img/menu6.jpg'
                ],
                [
                    'nama' => 'Choco Chips Avocado',
                    'deskripsi' => 'Minuman atau makanan yang menggabungkan rasa creamy alpukat dengan manisnya cokelat dan kerenyahan choco chips',
                    'harga' => 25000,
                    'gambar' => '..//img/menu7.jpg'
                ],
                [
                    'nama' => 'Chocolate Shake',
                    'deskripsi' => 'Minuman dingin yang dibuat dengan mencampurkan es krim cokelat, susu, dan sirup cokelat, lalu dikocok hingga teksturnya lembut dan creamy',
                    'harga' => 13000,
                    'gambar' => '..//img/menu8.jpg'
                ],
                [
                    'nama' => 'Almond Caramel',
                    'deskripsi' => 'Kombinasi lezat antara kacang almond yang renyah dan karamel yang manis serta sedikit gurih',
                    'harga' => 20000,
                    'gambar' => '..//img/menu9.jpg'
                ],
                [
                    'nama' => 'Smoothie Strawberry',
                    'deskripsi' => 'Smoothie segar dari stroberi, yogurt, dan madu',
                    'harga' => 15000,
                    'gambar' => '..//img/menu10.jpg'
                ],
            ]
        ],
        [
            'kategori' => 'Dessert',
            'items' => [
                [
                    'nama' => 'Plain Waffle',
                    'deskripsi' => 'Waffle klasik yang lembut dan renyah, disajikan dengan sirup maple',
                    'harga' => 25000,
                    'gambar' => '..//img/food1.jpg'
                ],
                [
                    'nama' => 'Swiss Roll',
                    'deskripsi' => 'Kue gulung lembut dengan isian krim vanila dan taburan gula halus',
                    'harga' => 20000,
                    'gambar' => '..//img/food2.jpg'
                ],
                [
                    'nama' => 'Pancake',
                    'deskripsi' => 'Pancake fluffy disajikan dengan selai stroberi dan whipped cream',
                    'harga' => 18000,
                    'gambar' => '..//img/food3.jpg'
                ],
                [
                    'nama' => 'Cookies',
                    'deskripsi' => 'Kue kering renyah dengan potongan cokelat dan kacang kenari',
                    'harga' => 10000,
                    'gambar' => '..//img/food4.jpg'
                ],
                [
                    'nama' => 'chessecake',
                    'deskripsi' => 'Kue keju lembut dengan dasar biskuit dan saus buah segar',
                    'harga' => 26000,
                    'gambar' => '..//img/food5.jpg'
                ],
                [
                    'nama' => 'Combroloni',
                    'deskripsi' => 'pastry unik yang menggabungkan tekstur renyah croissant dengan kelembutan bomboloni',
                    'harga' => 30000,
                    'gambar' => '..//img/food6.jpg'
                ],
            ]
        ]
    ];
    ?>

    <!-- Tambahkan AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <section class="container mb-5" id="daftar-menu">
        <?php foreach ($menus as $menu): ?>
            <h2 class="fw-bold mb-4" style="color:#7B4F27; letter-spacing:1px;" data-aos="fade-right"><?= htmlspecialchars($menu['kategori']) ?></h2>
            <div class="row g-4 mb-5">
                <?php foreach ($menu['items'] as $idx => $item): ?>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?= $idx * 100 ?>">
                        <div class="card h-100 shadow-sm border-0" style="background: linear-gradient(135deg, #f3e9e1 70%, #e3cfc1 100%);">
                            <img src="<?= htmlspecialchars($item['gambar']) ?>" class="card-img-top" alt="<?= htmlspecialchars($item['nama']) ?>" style="height:200px;object-fit:cover; border-top-left-radius: .5rem; border-top-right-radius: .5rem;">
                            <div class="card-body">
                                <h5 class="card-title" style="color:#7B4F27; font-weight:bold;"><?= htmlspecialchars($item['nama']) ?></h5>
                                <p class="card-text" style="color:#4e342e;"><?= htmlspecialchars($item['deskripsi']) ?></p>
                            </div>
                            <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center" style="background: #e3cfc1;">
                                <span class="fw-bold" style="color:#A67C52;">Rp<?= number_format($item['harga'], 0, ',', '.') ?></span>
                                <a href="pesanan.php?menu=<?= urlencode($item['nama']) ?>" class="btn btn-sm rounded-pill px-3" style="background: linear-gradient(90deg, #7B4F27 60%, #A67C52 100%); color:#fff;">
                                    Pesan <i class="fa-solid fa-cart-plus ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </section>

    <!-- Tambahkan AOS JS dan inisialisasi -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 800,
        });
    </script>

    <!-- footer -->
    <footer class="text-center py-3 mt-4">
        <span>&copy; <?= date('Y') ?> Dose Coffe. All rights reserved.</span>
        <div class="footer-social">
            <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" title="Facebook"><i class="fab fa-facebook"></i></a>
            <a href="#" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>