<?php
<<<<<<< HEAD
error_reporting(0);
session_start();
require 'function.php'; // Pastikan file ini memuat fungsi saveLog

// Periksa apakah user_id ada dalam sesi
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

     // Log aktivitas logout
     if (!saveLog("Admin logged out")) {
        // Jika saveLog gagal, catat error
        error_log("Error: Gagal mencatat log untuk user ID $user_id saat logout.");
    }
} else {
    // Jika sesi user_id tidak ditemukan, catat log error
    error_log("Error: User ID tidak ditemukan dalam sesi saat logout.");
}

// Menghapus semua data sesi
$_SESSION = [];
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(45deg, #ff416c, #ff4b2b);
            color: white;
            font-family: Arial, sans-serif;
        }

        .logout-container {
            text-align: center;
            animation: fadeOut 3s ease-in-out forwards;
        }

        .logout-container h1 {
            font-size: 3rem;
        }

        .spinner {
            width: 80px;
            height: 80px;
            border: 10px solid rgba(255, 255, 255, 0.3);
            border-top: 10px solid white;
            border-radius: 50%;
            margin: 20px auto;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <div class="logout-container">
        <h1>Logging Out...</h1>
        <div class="spinner"></div>
        <p>Redirecting to login page...</p>
    </div>

    <script>
        // Redirect to login page after animation
        setTimeout(function () {
            window.location.href = "login.php";
        }, 3000); // Redirect after 3 seconds
    </script>
</body>

</html>
=======
session_start();
$_SESSION = [];
session_unset();
session_destroy();
// Session dihapus dan logout

header('location: index.php');
    // kembali ke index.php
>>>>>>> a67532a4b2ce44771176fd4e02eee5a5d8b71586
