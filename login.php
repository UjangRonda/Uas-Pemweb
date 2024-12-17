<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>
<body>
  <div class="header_section">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="logo"><a href="index.php"><img src="images/logo.png"></a></div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">HOME</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">ABOUT</a></li>
          <li class="nav-item"><a class="nav-link" href="product.php">OUR PRODUCTS</a></li>
          <li class="nav-item"><a class="nav-link" href="video.php">VIDEO GAMES</a></li>
          <li class="nav-item"><a class="nav-link" href="remot.php">REMOT CONTROL</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">CONTACT US</a></li>
          <li class="nav-item active"><a class="nav-link" href="login.php">LOGIN</a></li>
        </ul>
      </div>
    </nav>
  </div>
  <div class="login_section layout_padding">
    <div class="container">
      <div class="login_text">Login to Your <span style="color: #5ca0e9;">Account</span></div>
      <p class="long_text">Enter your username and password to continue.</p>
      <div class="login_section_2">
        <form action="login_process.php" method="POST">
          <div class="row">
            <div class="col-md-6">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="col-md-6">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </div>
        </form>
        <div class="forgot_password">
          <a href="forgot_password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <div class="section_footer margin_top_0 ">
    <div class="container">
      <div class="footer_section_2">
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-3">
            <h2 class="account_text">About Us</h2>
            <p class="ipsum_text_2">dolor sit amet, consectetur magna aliqua.</p>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-3">
            <h2 class="account_text">Useful Link</h2>
            <ul>
              <li><a href="#">Video games</a></li>
              <li><a href="#">Remote control</a></li>
              <li><a href="#">3D controller</a></li>
            </ul>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-3">
            <h2 class="account_text">Contact Us</h2>
            <p class="ipsum_text_2">dolor sit amet, consectetur magna aliqua.</p>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-3">
            <h2 class="account_text">Newsletter</h2>
            <input type="email" class="email_text" placeholder="Enter Your Email" name="email">
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
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.0.0.min.js"></script>
  <script src="js/plugin.js"></script>
  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/owl.carousel.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>
</html>
