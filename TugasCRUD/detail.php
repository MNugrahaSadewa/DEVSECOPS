<?php
require_once 'function.php'; // Memuat koneksi database

/** @var mysqli $koneksi */
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Jika Data Mahasiswa diklik
if (isset($_POST['dataSiswa'])) {
    $output = '';

    // Validasi dan casting $_POST['dataSiswa']
    $dataSiswa = isset($_POST['dataSiswa']) ? trim((string)$_POST['dataSiswa']) : '';
    if ($dataSiswa === '') {
        die("NIM tidak boleh kosong.");
    }

    // Siapkan query menggunakan prepared statement
    $stmt = $koneksi->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
    if ($stmt === false) {
        die("Query gagal dipersiapkan: " . $koneksi->error);
    }

    $stmt->bind_param("s", $dataSiswa);
    if (!$stmt->execute()) {
        die("Eksekusi query gagal: " . $stmt->error);
    }

    $result = $stmt->get_result();
    if ($result === false) {
        die("Pengambilan hasil query gagal: " . $stmt->error);
    }

    // Cek apakah ada data
    if ($result->num_rows > 0) {
        $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
        while ($row = $result->fetch_assoc()) {
            // Pastikan nilai dari setiap field adalah string sebelum diproses
            $nim = isset($row['nim']) ? htmlspecialchars((string)$row['nim']) : '';
            $nama = isset($row['nama']) ? htmlspecialchars((string)$row['nama']) : '';
            $kelas = isset($row['kelas']) ? htmlspecialchars((string)$row['kelas']) : '';
            $jurusan = isset($row['jurusan']) ? htmlspecialchars((string)$row['jurusan']) : '';
            $semester = isset($row['semester']) ? htmlspecialchars((string)$row['semester']) : '';

            $output .= "
                <tr><th width='40%'>NIM</th><td width='60%'>$nim</td></tr>
                <tr><th width='40%'>Nama</th><td width='60%'>$nama</td></tr>
                <tr><th width='40%'>Kelas</th><td width='60%'>$kelas</td></tr>
                <tr><th width='40%'>Jurusan</th><td width='60%'>$jurusan</td></tr>
                <tr><th width='40%'>Semester</th><td width='60%'>$semester</td></tr>";
        }
        $output .= '</table></div>';
    } else {
        $output = "Data tidak ditemukan.";
    }
    echo $output;
}
