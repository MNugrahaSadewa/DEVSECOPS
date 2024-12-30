<?php
session_start();
<<<<<<< HEAD

// Jika sudah login, redirect ke index.php
=======
// Jika bisa login maka ke index.php
>>>>>>> a67532a4b2ce44771176fd4e02eee5a5d8b71586
if (isset($_SESSION['login'])) {
    header('location:index.php');
    exit;
}

<<<<<<< HEAD
// Memanggil file function.php
require 'function.php';

$error = null; // Variabel untuk menampung pesan error

// Jika tombol login diklik
if (isset($_POST['login'])) {
    // Ambil data username dan password dari input pengguna
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password']; // Password plaintext dari input

    // Query untuk mencari admin berdasarkan username
    $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username'");
    $admin = mysqli_fetch_assoc($result);

    // Jika username ditemukan
    if ($admin) {
        // Periksa apakah password di database menggunakan password_hash atau md5
        if (password_verify($password, $admin['password']) || $admin['password'] === md5($password)) {
            // Simpan data user ke sesi
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $admin['id']; // Simpan ID admin untuk log

            // Ambil username dari data admin
            $username = $admin['username'];

            // Pencatatan log aktivitas login
            saveLog( " logged in");


            // Redirect ke halaman index.php
            header('location:index.php');
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
=======
// Memanggil atau membutuhkan file function.php
require 'function.php';

// jika tombol yang bernama login diklik
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    // password menggunakan md5

    // mengambil data
    $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username'");

    $cek = mysqli_num_rows($result);

    if ($cek > 0) {
        $_SESSION['login'] = true;

        header('location:index.php');
        exit;
    }
 
    $error = true;  
}

>>>>>>> a67532a4b2ce44771176fd4e02eee5a5d8b71586
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
<<<<<<< HEAD
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- CSS Kustom -->
=======
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
>>>>>>> a67532a4b2ce44771176fd4e02eee5a5d8b71586
    <link rel="stylesheet" href="css/login.css">

    <title>Login</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">FTE Teknik Komputer</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<<<<<<< HEAD
    <!-- Tutup Navbar -->
=======
    <!-- Close Navbar -->
>>>>>>> a67532a4b2ce44771176fd4e02eee5a5d8b71586

    <div class="container">
        <div class="row my-5">
            <div class="col-md-6 text-center login" style="background-image: url('img/bg/TULT.jpeg');">
                <h4 class="fw-bold">Login | Admin</h4>
<<<<<<< HEAD
                <!-- Pesan Error Jika Login Gagal -->
                <?php if ($error) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= htmlspecialchars($error); ?>
                    </div>
=======
                <!-- Ini Error jika tidak bisa login -->
                <?php if (isset($error)) : ?>
                    <?php echo '<script>alert("Username atau Password Salah!");</script>'; ?>
>>>>>>> a67532a4b2ce44771176fd4e02eee5a5d8b71586
                <?php endif; ?>
                <form action="" method="post">
                    <div class="form-group user">
                        <input type="text" class="form-control w-50" placeholder="Masukkan Username" name="username" autocomplete="off" required>
                    </div>
                    <div class="form-group my-5">
                        <input type="password" class="form-control w-50" placeholder="Masukkan Password" name="password" autocomplete="off" required>
                    </div>
                    <button class="btn btn-primary text-uppercase" type="submit" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>

<<<<<<< HEAD
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
=======

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>
>>>>>>> a67532a4b2ce44771176fd4e02eee5a5d8b71586
