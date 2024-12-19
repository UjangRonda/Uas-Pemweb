<?php
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];

// Check admin login
$query_admin = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$result_admin = mysqli_query($conn, $query_admin);
if (mysqli_num_rows($result_admin) > 0) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['role'] = 'admin';
    $_SESSION['logged_in'] = true;
    header("Location: admin_dashboard.php");
    exit();
}

// Check user login
$query_user = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result_user = mysqli_query($conn, $query_user);
if (mysqli_num_rows($result_user) > 0) {
    $user = mysqli_fetch_assoc($result_user); // Fetch user data
    session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['id'] = $user['id']; // Now we can access user's id
    $_SESSION['role'] = 'user';
    header("Location: index.php");
    exit();
}

echo "<script>alert('Login gagal! Username atau password salah.'); window.location.href='login.php';</script>";
?>