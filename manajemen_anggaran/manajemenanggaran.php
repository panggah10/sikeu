<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Anggaran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container mt-5">
        <h1 class="text-center"></h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Anggaran</th>
                    <th>Jumlah Anggaran</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Berakhir</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                <!--data akan diisi dari database-->
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>

        </table>

    </div>
    <div class="container mt-5">
        <h2 class="text-center">Tambah Anggaran</h2>
        <form action="">
            <div class="mb-3">
                <label for="namaAnggaran" class="form-label">Nama Anggaran</label>
                <input type="text" class="form-control" id="namaAnggaran" required>
            </div>
            <div class="mb-3">
                <label for="jumlahAnggaran" class="form-label">Jumlah Anggaran</label>
                <input type="number" class="form-control" id="jumlahAnggaran" required>
            </div>
            <div class="mb-3">
                <label for="tanggalMulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="tanggalMulai" required>
            </div>
            <div class="mb-3">
                <label for="tanggalBerakhir" class="form-label">Tanggal Berkahir</label>
                <input type="date" class="form-control" id="tanggalBerakhir" required>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="kategori" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    
    </div><!-- End Page Title -->
</body>
</html>