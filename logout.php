<?php
// Mulai sesi
session_start();

// Hancurkan semua data sesi
session_unset();
session_destroy();

// Redirect ke halaman index.php setelah logout
header("Location: index.php");
exit();
?>
