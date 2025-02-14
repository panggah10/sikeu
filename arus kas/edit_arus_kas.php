<?php
session_start();
include '../template/header.php';
include '../template/sidebar.php';

if (!isset($_GET['edit']) || !isset($_SESSION['data_arus_kas'][$_GET['edit']])) {
    echo "<script>alert('Data tidak ditemukan!'); window.location.href='index.php';</script>";
    exit;
}

$index = $_GET['edit'];
$data = $_SESSION['data_arus_kas'][$index];

if (isset($_POST['update'])) {
    $_SESSION['data_arus_kas'][$index] = [
        "tanggal" => $_POST['tanggal'],
        "keterangan" => $_POST['keterangan'],
        "jenis" => $_POST['jenis'],
        "jumlah" => $_POST['jumlah']
    ];
    echo "<script>alert('Data berhasil diperbarui!'); window.location.href='index.php';</script>";
}
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Data Arus Kas</h1>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Data</h5>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $data['tanggal']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $data['keterangan']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis" class="form-label">Jenis</label>
                                <select class="form-control" id="jenis" name="jenis" required>
                                    <option value="Pemasukan" <?php echo ($data['jenis'] == 'Pemasukan') ? 'selected' : ''; ?>>Pemasukan</option>
                                    <option value="Pengeluaran" <?php echo ($data['jenis'] == 'Pengeluaran') ? 'selected' : ''; ?>>Pengeluaran</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo $data['jumlah']; ?>" required>
                            </div>
                            <button type="submit" name="update" class="btn btn-success">Update</button>
                            <a href="index.php" class="btn btn-secondary">Batal</a>
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
