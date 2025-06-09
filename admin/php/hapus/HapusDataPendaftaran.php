<?php
include '../database.php';

$id = (int)$_GET['id'];

if (hapus_pendaftaran($id) > 0) {
    echo "<script>alert('Data pendaftaran berhasil dihapus.'); window.location.href='../DataPendaftaran.php';</script>";
} else {
    echo "<script>alert('Data pendaftaran gagal dihapus.');</script>";
}
?>
