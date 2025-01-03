<?php
require_once 'function.php'; // Memuat koneksi database

/** @var mysqli $koneksi */
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM mahasiswa";
$result = $koneksi->query($query);

if ($result === false) {
    die("Pengambilan data gagal: " . $koneksi->error);
}

// Proses data hanya jika ada hasil
if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row; // Tambahkan hasil query ke dalam array
    }

    // Iterasi langsung tanpa memeriksa dengan is_iterable(), karena $data selalu iterable
    foreach ($data as $row) {
        // Validasi nilai setiap kolom sebelum digunakan
        $nama = isset($row['nama']) ? htmlspecialchars((string)$row['nama']) : 'Nama tidak ditemukan';
        echo "Nama: $nama<br>";
    }
} else {
    echo "Tidak ada data.";
}

