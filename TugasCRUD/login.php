<?php
session_start();

require_once 'function.php'; // Memuat koneksi database

/** @var mysqli $koneksi */
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        die("Username dan Password harus diisi.");
    }

    $stmt = $koneksi->prepare("SELECT * FROM admin WHERE username = ?");
    if ($stmt === false) {
        die("Query gagal dipersiapkan: " . $koneksi->error);
    }

    $stmt->bind_param("s", $username);
    if (!$stmt->execute()) {
        die("Eksekusi query gagal: " . $stmt->error);
    }

    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['login'] = true;
            header('Location: index.php');
            exit;
        } else {
            die("Password salah.");
        }
    } else {
        die("Username tidak ditemukan.");
    }
}

