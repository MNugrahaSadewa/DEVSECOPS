<?php
// Memanggil atau membutuhkan file function.php
require_once 'function.php'; // Pastikan jalur file sudah benar

// Validasi koneksi database
/** @var mysqli $koneksi */
if (!isset($koneksi)) {
    die("Koneksi database belum tersedia.");
}

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Jika Data Mahasiswa diklik maka
if (isset($_POST['dataSiswa'])) {
    $output = '';

    // Validasi input
    $dataSiswa = isset($_POST['dataSiswa']) ? trim((string)$_POST['dataSiswa']) : '';
    if ($dataSiswa === '') {
        die("NIM tidak boleh kosong.");
    }

    // Menggunakan prepared statement untuk menghindari SQL Injection
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
            $output .= '
                        <tr>
                            <th width="40%">NIM</th>
                            <td width="60%">' . htmlspecialchars((string)$row['nim']) . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama</th>
                            <td width="60%">' . htmlspecialchars((string)$row['nama']) . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Kelas</th>
                            <td width="60%">' . htmlspecialchars((string)$row['kelas']) . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Jurusan</th>
                            <td width="60%">' . htmlspecialchars((string)$row['jurusan']) . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Semester</th>
                            <td width="60%">' . htmlspecialchars((string)$row['semester']) . '</td>
                        </tr>';
        }
        $output .= '</table></div>';
    } else {
        $output = "Data tidak ditemukan.";
    }

    // Tampilkan $output
    echo $output;
}

