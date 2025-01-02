<?php
session_start();
require 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv_file'])) {
    $file = $_FILES['csv_file']['tmp_name'];

    if (($handle = fopen($file, 'r')) !== false) {
        fgetcsv($handle); // Lewati header CSV
        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
            $nim = htmlspecialchars($data[0]);
            $nama = htmlspecialchars($data[1]);
            $kelas = htmlspecialchars($data[2]);
            $jurusan = htmlspecialchars($data[3]);
            $semester = htmlspecialchars($data[4]);

            $query = "INSERT INTO mahasiswa (nim, nama, kelas, jurusan, semester) 
                      VALUES ('$nim', '$nama', '$kelas', '$jurusan', '$semester')";
            mysqli_query($koneksi, $query);

            // Log aktivitas
            $user_id = $_SESSION['user_id'];
            saveLog( "Admin menambahkan data mahasiswa: NIM $nim");
        }
        fclose($handle);

        echo "<script>alert('Data berhasil diunggah!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal membaca file CSV!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .upload-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 30px;
            width: 100%;
            max-width: 500px;
        }
        .upload-container h2 {
            font-weight: bold;
            color: #343a40;
            margin-bottom: 20px;
        }
        .btn-upload {
            background-color: #0d6efd;
            color: #fff;
            border: none;
        }
        .btn-upload:hover {
            background-color: #084298;
        }
    </style>
</head>
<body>
    <div class="upload-container">
        <h2 class="text-center">Unggah Data Mahasiswa</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="csvFile" class="form-label">Pilih File CSV</label>
                <input type="file" name="csv_file" id="csvFile" class="form-control" accept=".csv" required>
            </div>
            <button type="submit" class="btn btn-upload w-100 mb-2">Unggah</button>
        </form>
        <a href="index.php" class="btn btn-secondary w-100">Kembali</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
