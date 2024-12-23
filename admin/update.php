<?php
include('../koneksi.php');

$tipe = $_GET['type'];
if ($tipe == 'users'){
    if (isset($_POST['id']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['address'])) {
        $id = $_POST['id'];
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
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
    
        // Cek username duplikat
        $check_username = "SELECT * FROM users WHERE username = '$username' AND id != '$id'";
        $result = mysqli_query($conn, $check_username);
        if (mysqli_num_rows($result) > 0) {
            $errors[] = "Username sudah digunakan pengguna lain!";
        }
    
        // Jika ada error, kembalikan ke halaman register
        if(!empty($errors)) {
            $error_message = implode('\n', $errors);
            echo "<script>alert('$error_message'); window.location.href='edit.php?type=users&id={$id}';</script>";
            exit();
        }
    
        // Hash password sebelum disimpan ke database
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Query insert data
        // Query untuk update data
        $query = "UPDATE users SET username = '$username', password = '$password', address = '$address' WHERE id = $id";
    
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Data berhasil diperbarui!'); window.location.href='users.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Data tidak lengkap!";
    }
}else if ($tipe == 'products'){
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['image']) ) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $errors = array();
    
        // Validasi username
        if(empty($name)) {
        $errors[] = "Product Name tidak boleh kosong!";
    }

    // Validasi alamat
    if(empty($description)) {
        $errors[] = "Deskripsi tidak boleh kosong!";
    } elseif(strlen($description) < 5) {
        $errors[] = "Deskripsi minimal 5 karakter!";
    }

    // Validasi password
    if(empty($price)) {
        $errors[] = "Price tidak boleh kosong!";
    }

    // Cek username duplikat
    $check_username = "SELECT * FROM products WHERE name = '$name' AND id != '$id'";
        $result = mysqli_query($conn, $check_username);
        if (mysqli_num_rows($result) > 0) {
            $errors[] = "Produk sudah ada!";
        }

    // Jika ada error, kembalikan ke halaman register
    if(!empty($errors)) {
        $error_message = implode('\n', $errors);
        echo "<script>alert('$error_message');  window.location.href='edit_products.php?type=products&id={$id}';</script>";
        exit();
    }

        // Hash password sebelum disimpan ke database
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Query insert data
        // Query untuk update data
        $query = "UPDATE products SET name = '$name', description = '$description', price = '$price', image = '$image' WHERE id = $id";
    
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Data berhasil diperbarui!'); window.location.href='products.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Data tidak lengkap!";
    }
}else if ($tipe == 'transactions'){
    if (isset($_POST['transaction_id']) && isset($_POST['shipping_address']) && isset($_POST['status'])) {
        $transaction_id = $_POST['transaction_id'];
        $shipping_address = $_POST['shipping_address'];
        $status = $_POST['status'];
        $errors = array();
    
        // Validasi username
        if(empty($shipping_address)) {
        $errors[] = "Address tidak boleh kosong!";
    }
    // Jika ada error, kembalikan ke halaman register
    if(!empty($errors)) {
        $error_message = implode('\n', $errors);
        echo "<script>alert('$error_message');  window.location.href='edit_products.php?type=products&id={$id}';</script>";
        exit();
    }

        $query = "UPDATE transactions SET shipping_address = '$shipping_address',  status = '$status' WHERE transaction_id = $transaction_id";
    
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Data berhasil diperbarui!'); window.location.href='transactions.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Data tidak lengkap!";
    }
}
?>
