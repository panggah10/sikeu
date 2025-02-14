<?php
session_start();
include '../template/header.php';
include '../template/sidebar.php';

// Periksa apakah parameter 'id' tersedia
if (!isset($_GET['id']) || !isset($_SESSION['hutang_data'][$_GET['id']])) {
    echo "<script>alert('Data tidak ditemukan!'); window.location.href = 'hutang_piutang.php';</script>";
    exit();
}

$id = $_GET['id'];
$data = $_SESSION['hutang_data'][$id];

// Proses form jika disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $_SESSION['hutang_data'][$id] = [
        "nama_peminjam" => htmlspecialchars($_POST['nama_peminjam']),
        "jumlah_hutang" => htmlspecialchars($_POST['jumlah_hutang']),
        "tanggal_pinjam" => htmlspecialchars($_POST['tanggal_pinjam']),
        "jatuh_tempo" => htmlspecialchars($_POST['jatuh_tempo'])
    ];

    echo "<script>alert('Hutang berhasil diperbarui!'); window.location.href = 'hutang_piutang.php';</script>";
    exit();
}
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Hutang</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="hutang_page.piutang">Home</a></li>
                <li class="breadcrumb-item active">Edit Hutang</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Edit Hutang</h5>

                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Nama Peminjam</label>
                                <input type="text" name="nama_peminjam" class="form-control" value="<?= $data['nama_peminjam']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jumlah Hutang</label>
                                <input type="number" name="jumlah_hutang" class="form-control" value="<?= $data['jumlah_hutang']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Pinjam</label>
                                <input type="date" name="tanggal_pinjam" class="form-control" value="<?= $data['tanggal_pinjam']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jatuh Tempo</label>
                                <input type="date" name="jatuh_tempo" class="form-control" value="<?= $data['jatuh_tempo']; ?>" required>
                            </div>

                            <button type="submit" name="submit" class="btn btn-success">Simpan Perubahan</button>
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
