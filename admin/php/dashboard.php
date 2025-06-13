<?php
require_once 'database.php';

// Ambil data dari database
$data_pesanan = select("SELECT * FROM data_pesanan");
$data_menu = select("SELECT * FROM data_menu2");
$data_pendaftaran = select("SELECT * FROM data_pendaftaran");

// Hitung total data
$total_pesanan = count($data_pesanan);
$total_menu = count($data_menu);
$total_pendaftaran = count($data_pendaftaran);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Halaman Database</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Inter:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #f8fafc 0%, #d7b899 100%);
            font-family: 'Inter', sans-serif;
        }
        .nav-container {
            background: #fff;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            padding: 1rem 2rem;
            margin-bottom: 2rem;
        }
        .nav-title {
            font-weight: 700;
            font-size: 1.5rem;
            color: #8d6748;
        }
        .nav-link.active,
        .nav-link:hover {
            color: #a9744f !important;
            font-weight: 600;
        }
        .card {
            transition: transform 0.2s, box-shadow 0.2s;
            border-radius: 1rem;
        }
        .card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 8px 24px rgba(141, 103, 72, 0.12);
        }
        .card-title {
            font-size: 1.1rem;
            color: #a9744f;
        }
        .display-5 {
            font-size: 2.5rem;
            color: #8d6748;
        }
        .border-success {
            border-color: #b68973 !important;
        }
        .border-primary {
            border-color: #a9744f !important;
        }
        .border-warning {
            border-color: #d7b899 !important;
        }
        .text-success {
            color: #b68973 !important;
        }
        .text-primary {
            color: #a9744f !important;
        }
        .text-warning {
            color: #d7b899 !important;
        }
    </style>
</head>

<body>
    <nav>
        <div class="nav-container d-flex align-items-center justify-content-between">
            <div class="nav-title">Dose Coffe</div>
            <div class="nav-links d-flex" style="gap: 1rem;">
                <a class="nav-link active" href="dashboard.php">Dashboard</a>
                <a class="nav-link" href="DataPendaftaran.php">Data Pendaftaran</a>
                <a class="nav-link" href="DataMenu.php">Data Menu</a>
                <a class="nav-link" href="DataPesanan.php">Data Pesanan</a>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-success shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-basket display-5 text-success me-3"></i>
                        <div>
                            <h5 class="card-title mb-1">Total Pesanan</h5>
                            <h3 class="mb-0"><span class="counter" data-target="<?php echo $total_pesanan; ?>"></span></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-primary shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-list-ul display-5 text-primary me-3"></i>
                        <div>
                            <h5 class="card-title mb-1">Total Menu</h5>
                            <h3 class="mb-0"><span class="counter" data-target="<?php echo $total_menu; ?>"></span></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-warning shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-person-check display-5 text-warning me-3"></i>
                        <div>
                            <h5 class="card-title mb-1">Total Pendaftaran</h5>
                            <h3 class="mb-0"><span class="counter" data-target="<?php echo $total_pendaftaran; ?>"></span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Counter animation
        document.querySelectorAll('.counter').forEach(counter => {
            counter.innerText = '0';
            const updateCounter = () => {
                const target = +counter.getAttribute('data-target');
                const c = +counter.innerText;
                const increment = Math.ceil(target / 40);
                if (c < target) {
                    counter.innerText = c + increment;
                    setTimeout(updateCounter, 20);
                } else {
                    counter.innerText = target;
                }
            };
            updateCounter();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
