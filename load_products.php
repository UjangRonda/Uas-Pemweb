<?php
include 'koneksi.php';

// Cek apakah parameter 'all' ada dan bernilai true
if (isset($_GET['all']) && $_GET['all'] == 'true') {
    $query = "SELECT * FROM products";
} else {
    // Ambil nomor halaman dari URL
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $limit = 2; // Produk per halaman
    $offset = ($page - 1) * $limit;

    // Query untuk mengambil produk dengan limit dan offset
    $query = "SELECT * FROM products LIMIT $limit OFFSET $offset";
}

$result = $conn->query($query);

// Mengecek apakah ada produk yang ditemukan
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Menampilkan produk
        echo '<div class="col-md-6">
                <div class="image_2">
                    <img src="images/' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['name']) . '">
                </div>
                <div class="price_text">Price $ <span style="color: #3a3a38;">' . htmlspecialchars($row['price']) . '</span></div>
                <h1 class="game_text">' . htmlspecialchars($row['name']) . '</h1>
                <p class="long_text">' . htmlspecialchars($row['description']) . '</p>
              </div>';
    }
} else {
    // Jika tidak ada produk lagi
    echo "No more products to load.";
}
?>
