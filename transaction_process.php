<?php
session_start(); 
require "koneksi.php";

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id']; 
} else {
    echo "<script> alert ('Anda harus login terlebih dahulu') </script>";
    exit();
}

$product_id = $_POST['product_id'];
$shipping_address = $_POST['shipping_address'];
$transaction_date = date("Y-m-d");
$status = $_POST['pending'];

$query = "INSERT INTO transactions (user_id, product_id, shipping_address, transaction_date, status) 
          VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$status = 1; 
$stmt->bind_param("iissi", $user_id, $product_id, $shipping_address, $transaction_date, $status);

if ($stmt->execute()) {
    $transaction_id = $stmt->insert_id;
    header("Location: transaction_success.php?id=" . $transaction_id);
    exit();
} else {
    echo "<script> alert ('Gagal menyimpan transaksi') </script>";
}

?>