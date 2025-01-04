<?php

function setCSPHeader() {
    header("Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self'; img-src 'self'; font-src 'self';");
}

function setAntiClickjackingHeader() {
    header("X-Frame-Options: SAMEORIGIN");
}

// Memanggil atau membutuhkan file function.php
require 'function.php';

// Inisialisasi koneksi
$koneksi = mysqli_connect("db", "user", "password", "mahasiswa");

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Jika tombol register ditekan
if (isset($_POST['register'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $semester = $_POST['semester'];
    $password = $_POST['password'];

    // Validasi password
    if (empty($password)) {
        echo "Password tidak boleh kosong!";
        exit();
    }

    // Menggunakan prepared statement untuk mencegah SQL injection
    $stmt = $koneksi->prepare("INSERT INTO mahasiswa (nim, nama, kelas, jurusan, semester, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nim, $nama, $kelas, $jurusan, $semester, $password);

    // Eksekusi statement
    if ($stmt->execute()) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Menutup statement
    $stmt->close();
}

// Menutup koneksi
$koneksi->close();
?>
