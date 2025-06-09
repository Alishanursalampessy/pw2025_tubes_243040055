<?php include 'database.php' ?>
<?php
if (isset($_POST['menu'])) {
    if (create_menu($_POST) > 0) {
        echo "<script>alert('data menu berhasil ditambahakan.'); </script>";
    } else {
        echo "<script>alert('data menu gagal ditambahkan.'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<style>
    body {
        background: linear-gradient(135deg, #ece0d1 0%, #f5f5dc 100%);
        min-height: 100vh;
        font-family: 'Montserrat', Arial, sans-serif;
    }
</style>

<body class="container d-flex align-items-center justify-content-center" style="min-height:100vh;">

    <div class="card shadow-lg p-4 border-0 rounded-4" style="width: 500px;">
        <h3 class="mb-4 text-center fw-bold">Tambah Menu</h3>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama_makanan" class="form-label">Nama Makanan</label>
                <input type="text" class="form-control" id="nama_makanan" name="nama_makanan" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="2" required></textarea>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" min="0" required>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" required>
            </div>
            <div class="mb-3">
                <label for="foto_menu" class="form-label">Foto_menu</label>
                <input type="file" class="form-control" id="foto_menu" name="foto_menu" required onchange="priviewImage(event)">
            </div>
            <div class="mb-3">
                <label for="status_ketersediaan" class="form-label">Status Ketersediaan</label>
                <select class="form-select" id="status_ketersediaan" name="status_ketersediaan" required>
                    <option value="" disabled selected>Pilih status</option>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Habis">Habis</option>
                </select>
            </div>
            <button class="btn btn-succes w-100" type="submit" name="menu">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>