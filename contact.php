<?php
  session_start();
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
<title>Contact | Play Verse</title>
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
<link rel="icon" href="images/Logo Play Verse.png" type="image/gif" />
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
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="logo"><a href="index.php"><img src="images/logo nav.png"></a></div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product.php">Our Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="video.php">Video Games</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link" href="#"><img src="images/search-icon.png"></a> -->
            <?php if (!isset($_SESSION['username'])): ?>
          <li class="nav-item active">
            <a class="nav-link" href="login.php">SIGN IN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">REGISTER</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="#">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">LOGOUT</a>
          </li>
        <?php endif; ?>
        </ul>
      </div>
    </nav>
  </div>
  <!-- header section end -->
  <!-- contact section start -->
  <div class="contact_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="email_box">
            <div class="input_main">
              <div class="container">
                <form action="/action_page.php">
                  <div class="form-group">
                    <input type="text" class="email-bt" placeholder="Name" name="Name">
                  </div>
                  <div class="form-group">
                    <input type="text" class="email-bt" placeholder="Email" name="Name">
                  </div>
                  <div class="form-group">
                    <input type="text" class="email-bt" placeholder="Phone Numbar" name="Email">
                  </div>
                  <div class="form-group">
                    <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                  </div>
                </form>
              </div>
              <div class="main_bt"><a href="#">Send Message</a></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="image_6"><img src="images/email.png"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- contact section end -->
  <!-- footer section start -->
  <div class="section_footer ">
    <div class="container">
      <div class="footer_section_2">
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-3">
            <h2 class="account_text">Play Verse</h2>
            <p class="ipsum_text_2">Rasakan Kendali Penuh dalam Dunia Gaming, Hadirkan Keseruan Tanpa Henti di Setiap Permainan</p>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-3">
            <h2 class="account_text">Useful Link</h2>
            <div class="useful_link">
              <ul>
                <li><a href="product.php">Our Products</a></li>
                <li><a href="video.php">Video games</a></li>
                <li><a href="contact.php">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-3">
            <h2 class="account_text">Follow Play Verse</h2>
            <p class="ipsum_text_2">Ikuti Play Verse untuk update terbaru, penawaran menarik, dan nikmati pengalaman gaming yang lebih seru</p>
          </div>
        </div>
      </div>
      <div class="social_icon">
        <ul>
          <li><a href="https://id-id.facebook.com/login.php/"><img src="images/fb-icon.png"></a></li>
          <li><a href="https://x.com/login?"><img src="images/twitter-icon.png"></a></li>
          <li><a href="https://www.linkedin.com/in/adiknurhalimah"><img src="images/linkdin-icon.png"></a></li>
          <li><a href="instagram.com/aaadiknhh_"><img src="images/instagram-icon.png"></a></li>
        </ul>
      </div>
    </div>
      <!-- copyright section start -->
      <div class="copyright_section">
        <div class="container">
          <p class="copyright_text">Copyright 2024 All Right Reserved By <a href="#"> Play Verse</p>
        </div>
      </div>
      <!-- copyright section end -->
  </div>
  <!-- footer section end -->
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