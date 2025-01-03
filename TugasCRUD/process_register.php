<?php

require 'function.php'; // Pastikan jalur file sudah benar

// Validasi koneksi database
if (!isset($koneksi)) {
    die("Koneksi database belum tersedia.");
}

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Mengambil data dari form
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

// Validasi input
if (empty($username) || empty($password)) {
    // Redirect ke halaman register jika data tidak lengkap
    header("location: register.php?error=empty_fields");
    exit;
}

// Hash password menggunakan password_hash()
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Menggunakan prepared statement untuk mencegah SQL Injection
$stmt = $koneksi->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hashedPassword);

if ($stmt->execute()) {
    // Redirect ke halaman index jika berhasil
    header("location: index.php?success=registered");
    exit;
} else {
    // Redirect ke halaman register jika terjadi kesalahan
    header("location: register.php?error=insert_failed");
    exit;
}

