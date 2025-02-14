<?php
session_start();
include '../template/header.php';
include '../template/sidebar.php';

// Inisialisasi session jika belum ada
if (!isset($_SESSION['hutang_data'])) {
    $_SESSION['hutang_data'] = [];
}

// Proses form jika ada submit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $nama_peminjam = htmlspecialchars($_POST['nama_peminjam']);
    $jumlah_hutang = htmlspecialchars($_POST['jumlah_hutang']);
    $tanggal_pinjam = htmlspecialchars($_POST['tanggal_pinjam']);
    $jatuh_tempo = htmlspecialchars($_POST['jatuh_tempo']);

    // Simpan data ke session
    $_SESSION['hutang_data'][] = [
        "nama_peminjam" => $nama_peminjam,
        "jumlah_hutang" => $jumlah_hutang,
        "tanggal_pinjam" => $tanggal_pinjam,
        "jatuh_tempo" => $jatuh_tempo
    ];

    // Redirect ke halaman utama setelah berhasil
    echo "<script>alert('Hutang berhasil ditambahkan!'); window.location.href = 'hutang_piutang.php';</script>";
    exit();
}
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Hutang</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="hutang_piutang.php">Home</a></li>
                <li class="breadcrumb-item active">Tambah Hutang</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Tambah Hutang</h5>

                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Nama Peminjam</label>
                                <input type="text" name="nama_peminjam" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jumlah Hutang</label>
                                <input type="number" name="jumlah_hutang" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Pinjam</label>
                                <input type="date" name="tanggal_pinjam" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jatuh Tempo</label>
                                <input type="date" name="jatuh_tempo" class="form-control" required>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                            <a href="hutang_piutang.php" class="btn btn-secondary">Batal</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
include '../template/footer.php';
?>
