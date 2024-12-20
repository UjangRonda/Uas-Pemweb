<?php
// Konfigurasi database
$config = [
    'host' => '127.0.0.1',
    'username' => 'root',
    'password' => '',
    'dbname' => 'sistem_manajemen',
    'charset' => 'utf8mb4'
];

try {
    // Membuat koneksi
    $conn = new mysqli(
        $config['host'], 
        $config['username'], 
        $config['password']
    );

    // Cek koneksi
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Membuat database jika belum ada
    $sql = "CREATE DATABASE IF NOT EXISTS `{$config['dbname']}` 
            CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
    
    if (!$conn->query($sql)) {
        throw new Exception("Failed to create database: " . $conn->error);
    }
    echo "Database berhasil dibuat atau sudah ada.\n";

    // Memilih database
    if (!$conn->select_db($config['dbname'])) {
        throw new Exception("Failed to select database: " . $conn->error);
    }

    // Set charset yang sesuai
    $conn->set_charset($config['charset']);

    // Skrip SQL
    $sql_script = "
    SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
    START TRANSACTION;
    SET time_zone = '+00:00';

    -- Struktur tabel admin dengan index username
    CREATE TABLE IF NOT EXISTS `admin` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `username` varchar(255) NOT NULL,
        `password` varchar(255) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `username` (`username`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

    -- Menambahkan admin dengan password plain text
    INSERT INTO `admin` (`username`, `password`) VALUES
    ('ardian', 'Ardian11')
    ON DUPLICATE KEY UPDATE password=VALUES(password);

    -- Struktur tabel products
    CREATE TABLE IF NOT EXISTS `products` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(255) NOT NULL,
        `description` text NOT NULL,
        `price` decimal(10,2) NOT NULL,
        `image` varchar(255) NOT NULL,
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

    -- Tambahkan tabel lainnya sesuai kebutuhan...
    ";

    // Eksekusi skrip SQL
    if ($conn->multi_query($sql_script)) {
        do {
            if ($result = $conn->store_result()) {
                $result->free();
            }
        } while ($conn->more_results() && $conn->next_result());
        echo "Tabel database berhasil dibuat.\n";
    } else {
        throw new Exception("Error creating tables: " . $conn->error);
    }

} catch (Exception $e) {
    die("Error: " . $e->getMessage());
} finally {
    if (isset($conn) && $conn instanceof mysqli) {
        $conn->close();
    }
}
?>
