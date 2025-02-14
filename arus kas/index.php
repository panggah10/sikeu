<?php
session_start();
include '../template/header.php';
include '../template/sidebar.php';
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Arus Kas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>/sikeu/index.php">Home</a></li>
                <li class="breadcrumb-item active">Arus Kas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data Arus Kas</h5>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis" class="form-label">Jenis</label>
                                <select class="form-control" id="jenis" name="jenis" required>
                                    <option value="Pemasukan">Pemasukan</option>
                                    <option value="Pengeluaran">Pengeluaran</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        </form>
                        
                        <?php
                        if (!isset($_SESSION['data_arus_kas'])) {
                            $_SESSION['data_arus_kas'] = [];
                        }

                        if (isset($_POST['submit'])) {
                            $tanggal = $_POST['tanggal'];
                            $keterangan = $_POST['keterangan'];
                            $jenis = $_POST['jenis'];
                            $jumlah = $_POST['jumlah'];

                            $_SESSION['data_arus_kas'][] = [
                                "tanggal" => $tanggal,
                                "keterangan" => $keterangan,
                                "jenis" => $jenis,
                                "jumlah" => $jumlah
                            ];
                            "echo <script>alert('Data berhasil ditambahkan!'); window.location.href='index.php';</script>";
                        }

                        if (isset($_GET['hapus'])) {
                            $index = $_GET['hapus'];
                            unset($_SESSION['data_arus_kas'][$index]);
                            $_SESSION['data_arus_kas'] = array_values($_SESSION['data_arus_kas']);
                            echo "<script>alert('Data berhasil dihapus!'); window.location.href='index.php';</script>";
                        }
                        ?>
                    </div>
                </div>
                
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Data Arus Kas</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Jenis</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($_SESSION['data_arus_kas'] as $index => $row) {
                                    echo "<tr>";
                                    echo "<td>{$row['tanggal']}</td>";
                                    echo "<td>{$row['keterangan']}</td>";
                                    echo "<td>{$row['jenis']}</td>";
                                    echo "<td>Rp " . number_format($row['jumlah'], 0, ',', '.') . "</td>";
                                    echo "<td>
                                        <a href='edit_arus_kas.php?edit=$index' class='btn btn-warning btn-sm'>Edit</a>
                                        <a href='?hapus=$index' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                                    </td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
<?php
include '../template/footer.php';
?>
