<?php
require "koneksi.php";
session_start(); 
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT id, username FROM users WHERE username = ? AND password = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $_SESSION['logged_in'] = true;
    $_SESSION['user_id'] = $user['id']; 
    $_SESSION['username'] = $user['username']; 

    header("Location: index.php");
    exit();
} else {
    echo "Username atau password salah.";
}


header("Location: index.php");
exit();
echo "<script>alert('Login gagal! Username atau password salah.'); window.location.href='login.php';</script>";
?>