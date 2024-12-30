<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "db_mahasiswa");

<<<<<<< HEAD
// Fungsi untuk mencatat log aktivitas
function saveLog($action)
{
    global $koneksi;

    // Ambil user ID dari sesi
    session_start(); // Pastikan sesi dimulai
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        $user_id = null; // User ID default jika sesi tidak tersedia
    }

    // Sanitasi input
    $action = htmlspecialchars($action, ENT_QUOTES);

    // Periksa apakah user_id valid
    if ($user_id) {
        $result = mysqli_query($koneksi, "SELECT id, username FROM admin WHERE id = '$user_id'");
        $user = mysqli_fetch_assoc($result);
        if (!$user) {
            die("Error: User ID tidak valid. Tidak dapat mencatat log.");
        }
        $username = $user['username'];

        // Atur pesan log berdasarkan aksi
        if ($action === 'logged in') {
            $action_message = "Admin $username logged in"; // Contoh: "Admin 25 logged in"
        } elseif ($action === 'logged out') {
            $action_message = "Admin $username logged out"; // Contoh: "Admin 25 logged out"
        } else {
            $action_message = "Admin $username melakukan aksi $action"; // Jika aksi lain
        }
    } 
    else {
        die("Error: Tidak dapat mencatat log karena sesi user ID tidak tersedia.");
    }

    // Simpan log ke database
    $sql = "INSERT INTO logs (user_id, action) VALUES ('$user_id', '$action_message')";
    if (!mysqli_query($koneksi, $sql)) {
        die("Error: " . mysqli_error($koneksi)); // Debug jika terjadi error
    }
}

// Fungsi untuk menjalankan query dalam bentuk array
function query($query)
{
=======
// membuat fungsi query dalam bentuk array
function query($query)
{
    // Koneksi database
>>>>>>> a67532a4b2ce44771176fd4e02eee5a5d8b71586
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

<<<<<<< HEAD
    $rows = [];
=======
    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
>>>>>>> a67532a4b2ce44771176fd4e02eee5a5d8b71586
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

<<<<<<< HEAD
// Fungsi tambah
=======
// Membuat fungsi tambah
>>>>>>> a67532a4b2ce44771176fd4e02eee5a5d8b71586
function tambah($data)
{
    global $koneksi;

    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $kelas = htmlspecialchars($data['kelas']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $semester = htmlspecialchars($data['semester']);

    $sql = "INSERT INTO mahasiswa(nim, nama, kelas, jurusan, semester) VALUES ('$nim','$nama','$kelas','$jurusan','$semester')";

    mysqli_query($koneksi, $sql);

<<<<<<< HEAD
    // Log aktivitas
    if (isset($_SESSION['user_id'])) {
        saveLog("menambahkan data mahasiswa dengan NIM $nim");
    }

    return mysqli_affected_rows($koneksi);
}

// Fungsi hapus
=======
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
>>>>>>> a67532a4b2ce44771176fd4e02eee5a5d8b71586
function hapus($nim)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim = $nim");
<<<<<<< HEAD

    // Log aktivitas
    if (isset($_SESSION['user_id'])) {
        saveLog("menghapus data mahasiswa dengan NIM $nim");
    }

    return mysqli_affected_rows($koneksi);
}

// Fungsi ubah
=======
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
>>>>>>> a67532a4b2ce44771176fd4e02eee5a5d8b71586
function ubah($data)
{
    global $koneksi;

    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $kelas = htmlspecialchars($data['kelas']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $semester = htmlspecialchars($data['semester']);

    $sql = "UPDATE mahasiswa SET nama = '$nama', kelas = '$kelas', jurusan = '$jurusan', semester = '$semester' WHERE nim = $nim";

    mysqli_query($koneksi, $sql);

<<<<<<< HEAD
    // Log aktivitas
    if (isset($_SESSION['user_id'])) {
        saveLog("mengubah data mahasiswa dengan NIM  $nim");
    }

=======
>>>>>>> a67532a4b2ce44771176fd4e02eee5a5d8b71586
    return mysqli_affected_rows($koneksi);
}

