<?php
include '../koneksi.php';

$folderPath = '../datafile/';
$fileName = 'produk.txt';
$filePath = $folderPath . $fileName;

if (file_exists($filePath)) {
    $fileContent = file_get_contents($filePath);
    $lines = explode("\n", $fileContent);

    foreach ($lines as $line) {
        $data = explode(",", $line);
        
        if (count($data) == 4) {
            $name = trim($data[0]);
            $description = trim($data[1]);
            $price = trim($data[2]);
            $image = trim($data[3]);

            $name = mysqli_real_escape_string($conn, $name);
            $description = mysqli_real_escape_string($conn, $description);
            $price = mysqli_real_escape_string($conn, $price);
            $image = mysqli_real_escape_string($conn, $image);

            $query = "INSERT INTO products (name, description, price, image) 
                      VALUES ('$name', '$description', '$price', '$image')";

            if (!mysqli_query($conn, $query)) {
                echo "<script>alert('Error inserting product: " . mysqli_error($conn) . "');</script>";
            }
        }
    }

    echo "<script>alert('Data berhasil dimasukkan!'); window.location.href='products.php';</script>";
} else {
    echo "<script>alert('File tidak ditemukan!'); window.location.href='products.php';</script>";
}
?>
