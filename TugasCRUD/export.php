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

if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Validasi apakah $data iterable sebelum foreach
    if (is_iterable($data)) {
        foreach ($data as $row) {
            $nama = isset($row['nama']) ? $row['nama'] : 'Nama tidak ditemukan';
            echo "Nama: $nama<br>";
        }
    } else {
        die("Data tidak valid untuk iterasi.");
    }
} else {
    echo "Tidak ada data.";
}

