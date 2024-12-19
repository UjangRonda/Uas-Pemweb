<?php
session_start(); 
require "koneksi.php";

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id']; 
} else {
    echo "Anda harus login terlebih dahulu.";
    exit();
}

$product_id = $_POST['product_id'];
$shipping_address = $_POST['shipping_address'];
$transaction_date = date("Y-m-d");

$query = "INSERT INTO transactions (user_id, product_id, shipping_address, transaction_date, status) 
          VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$status = 1; 
$stmt->bind_param("iissi", $user_id, $product_id, $shipping_address, $transaction_date, $status);

if ($stmt->execute()) {
    echo "Transaksi berhasil.";
    header("Location: transaction_success.php");
    exit();
} else {
    echo "Gagal menyimpan transaksi.";
}

?>