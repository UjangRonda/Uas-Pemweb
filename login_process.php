<?php
include 'koneksi.php';
session_start(); // Session start harus di awal

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitasi input
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $password = trim($_POST['password']);

    // Validasi input
    if (empty($username) || empty($password)) {
        echo "<script>alert('Username dan password tidak boleh kosong!'); window.location.href='login.php';</script>";
        exit();
    }

    // Cek login sebagai admin
    $query_admin = "SELECT * FROM admin WHERE username = ?";
    $stmt_admin = $conn->prepare($query_admin);
    $stmt_admin->bind_param("s", $username);
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();
     
    if ($result_admin->num_rows > 0) {
        $admin = $result_admin->fetch_assoc();
        if ($password === $admin['password']) { // Untuk admin menggunakan plain password sesuai database
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'admin';
            $_SESSION['logged_in'] = true; // Tambahkan flag login
            
            // Debug
            error_log("Admin login successful: " . $username);
            
            header("Location: admin_dashboard.php");
            exit();
        } else {
            echo "<script>alert('Password admin salah!'); window.location.href='login.php';</script>";
            exit();
        }
    }

    // Cek login sebagai user
    // Cek login sebagai user
    $query_user = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt_user = $conn->prepare($query_user);
    $stmt_user->bind_param("s", $username);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();

    if ($result_user->num_rows > 0) {
        $user = $result_user->fetch_assoc();

        // Verifikasi password
        if ($password === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = 'user';
            $_SESSION['logged_in'] = true; 
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Password salah!'); window.location.href='login.php';</script>";
            exit();
        }
    
    } else {
        echo "<script>alert('Username tidak ditemukan!'); window.location.href='login.php';</script>";
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>