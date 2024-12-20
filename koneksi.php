<?php
// Informasi koneksi
$host = "localhost";  // Nama host
$user = "root";       // Username database
$password = "";       // Password database
$dbname = "sistem_manajemen"; // Nama database

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
