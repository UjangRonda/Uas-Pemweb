<?php
require('fpdf/fpdf.php');
require 'koneksi.php';

// Ambil ID transaksi dari URL
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
    die("Transaction not found");
}

// Membuat instance FPDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Menambahkan header
$pdf->Cell(0, 10, 'Transaction Details', 0, 1, 'C');
$pdf->Ln(10);

// Menambahkan informasi transaksi
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 10, 'Transaction ID: ' . $transaction['transaction_id']);
$pdf->Ln();
$pdf->Cell(40, 10, 'Customer: ' . $transaction['username']);
$pdf->Ln();
$pdf->Cell(40, 10, 'Product: ' . $transaction['product_name']);
$pdf->Ln();
$pdf->Cell(40, 10, 'Amount: $' . $transaction['price']);
$pdf->Ln();
$pdf->Cell(40, 10, 'Shipping Address: ' . $transaction['shipping_address']);
$pdf->Ln();
$pdf->Cell(40, 10, 'Status: ' . getStatus($transaction['status']));
$pdf->Ln();
$pdf->Cell(40, 10, 'Date: ' . date('F j, Y', strtotime($transaction['transaction_date'])));

// Output PDF dengan nama file berdasarkan username
$pdf->Output('D', 'Transaction_'.$transaction['username'].'.pdf');
?>

