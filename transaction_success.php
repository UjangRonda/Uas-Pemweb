<?php
session_start();
require 'koneksi.php';

$transaction_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$query = "SELECT t.*, p.name as product_name, p.price, u.username 
          FROM transactions t 
          JOIN products p ON t.product_id = p.id 
          JOIN users u ON t.user_id = u.id
          WHERE t.transaction_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $transaction_id);
$stmt->execute();
$result = $stmt->get_result();
$transaction = $result->fetch_assoc();

if (!$transaction) {
    header("Location: index.php");
    exit();
}

function getStatus($status) {
    switch($status) {
        case 1:
            return "Pending";
        case 2:
            return "Processing";
        case 3:
            return "Completed";
        default:
            return "Unknown";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Success</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .success-message {
            text-align: center;
            margin-bottom: 30px;
        }
        .success-message h2 {
            color: #3371e2;
        }
        .transaction-details {
            margin-top: 20px;
            border-top: 2px solid #28a745;
            padding-top: 20px;
        }
        .transaction-details p {
            font-size: 16px;
            line-height: 1.5;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-message">
            <h2>Transaction Successful!</h2>
            <p>Thank you for your purchase!</p>
        </div>
        <div class="transaction-details">
            <h3>Transaction Details:</h3>
            <p>Transaction ID: #<?php echo htmlspecialchars($transaction_id); ?></p>
            <p>Customer: <?php echo htmlspecialchars($transaction['username']); ?></p>
            <p>Product: <?php echo htmlspecialchars($transaction['product_name']); ?></p>
            <p>Amount: $<?php echo htmlspecialchars($transaction['price']); ?></p>
            <p>Shipping Address: <?php echo htmlspecialchars($transaction['shipping_address']); ?></p>
            <p>Status: <?php echo getStatus($transaction['status']); ?></p>
            <p>Date: <?php echo date('F j, Y', strtotime($transaction['transaction_date'])); ?></p>
        </div>
        <div class="text-center">
            <a href="index.php" class="btn btn-primary">Back to Products</a>
        </div>
    </div>
</body>
</html>