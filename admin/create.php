<?php
include '../koneksi.php';

$tipe = $_GET['type'];
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET['type'] == 'users') {
    // Sanitasi input
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $address = mysqli_real_escape_string($conn, trim($_POST['address']));
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Array untuk menyimpan pesan error
    $errors = array();

    // Validasi username
    if(empty($username)) {
        $errors[] = "Username tidak boleh kosong!";
    } elseif(strlen($username) < 4) {
        $errors[] = "Username minimal 4 karakter!";
    }

    // Validasi alamat
    if(empty($address)) {
        $errors[] = "Alamat tidak boleh kosong!";
    } elseif(strlen($address) < 10) {
        $errors[] = "Alamat minimal 10 karakter!";
    }

    // Validasi password
    if(empty($password)) {
        $errors[] = "Password tidak boleh kosong!";
    } elseif(strlen($password) < 8) {
        $errors[] = "Password minimal 8 karakter!";
    } elseif(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password)) {
        $errors[] = "Password harus mengandung huruf besar, huruf kecil, dan angka!";
    }

    // Validasi konfirmasi password
    if ($password !== $confirm_password) {
        $errors[] = "Password tidak cocok!";
    }

    // Cek username duplikat
    $check_username = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $check_username);
    if (mysqli_num_rows($result) > 0) {
        $errors[] = "Username sudah digunakan!";
    }

    // Jika ada error, kembalikan ke halaman register
    if(!empty($errors)) {
        $error_message = implode('\n', $errors);
        echo "<script>alert('$error_message'); window.location.href='users.php';</script>";
        exit();
    }

    // Hash password sebelum disimpan ke database
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Query insert data
    $query = "INSERT INTO users (username, address, password) 
              VALUES ('$username', '$address', '$password')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Create User berhasil!'); window.location.href='users.php';</script>";
        exit();
    } else {
        echo "<script>alert('Create User gagal: " . mysqli_error($conn) . "'); window.location.href='users.php';</script>";
    }
}else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET['type'] == 'products'){
    $name = $_POST['name'];
    $description = $_POST['desc'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    
    // Array untuk menyimpan pesan error
    $errors = array();

    // Validasi username
    if(empty($name)) {
        $errors[] = "Product Name tidak boleh kosong!";
    }

    // Validasi alamat
    if(empty($description)) {
        $errors[] = "Deskripsi tidak boleh kosong!";
    } elseif(strlen($description) < 10) {
        $errors[] = "Deskripsi minimal 10 karakter!";
    }

    // Validasi password
    if(empty($price)) {
        $errors[] = "Price tidak boleh kosong!";
    }

    // Cek username duplikat
    $check_username = "SELECT * FROM products WHERE name = '$name'";
    $result = mysqli_query($conn, $check_username);
    if (mysqli_num_rows($result) > 0) {
        $errors[] = "Produk sudah ada!";
    }

    // Jika ada error, kembalikan ke halaman register
    if(!empty($errors)) {
        $error_message = implode('\n', $errors);
        echo "<script>alert('$error_message'); window.location.href='products.php';</script>";
        exit();
    }

    // Hash password sebelum disimpan ke database
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Query insert data
    $query = "INSERT INTO products (name, description, price, image) 
              VALUES ('$name', '$description', '$price', '$image')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Create Product berhasil!'); window.location.href='products.php';</script>";
        exit();
    } else {
        echo "<script>alert('Create Product gagal: " . mysqli_error($conn) . "'); window.location.href='products.php';</script>";
    }
}else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET['type' == 'transaction']){

}
else {
    header("Location: register.php");
    exit();
}
?>