-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2024 pada 04.59
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikeu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_pengguna`
--

CREATE TABLE `akun_pengguna` (
  `User` varchar(20) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `Permission` varchar(20) NOT NULL,
  `Audit_Log` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keamanan_backup_data`
--

CREATE TABLE `keamanan_backup_data` (
  `User` varchar(20) NOT NULL,
  `Data` varchar(20) NOT NULL,
  `Enkripsi` int(11) NOT NULL,
  `Autentifikasi_2_Faktor` int(11) NOT NULL,
  `Back_Up` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelola_pajak`
--

CREATE TABLE `kelola_pajak` (
  `Karyawan` varchar(20) NOT NULL,
  `Absensi` int(11) NOT NULL,
  `Pajak` int(11) NOT NULL,
  `Gaji` int(11) NOT NULL,
  `Pajak_Karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_keuangan`
--

CREATE TABLE `laporan_keuangan` (
  `Admin` varchar(20) NOT NULL,
  `Kas` int(11) NOT NULL,
  `Neraca` int(11) NOT NULL,
  `Laba_Rugi` int(11) NOT NULL,
  `Arsip_Berkas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `manajemen_anggaran`
--

CREATE TABLE `manajemen_anggaran` (
  `Kampus` varchar(20) NOT NULL,
  `Kategori` varchar(20) NOT NULL,
  `Anggaran` int(11) NOT NULL,
  `Transaksi` int(11) NOT NULL,
  `Laporan_Keuangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `manajemen_hutang_piutang`
--

CREATE TABLE `manajemen_hutang_piutang` (
  `Mahasiswa` varchar(20) NOT NULL,
  `Transaksi` int(11) NOT NULL,
  `Pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi_transaksi`
--

CREATE TABLE `notifikasi_transaksi` (
  `User` varchar(20) NOT NULL,
  `Transaksi` varchar(20) NOT NULL,
  `Notifikasi` varchar(20) NOT NULL,
  `Notifikasi_Type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pencatatan_transaksi_keuangan`
--

CREATE TABLE `pencatatan_transaksi_keuangan` (
  `User` varchar(20) NOT NULL,
  `Kategori` varchar(20) NOT NULL,
  `Akun` varchar(20) NOT NULL,
  `Transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun_pengguna`
--
ALTER TABLE `akun_pengguna`
  ADD PRIMARY KEY (`User`),
  ADD UNIQUE KEY `Role` (`Role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
