<?php
session_start();
include '../template/header.php';
include '../template/sidebar.php';

// Ambil data dari session
$hutang_data = isset($_SESSION['hutang_data']) ? $_SESSION['hutang_data'] : [];

// Proses hapus jika ada pengiriman data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus'])) {
    if (!empty($_POST['selected'])) {
        foreach ($_POST['selected'] as $id) {
            unset($_SESSION['hutang_data'][$id]); // Hapus data dari session
        }
        $_SESSION['hutang_data'] = array_values($_SESSION['hutang_data']); // Reset array index
        echo "<script>alert('Data hutang yang dipilih telah dihapus!'); window.location.href = 'hutang_piutang.php';</script>";
        exit();
    } else {
        echo "<script>alert('Pilih data yang ingin dihapus!');</script>";
    }
}
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Hutang</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Hutang</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Hutang</h5>
                        <a href="tambah_hutang.php" class="btn btn-primary mb-3">Tambah Hutang</a>

                        <form method="POST">
                        <table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Peminjam</th>
            <th>Jumlah Hutang</th>
            <th>Tanggal Pinjam</th>
            <th>Jatuh Tempo</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (empty($_SESSION['hutang_data'])) {
            echo "<tr><td colspan='6' class='text-center'>Tidak ada data hutang</td></tr>";
        } else {
            $no = 1;
            foreach ($_SESSION['hutang_data'] as $id => $row) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . htmlspecialchars($row['nama_peminjam']) . "</td>";
                echo "<td>Rp " . number_format($row['jumlah_hutang'], 0, ',', '.') . "</td>";
                echo "<td>" . htmlspecialchars($row['tanggal_pinjam']) . "</td>";
                echo "<td>" . htmlspecialchars($row['jatuh_tempo']) . "</td>";
                echo "<td>
                    <a href='edit_hutang.php?id=$id' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='hapus_hutang.php?id=$id' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                    <form method='POST' action='proses_bayar.php' style='display:inline-block;'>
                        <input type='hidden' name='hutang_id' value='$id'>
                        <input type='number' name='jumlah_bayar' class='form-control' style='width:100px; display:inline-block;' required min='1' max='{$row['jumlah_hutang']}'>
                        <button type='submit' class='btn btn-success btn-sm'>Bayar</button>
                    </form>
                </td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
<div class="col-lg-12 text-center mt-3">
    
</div>


                            
                            
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    // Checkbox Select All Feature
    document.getElementById("select_all").addEventListener("change", function() {
        let checkboxes = document.querySelectorAll(".checkbox");
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });
</script>

<?php
include '../template/footer.php';
?>
