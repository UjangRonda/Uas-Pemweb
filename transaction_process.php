<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = (int)$_POST['product_id'];
    $user_id = (int)$_POST['user_id'];
    $shipping_address = $_POST['shipping_address'];
    $transaction_date = date('Y-m-d');
    $status = 1;

    try {
        $conn->begin_transaction();

        $query = "INSERT INTO transactions (user_id, product_id, shipping_address, transaction_date, status) 
                 VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iissi", $user_id, $product_id, $shipping_address, $transaction_date, $status);
        
        if ($stmt->execute()) {
            $transaction_id = $conn->insert_id;
            
            $conn->commit();
            
            header("Location: transaction_success.php?id=" . $transaction_id);
            exit();
        } else {
            throw new Exception("Failed to process transaction");
        }
    } catch (Exception $e) {
        $conn->rollback();
        $_SESSION['error'] = "Transaction failed: " . $e->getMessage();
        header("Location: transaction.php?product_id=" . $product_id);
        exit();
    }
}
?>