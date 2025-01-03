<?php
require_once 'function.php'; // Memuat koneksi database

/** @var mysqli $koneksi */
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($username === '' || $password === '') {
    die("Username dan Password harus diisi.");
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $koneksi->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");
if ($stmt === false) {
    die("Query gagal dipersiapkan: " . $koneksi->error);
}

$stmt->bind_param("ss", $username, $hashedPassword);
if (!$stmt->execute()) {
    die("Eksekusi query gagal: " . $stmt->error);
}

echo "Registrasi berhasil.";


