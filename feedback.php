<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone = $_POST['phone'];
    $message= $_POST['message'];
    
    $errors = array();

    if(empty($name)) {
        $errors[] = "name tidak boleh kosong!";
    } 

    if(empty($email)) {
        $errors[] = "email tidak boleh kosong!";
    } 

    if(empty($phone)) {
        $errors[] = "phone number tidak boleh kosong!";
    } 

    if (!empty($errors)) {
        echo "<script>alert('" . implode("\\n", $errors) . "'); window.location.href='contact.php';</script>";
        exit();
    }

    $query = "INSERT INTO feedback (nama, email, phonenumber, pesan) 
              VALUES ('$name', '$email', '$phone', '$message')";
    
    if (mysqli_query($conn, $query)) {
        session_start();
        echo "<script>alert('pesan berhasil dikirimkan'); window.location.href='index.php';</script>";
        exit();
    } else {
        echo "<script>alert('pesan gagal dikirimkan: " . mysqli_error($conn) . "'); window.location.href='contact.php';</script>";
    }
} else {
    header("Location: contact.php");
    exit();
}
?>