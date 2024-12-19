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

    $query_user = "SELECT id FROM users WHERE username = ?";
    $statement = $conn->prepare($query_user);
    $statement->bind_param("i", $_SESSION['username']);
    $statement->execute();

    $user_id = $statement->get_result();

    if ($user_id->num_rows > 0) {
        $row = $user_id->fetch_assoc();
        $user_id = $row['id'];
    } else {
        echo "User tidak ditemukan.";
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
<!-- site metas -->
<title>Transaction</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">	
<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="css/styles.css">
<!-- Responsive-->
<link rel="stylesheet" href="css/responsive.css">
<!-- fevicon -->
<link rel="icon" href="images/fevicon.png" type="image/gif" />
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
<!-- Tweaks for older IEs-->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<!-- owl stylesheets --> 
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>
<body>
    <div class="container">
        <h2>Transaction Details</h2>
        <div class="product-summary">
            <h3>Product: <?php echo htmlspecialchars($product['name']); ?></h3>
            <p>Price: $<?php echo htmlspecialchars($product['price']); ?></p>
            <p>Customer: <?php echo $_SESSION['username']; ?></p>
        </div>

        <form action="transaction_process.php" method="POST">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <div class="form-group">
                <label>Shipping Address</label>
                <textarea name="shipping_address" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Confirm Purchase</button>
        </form>
    </div>

    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- javascript --> 
    <script src="js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>
</html>