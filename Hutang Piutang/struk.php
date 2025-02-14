<?php
session_start();
if (!isset($_SESSION['struk_pembayaran'])) {
    echo "<script>alert('Tidak ada transaksi!'); window.location.href = 'hutang_piutang.php';</script>";
    exit();
}

$struk = $_SESSION['struk_pembayaran'];
unset($_SESSION['struk_pembayaran']); // Hapus setelah ditampilkan
?>

<?php include '../template/header.php'; ?>
<?php include '../template/sidebar.php'; ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Struk Pembayaran</h1>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card shadow-lg p-4">
                    <div class="card-body text-center">
                        <h2 class="mb-3">💰 Struk Pembayaran</h2>
                        <hr>
                        <p><strong>Nama Peminjam:</strong> <?= htmlspecialchars($struk['nama_peminjam']) ?></p>
                        <p><strong>Hutang Awal:</strong> Rp <?= number_format($struk['hutang_awal'], 0, ',', '.') ?></p>
                        <p><strong>Jumlah Dibayar:</strong> Rp <?= number_format($struk['jumlah_bayar'], 0, ',', '.') ?></p>
                        <p><strong>Sisa Hutang:</strong> Rp <?= number_format($struk['sisa_hutang'], 0, ',', '.') ?></p>
                        <p><strong>Status:</strong> 
                            <span class="badge <?= ($struk['status'] == 'Piutang') ? 'bg-warning' : 'bg-success' ?>">
                                <?= $struk['status'] ?>
                            </span>
                        </p>
                        <p><strong>Tanggal Pembayaran:</strong> <?= $struk['tanggal_bayar'] ?></p>
                        <hr>
                        <button onclick="window.print()" class="btn btn-primary">🖨 Print Struk</button>
                        <a href="hutang_piutang.php" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include '../template/footer.php'; ?>
