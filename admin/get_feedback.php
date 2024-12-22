<?php
// Koneksi ke database
include '../koneksi.php';  // Pastikan sudah terkoneksi dengan database

// Query untuk mengambil data feedback
$query = "SELECT * FROM feedback ORDER BY id DESC";
$result = mysqli_query($conn, $query);

// Periksa jika ada data
if (mysqli_num_rows($result) > 0) {
    // Loop untuk menampilkan data setiap feedback
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div style='border: 1px solid #ccc; margin-bottom: 10px; padding: 10px; background-color: #f9f9f9;'>";
        echo "<strong>Nama:</strong> " . htmlspecialchars($row['nama']) . "<br>";
        echo "<strong>Email:</strong> " . htmlspecialchars($row['email']) . "<br>";
        echo "<strong>Phone Number:</strong> " . htmlspecialchars($row['phonenumber']) . "<br>";
        echo "<strong>Message:</strong> <br>" . nl2br(htmlspecialchars($row['pesan'])) . "<br>";
        echo "</div>";
    };
} else {
    echo "<p>Belum ada feedback yang diterima.</p>";
}
?>
