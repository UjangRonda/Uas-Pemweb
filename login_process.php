<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query_admin = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$result_admin = mysqli_query($conn, $query_admin);

if (mysqli_num_rows($result_admin) > 0) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['role'] = 'admin';
    header("Location: admin_dashboard.php");
    exit();
}

$query_user = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result_user = mysqli_query($conn, $query_user);

if (mysqli_num_rows($result_user) > 0) {
    session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $username;
    $_SESSION['role'] = 'user';
    header("Location: index.php");
    exit();
}

echo "<script>alert('Login gagal! Username atau password salah.'); window.location.href='login.php';</script>";
?>
