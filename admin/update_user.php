<?php
include('../koneksi.php');

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
?>
