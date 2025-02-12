<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil input dari formulir
    $folder_sumber = $_POST['folder_sumber'];
    $folder_tujuan = $_POST['folder_tujuan'];

    // Pastikan folder sumber ada
    if (!is_dir($folder_sumber)) {
        die("Error: Folder sumber tidak ditemukan!");
    }

    // Membuat folder tujuan jika belum ada
    if (!is_dir($folder_tujuan)) {
        if (!mkdir($folder_tujuan, 0777, true)) {
            die("Error: Gagal membuat folder tujuan!");
        }
    }

    // Fungsi untuk menyalin folder dan isinya
    function copyFolder($source, $destination) {
        // Membuka folder sumber
        $dir = opendir($source);
        if (!$dir) {
            die("Error: Tidak dapat membuka folder sumber.");
        }

        // Membaca isi folder
        while (($file = readdir($dir)) !== false) {
            if ($file != '.' && $file != '..') {
                $src = $source . DIRECTORY_SEPARATOR . $file;
                $dst = $destination . DIRECTORY_SEPARATOR . $file;
                
                // Jika itu adalah folder, buat folder baru dan salin isinya
                if (is_dir($src)) {
                    if (!is_dir($dst)) {
                        mkdir($dst);
                    }
                    copyFolder($src, $dst); // Rekursif
                } else {
                    // Jika itu adalah file, salin file
                    copy($src, $dst);
                }
            }
        }

        closedir($dir);
    }

    // Menyalin folder sumber ke folder tujuan
    copyFolder($folder_sumber, $folder_tujuan);

    echo "<div class='container mt-5'><div class='alert alert-success'>Backup berhasil dilakukan dari $folder_sumber ke $folder_tujuan</div></div>";
} else {
    // Jika metode bukan POST
    echo "<div class='container mt-5'><div class='alert alert-danger'>Formulir tidak disubmit dengan benar.</div></div>";
}
?>

