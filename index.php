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
  <title>Play Verse</title>
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
<?php
  session_start();
?>
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
  <!-- banner section start -->
  <div class="banner_section layout_padding">
    <div class="container">
      <div id="my_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md-6">
                <h1 class="video_text">Video games</h1>
                <p class="banner_text">Play Verse, toko video game terpercaya yang menghadirkan keseruan, inovasi, dan kualitas dalam setiap produknya. Play Verse menawarkan berbagai pilihan gamepad, aksesoris gaming, dan koleksi video game terbaru dari berbagai genre, dirancang untuk memenuhi kebutuhan dan selera para gamer.</p>
                <div class="shop_bt"><a href="product.php">Shop Now</a></div>
              </div>
              <div class="col-md-6">
                <div class="image_1"><img src="images/img-1.png"></div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-6">
                <h1 class="video_text">Video games</h1>
                <p class="banner_text">Play Verse fokus pada kenyamanan dan performa, Play Verse juga menghadirkan produk-produk berkualitas tinggi yang cocok untuk semua kalangan, mulai dari casual gamer hingga profesional. Temukan pengalaman gaming terbaik bersama kami dan jadikan Play Verse sebagai destinasi utama untuk melengkapi perjalanan gaming Anda.</p>
                <div class="shop_bt"><a href="product.php">Shop Now</a></div>
              </div>
              <div class="col-md-6">
                <div class="image_1"><img src="images/img-2.png"></div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-6">
                <h1 class="video_text">Video games</h1>
                <p class="banner_text">Selain menyediakan produk unggulan, Play Verse juga berkomitmen untuk memberikan layanan pelanggan yang ramah dan responsif. Dengan dukungan komunitas yang terus berkembang, Play Verse ingin menciptakan ruang bagi para gamer untuk berbagi semangat, pengalaman, dan passion mereka. Mari bersama-sama menjadikan dunia gaming lebih seru dengan Play Verse!</p>
                <div class="shop_bt"><a href="product.php">Shop Now</a></div>
              </div>
              <div class="col-md-6">
                <div class="image_1"><img src="images/img-3.png"></div>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
          <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
          <i class="fa fa-angle-right"></i>
        </a>
      </div>
    </div>
  </div>
  <!-- banner section end -->
  <!-- about section start -->
  <div class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="image_2"><img src="images/img-4.png"></div>
        </div>
        <div class="col-md-6">
          <h1 class="about_text">About</h1>
          <p class="lorem_text"><b>Play Verse meiliki misi untuk membangun kreativitas dan teknologi dalam dunia gaming. Play Verse ingin memberi para gamer akses ke produk berkualitas yang mendukung pengembangan keterampilan, kreativitas, dan inovasi dalam setiap permainan.</b></p>
          <div class="shop_bt_2"><a href="product.php">Shop Now</a></div>
        </div>
      </div>
    </div>
  </div>
  <!-- about section end -->
  <!-- product section start -->
<div class="product_section layout_padding">
  <div class="container">
    <div class="product_text">Our Products</div>
    <p class="long_text1"><b>Play Verse menyediakan berbagai produk gaming berkualitas, termasuk gamepad, aksesoris gaming seperti headset, mouse, dan keyboard, serta video game terbaru. Semua produk kami dirancang untuk memberikan pengalaman bermain yang optimal dan menyenangkan.</b></p>
    <div class="product_section_2">
      <div class="row">
        <div class="col-md-4">
          <div class="product_card">
            <div class="image_2"><img src="images/produk1.jpg"></div>
            <div class="price_text">Price Rp <span style="color: #3371e2;">16.469.827</span></div>
            <h1 class="game_text">Microsoft Xbox Series X</h1>
            <p class="long_text">Xbox Series X adalah konsol game generasi terbaru dari Microsoft yang menawarkan performa luar biasa dengan grafis 4K dan frame rate hingga 120 FPS. Ditenagai oleh prosesor custom, SSD super cepat, dan dukungan ray tracing.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="product_card">
            <div class="image_2"><img src="images/produk2.png"></div>
            <div class="price_text">Price Rp <span style="color: #3371e2;">599.000</span></div>
            <h1 class="game_text">The Witcher 3: Wild Hunt</h1>
            <p class="long_text">Sebagai Geralt of Rivia, pemain berpetualang di dunia terbuka yang luas, memecahkan misteri, bertarung dengan monster, dan memilih keputusan moral yang memengaruhi alur cerita. Game RPG ini menawarkan grafis memukau dan gameplay mendalam.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="product_card">
            <div class="image_2"><img src="images/produk3.png"></div>
            <div class="price_text">Price Rp <span style="color: #3371e2;">699.000</span></div>
            <h1 class="game_text">Call of Duty: Modern Warfare</h1>
            <p class="long_text">S Game tembak-menembak aksi dengan grafis realistis dan mode multiplayer intens. Game ini memiliki kampanye pemain tunggal yang mendalam serta mode battle royale yang seru.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="see_main">
      <div class="see_bt"><a href="product.php">See More</a></div>
    </div>
  </div>
</div>
<!-- product section end -->


  <!-- video section start -->
  <div class="video_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="video_text_2">3D Video game</h1>
          <h1 class="controller_text_2">Remoto control</h1>
          <p class="banner_text_2">Play Verse menawarkan 3D Video Games dan Remote-Controlled Gaming Devices yang dirancang untuk menghadirkan pengalaman bermain yang realistis dan interaktif. Teknologi 3D Play Verse memungkinkan pemain merasakan dunia game dengan visual yang hidup dan efek mendalam, memberikan sensasi bermain yang tak tertandingi.</p>
          <div class="shop_bt"><a href="product.php">Shop Now</a></div>
        </div>
        <div class="col-md-6">
          <div class="image_4"><img src="images/img-5.png"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- video section end -->
  <!-- testimonial section start -->
  <div class="testimonial_section layout_padding">
    <div class="container">
      <h1 class="testimonial_text">Testimoni</h1>
      <p class="ipsum_text"><b>"Play Verse adalah toko game terpercaya dengan koleksi terbaik dan layanan memuaskan. Banyak pelanggan memberikan ulasan positif atas kualitas produk kami, menjadikan Play Verse pilihan utama bagi para gamer."</b></p>
      <div class="testimonial_section_2">
        <div class="box_main">
          <div class="quote_icon"><img src="images/quote-icon.png"></div>
          <p class="dolor_text"><b> "Belanja di Play Verse adalah keputusan terbaik saya sebagai gamer. Game 3D dan perangkatnya sangat inovatif, memberikan sensasi bermain yang mendalam. Stafnya ramah, dan pengiriman tepat waktu!</b></p>
          <div class="client_main">
            <div class="client_left">
              <div class="images_5"><img src="images/img-5.png"></div>
            </div>
            <div class="client_right">
              <h1 class="sandy_text">Adik Nur Halimah</h1>
              <p class="sandy_text_1">Reprehenderit</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- testimonial section end -->
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
          <div class="col-sm-6 col-md-6 col-lg-3">
            <h2 class="account_text">Newsletter</h2>
            <input type="" class="email_text" placeholder="Enter Your Email" name="Enter Your Email">
            <button class="subscribr_bt">SUBSCRIBE</button>
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
  <script>
    $(document).ready(function() {
      $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
      });
    });
  </script>
</body>

</html>