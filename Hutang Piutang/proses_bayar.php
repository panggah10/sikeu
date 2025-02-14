<?php
session_start();

if (!isset($_POST['hutang_id']) || !isset($_POST['jumlah_bayar'])) {
    echo "<script>alert('Data tidak valid!'); window.location.href = 'hutang_piutang.php';</script>";
    exit();
}

$id = $_POST['hutang_id'];
$jumlah_bayar = floatval($_POST['jumlah_bayar']);

if (!isset($_SESSION['hutang_data'][$id])) {
    echo "<script>alert('Data hutang tidak ditemukan!'); window.location.href = 'hutang_piutang.php';</script>";
    exit();
}

$hutang_awal = $_SESSION['hutang_data'][$id]['jumlah_hutang'];
$sisa_hutang = $hutang_awal - $jumlah_bayar;

// Cek apakah pembayaran lebih dari setengah hutang
$status = ($jumlah_bayar >= ($hutang_awal / 2)) ? "Piutang" : "Masih Berhutang";

$_SESSION['struk_pembayaran'] = [
    'nama_peminjam' => $_SESSION['hutang_data'][$id]['nama_peminjam'],
    'hutang_awal' => $hutang_awal,
    'jumlah_bayar' => $jumlah_bayar,
    'sisa_hutang' => max(0, $sisa_hutang),
    'tanggal_bayar' => date("Y-m-d H:i:s"),
    'status' => $status
];

if ($sisa_hutang <= 0) {
    unset($_SESSION['hutang_data'][$id]); // Lunas
} else {
    $_SESSION['hutang_data'][$id]['jumlah_hutang'] = $sisa_hutang;
}

header("Location: struk.php");
exit();

