<?php include 'database2.php' ?>

<?php
if (isset($_POST['akun'])) {
    if (create_pendaftaran($_POST) > 0) {
        echo "<script>alert('data akun berhasil ditambahakan.'); window.location.href ='index.php';</script>";
    } else {
        echo "<script>alert('data akun gagal ditambahkan. ');  </script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Pacifico&display=swap');

    body {
        background: linear-gradient(135deg, #7b4b28 0%, #a67c52 100%);
        min-height: 100vh;
        font-family: 'Montserrat', Arial, sans-serif;
    }

    .card {
        background: #f9f6f2;
        border-radius: 20px;
        box-shadow: 0 10px 36px 0 rgba(44, 34, 18, 0.18);
        border: none;
        padding-top: 32px;
        padding-bottom: 32px;
        position: relative;
        overflow: hidden;
    }

    .card:before {
        content: "";
        position: absolute;
        top: -40px;
        right: -40px;
        width: 120px;
        height: 120px;
        background: radial-gradient(circle, #e0c9a6 60%, transparent 100%);
        opacity: 0.25;
        z-index: 0;
    }

    .form-label {
        color: #7b4b28;
        font-weight: 600;
    }

    .form-control {
        border-radius: 10px;
        border: 1.5px solid #e0c9a6;
        background: #fffdfa;
    }

    .form-control:focus {
        border-color: #a67c52;
        box-shadow: 0 0 0 0.2rem rgba(166, 124, 82, 0.15);
    }

    .btn-primary {
        background-color: rgba(183, 134, 106, 0.54) !important;
        /* gold */
        border: none;
        font-weight: bold;
        letter-spacing: 1px;
        transition: background 0.2s, transform 0.2s;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(123, 75, 40, 0.12);
        color: #7b4b28 !important;
    }

    .btn-primary:hover {
        background-color: #FFC300 !important;
        /* darker gold */
        transform: translateY(-2px) scale(1.03);
        color: #7b4b28 !important;
    }

    h1.coffee-title {
        font-family: 'Pacifico', cursive;
        color: #7b4b28;
        text-align: center;
        margin-bottom: 28px;
        font-size: 2.4rem;
        letter-spacing: 2px;
        text-shadow: 1px 2px 12px #e0c9a6;
    }

    .coffee-icon {
        display: flex;
        justify-content: center;
        margin-bottom: 10px;
    }

    .coffee-icon svg {
        width: 48px;
        height: 48px;
        fill: #a67c52;
        filter: drop-shadow(0 2px 6px #e0c9a6);
    }
</style>

<body class="container d-flex align-items-center justify-content-center" style="min-height:100vh;">
    <div class="card p-4" style="width: 500px;">
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Username</label>
                <input type="text" class="form-control" id="nama" name="username" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="akun">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>