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

    $_SESSION['user_id'] = $user['id']; 
    $_SESSION['username'] = $user['username']; 

        header("Location: index.php");
        exit();
    } else {
        echo " <script> alert('Username atau password salah'); </script>";
    }


header("Location: index.php");
exit();
echo "<script>alert('Login gagal! Username atau password salah.'); window.location.href='login.php';</script>";
?>