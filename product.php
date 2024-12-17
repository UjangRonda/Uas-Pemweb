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
<title>Product</title>
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
	<!-- header section start -->
	<div class="header_section">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo"><a href="index.php"><img src="images/logo.png"></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">HOME</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php">ABOUT</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="product.php">OUR PRODUCTS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="video.php">VIDEO GAMES</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="remot.php">REMOT CONTROL</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">CONTACT US</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><img src="images/search-icon.png"></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="login.php">SIGN IN</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="register.php">REGISTER</a>
                </li>
              </ul>
            </div>
        </nav>
	</div>
	<!-- header section end -->
<!-- product section start -->
<?php
include 'koneksi.php';

// Query untuk mengambil 6 produk pertama
$query = "SELECT * FROM products LIMIT 2";
$result = $conn->query($query);
?>

<div class="product_section layout_padding">
  <div class="container">
    <div class="product_text">Our <span style="color: #5ca0e9;">products</span></div>
    <p class="long_text">Explore our latest products carefully crafted for your needs.</p>
    <div class="product_section_2">
      <div class="row" id="product-list">
        <?php while ($row = $result->fetch_assoc()) { ?>
          <div class="col-md-6">
            <div class="image_2s">
              <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
            </div>
            <div class="price_text">Price $ <span style="color: #3a3a38;"> <?php echo $row['price']; ?> </span></div>
            <h1 class="game_text"> <?php echo $row['name']; ?> </h1>
            <p class="long_text"> <?php echo $row['description']; ?> </p>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="see_main" id="see-main">
      <div class="see_bt"><a href="#" id="see-more">See More</a></div>
    </div>
  </div>
</div>
<!-- product section end -->

<script>
  const seeMain = document.getElementById("see-main");

  seeMain.addEventListener("click", function(event) {
  event.preventDefault();

  // AJAX
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "load_products.php?all=true", true);
  xhr.onload = function() {
    if (xhr.status === 200) {
      document.getElementById("product-list").innerHTML = xhr.responseText;
      seeMain.style.display = "none";
    } else {
      console.error("Failed to load products:", xhr.statusText);
    }
  };
  xhr.send();
});

</script>


  <!-- footer section start -->
  <div class="section_footer margin_top_0 ">
      <div class="container"> 
          <div class="footer_section_2">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3">
                  <h2 class="account_text">About Us</h2>
                  <p class="ipsum_text_2">dolor sit amet, consectetur magna aliqua. Ut enim ad minim veniam, quisdotempor incididunt r</p>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                  <h2 class="account_text">Useful Link</h2>
                  <div class="useful_link">
                    <ul>
                      <li><a href="#">Video games</a></li>
                      <li><a href="#">Remote control</a></li>
                      <li><a href="#">3d controller</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                <h2 class="account_text">Contact Us</h2>
                <p class="ipsum_text_2">dolor sit amet, consectetur magna aliqua. quisdotempor incididunt ut e </p>
                </div>
          <div class="col-sm-6 col-md-6 col-lg-3">
            <h2 class="account_text">Newsletter</h2>
            <input type="" class="email_text" placeholder="Enter Your Email" name="Enter Your Email">
            <button class="subscribr_bt">SUBSCRIBE</button>
          </div>
        </div>
      </div>
      <div class="social_icon">
        <ul>
          <li><a href="#"><img src="images/fb-icon.png"></a></li>
          <li><a href="#"><img src="images/twitter-icon.png"></a></li>
          <li><a href="#"><img src="images/linkdin-icon.png"></a></li>
          <li><a href="#"><img src="images/instagram-icon.png"></a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- footer section end -->
  <!-- copyright section start -->
  <div class="copyright_section">
    <div class="container">
      <p class="copyright_text">Copyright 2020 All Right Reserved By <a href="https://html.design/"> Free html Templates</p>
    </div>
  </div>
  <!-- copyright section end -->
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