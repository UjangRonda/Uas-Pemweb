<?php
include '../koneksi.php';

$tipe = $_GET['type'];
if (isset($_GET['id'])){
    $id = $_GET['id'];
    if ($tipe == 'transactions'){
        $deleteQuery = "DELETE FROM $tipe WHERE transaction_id = $id";
    }else{
        $deleteQuery = "DELETE FROM $tipe WHERE id = $id";
    }

    if (mysqli_query($conn, $deleteQuery)) {
        if ($tipe == 'users') {
            echo "<script>alert('User berhasil dihapus!'); window.location.href='users.php';</script>";    
        }else if ($tipe == 'products'){
            echo "<script>alert('Produk berhasil dihapus!'); window.location.href='users.php';</script>";
        }else if ($tipe == 'transactions'){
            echo "<script>alert('Data Transaksi berhasil dihapus!'); window.location.href='users.php';</script>";
        }
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='users.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data: " . mysqli_error($conn) . "'); window.location.href='users.php';</script>";
    }
}else{
        echo "<script>alert('Gagal menghapus data: " . mysqli_error($conn) . "'); window.location.href='admin_dashboard.php';</script>";
    }
?>