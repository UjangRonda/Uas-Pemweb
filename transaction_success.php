<?php
session_start();
include 'koneksi.php';

$transaction_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Ambil detail transaksi
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

// Fungsi untuk menampilkan status
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
<html>
<head>
    <title>Transaction Success</title>
</head>
<body>
    <div class="container">
        <div class="success-message">
            <h2>Transaction Successful!</h2>
            <p>Thank you for your purchase!</p>
            <div class="transaction-details">
                <h3>Transaction Details:</h3>
                <p>Transaction ID: #<?php echo $transaction_id; ?></p>
                <p>Customer: <?php echo htmlspecialchars($transaction['username']); ?></p>
                <p>Product: <?php echo htmlspecialchars($transaction['product_name']); ?></p>
                <p>Amount: $<?php echo htmlspecialchars($transaction['price']); ?></p>
                <p>Shipping Address: <?php echo htmlspecialchars($transaction['shipping_address']); ?></p>
                <p>Status: <?php echo getStatus($transaction['status']); ?></p>
                <p>Date: <?php echo date('F j, Y', strtotime($transaction['transaction_date'])); ?></p>
            </div>
            <a href="index.php" class="btn btn-primary">Back to Products</a>
        </div>
    </div>
</body>
</html>