<?php 
    session_start();
    include 'koneksi.php';

    $product_id = isset($_GET['product_id']) ? (int)$_GET['product_id'] : 0;
    
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
   
    if (!$product) {
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<title>Transaction</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="icon" href="images/fevicon.png" type="image/gif" />
<link rel="stylesheet" href="css/style-transaction.css">
</head>
<body>
    <div class="container">
        <h2>Transaction Details</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="product-summary">
                    <h3>Product: <?php echo htmlspecialchars($product['name']); ?></h3>
                    <p>Price: $<?php echo htmlspecialchars($product['price']); ?></p>
                    <p>Customer: <?php echo $_SESSION['username']; ?></p>
                </div>
            </div>
            <div class="col-md-6">
                <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Product Image">
            </div>
        </div>
        <form action="transaction_process.php" method="POST">
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <div class="form-group">
                <label for="shipping_address">Shipping Address:</label>
                <textarea name="shipping_address" id="shipping_address" class="form-control" required></textarea>
            </div>
            <div class="button-container">
                <a href="product.php" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
        </form>
    </div>

    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>