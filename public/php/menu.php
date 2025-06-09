<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dose coffe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/menu.css">
</head>

<body>
    <!-- Awal Navbar -->
    <nav class="navbar navbar-expand-lg mb-4 py-3" style="background: linear-gradient(90deg, #4e342e 60%, #bfa074 100%) !important; border-radius: 0 0 30px 30px; box-shadow: 0 6px 24px rgba(78, 52, 46, 0.18); min-height: 90px;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center me-4" href="/php/home.php">
                <img src="../img/logo.png" alt="Logo" class="img-fluid" style="width: 90px; height: 70px; filter: drop-shadow(0 4px 16px rgba(111, 78, 55, 0.18));">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fw-bold">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php"><i class="fa-solid fa-house"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="menu.php"><i class="fa-solid fa-utensils"></i> Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pesan.php"><i class="fa-solid fa-envelope"></i> Pesan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Banner Menu -->
    <section class="container mb-5">
        <div class="row align-items-center banner-menu p-4">
            <div class="col-md-7">
                <h1 class="display-5 fw-bold" style="font-family: Arial, sans-serif; color: #bfa074;">
                    Caffe Menu
                </h1>
                <p class="lead mt-3" style="color: #bfa074;">
                    Kami percaya bahwa kopi bukan sekadar minuman, tetapi seni yang menyatukan hati dan menciptakan kenangan
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
                    'deskripsi' => 'adalah minuman kopi yang dibuat dengan mencampurkan satu atau dua shot espresso dengan air panas',
                    'harga' => 20000,
                    'gambar' => '..//img/menu1.jpg'
                ],
                [
                    'nama' => 'Cappuccino',
                    'deskripsi' => 'adalah minuman kopi khas Italia yang terdiri dari espresso, susu panas, dan busa susu dengan perbandingan yang biasanya',
                    'harga' => 15000,
                    'gambar' => '../img/menu2.jpg'
                ],
                [
                    'nama' => 'Exspresso',
                    'deskripsi' => 'adalah minuman kopi yang dibuat dengan menyeduh biji kopi yang telah digiling halus dengan tekanan tinggi',
                    'harga' => 18000,
                    'gambar' => '..//img/menu3.jpg'
                ],
                [
                    'nama' => 'Luxe Latte',
                    'deskripsi' => 'adalah minuman kopi berbasis espresso yang dicampur dengan susu steamed ',
                    'harga' => 15000,
                    'gambar' => '..//img/menu4.jpg'
                ],
                [
                    'nama' => 'Dalgona Matcha',
                    'deskripsi' => ' adalah varian Coffee, tetapi menggunakan bubuk matcha sebagai penggati utama',
                    'harga' => 22000,
                    'gambar' => ' ../img/menu5.jpg'
                ],
                [
                    'nama' => 'Mystic Gayo',
                    'deskripsi' => 'adalah salah satu kopi terbaik dari Indonesia yang berasal dari Dataran Tinggi Gayo, Aceh Tengah',
                    'harga' => 10000,
                    'gambar' => '..//img/menu6.jpg'
                ],
                [
                    'nama' => 'Choco Chips Avocado',
                    'deskripsi' => 'adalah minuman atau makanan yang menggabungkan rasa creamy alpukat dengan manisnya cokelat dan kerenyahan choco chips',
                    'harga' => 25000,
                    'gambar' => '..//img/menu7.jpg'
                ],
                [
                    'nama' => 'Chocolate Shake',
                    'deskripsi' => 'adalah minuman dingin yang dibuat dengan mencampurkan es krim cokelat, susu, dan sirup cokelat, lalu dikocok hingga teksturnya lembut dan creamy',
                    'harga' => 13000,
                    'gambar' => '..//img/menu8.jpg'
                ],
                [
                    'nama' => 'Almond Caramel',
                    'deskripsi' => 'adalah kombinasi lezat antara kacang almond yang renyah dan karamel yang manis serta sedikit gurih',
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
                    'deskripsi' => 'adalah pastry unik yang menggabungkan tekstur renyah croissant dengan kelembutan bomboloni',
                    'harga' => 30000,
                    'gambar' => '..//img/food6.jpg'
                ],
            ]
        ]
    ];
    ?>

    <section class="container mb-5" id="daftar-menu">
        <?php foreach ($menus as $menu): ?>
            <h2 class="fw-bold mb-4" style="color:#388e3c;"><?= htmlspecialchars($menu['kategori']) ?></h2>
            <div class="row g-4 mb-5">
                <?php foreach ($menu['items'] as $item): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="<?= htmlspecialchars($item['gambar']) ?>" class="card-img-top" alt="<?= htmlspecialchars($item['nama']) ?>" style="height:200px;object-fit:cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($item['nama']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($item['deskripsi']) ?></p>
                            </div>
                            <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-success">Rp<?= number_format($item['harga'], 0, ',', '.') ?></span>
                                <a href="pesan.php?menu=<?= urlencode($item['nama']) ?>" class="btn btn-sm btn-success rounded-pill px-3">
                                    Pesan <i class="fa-solid fa-cart-plus ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </section>

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