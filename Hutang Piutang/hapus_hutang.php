<?php
session_start();

// Pastikan ada ID yang dikirim
if (!isset($_GET['id'])) {
    die("Error: ID tidak ditemukan!");
}

$id = $_GET['id'];

// Cek apakah data hutang ada
if (!isset($_SESSION['hutang_data'][$id])) {
    die("Error: Data hutang tidak ditemukan!");
}

// Hapus data dari session
unset($_SESSION['hutang_data'][$id]);

// Redirect kembali ke halaman utama
header("Location: hutang_piutang.php");
exit();
