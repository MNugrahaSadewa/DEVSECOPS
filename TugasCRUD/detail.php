<?php
// Memanggil atau membutuhkan file function.php
require_once 'function.php'; // Pastikan jalur file sudah benar

// Validasi koneksi database
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
    $dataSiswa = trim($_POST['dataSiswa']);
    if (empty($dataSiswa)) {
        die("NIM tidak boleh kosong.");
    }

    // Menggunakan prepared statement untuk menghindari SQL Injection
    $stmt = $koneksi->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
    $stmt->bind_param("s", $dataSiswa);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah ada data
    if ($result->num_rows > 0) {
        $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';

        foreach ($result as $row) {
            $output .= '
                        <tr>
                            <th width="40%">NIM</th>
                            <td width="60%">' . htmlspecialchars($row['nim']) . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama</th>
                            <td width="60%">' . htmlspecialchars($row['nama']) . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Kelas</th>
                            <td width="60%">' . htmlspecialchars($row['kelas']) . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Jurusan</th>
                            <td width="60%">' . htmlspecialchars($row['jurusan']) . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Semester</th>
                            <td width="60%">' . htmlspecialchars($row['semester']) . '</td>
                        </tr>';
        }
        $output .= '</table></div>';
    } else {
        $output = "Data tidak ditemukan.";
    }

    // Tampilkan $output
    echo $output;
}

