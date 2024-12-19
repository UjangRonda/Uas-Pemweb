<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if ($password !== $confirm_password) {
        echo "<script>alert('Password tidak cocok!'); window.location.href='register.php';</script>";
        exit();
    }
    
    $check_username = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $check_username);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username sudah digunakan!'); window.location.href='register.php';</script>";
        exit();
    }
    
    
    // Hash password sebelum disimpan ke database
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $query = "INSERT INTO users (username, address, password) 
              VALUES ('$username', '$address', '$password')";
    
    if (mysqli_query($conn, $query)) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'user';
        echo "<script>alert('Registrasi berhasil!'); window.location.href='index.php';</script>";
        exit();
    } else {
        echo "<script>alert('Registrasi gagal: " . mysqli_error($conn) . "'); window.location.href='register.php';</script>";
    }
} else {
    header("Location: register.php");
    exit();
}
?>