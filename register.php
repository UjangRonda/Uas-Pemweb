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
  <title>Register | Play Verse</title>
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
  <link rel="stylesheet" href="css/style-register.css">
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

  <!-- register section start -->
  <div class="register_section layout_padding">
    <div class="container">
      <div class="register_text">Create an <span style="color: #5ca0e9;">Account</span></div>
      <p class="long_text">Sign up to enjoy our amazing products and services.</p>
      <div class="register_section_2">
        <form action="register_process.php" method="POST">
          <div class="row">
            <div class="col-md-12">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <!-- <div class="col-md-12">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div> -->
            <div class="col-md-12">
              <label for="address">Shipping Address</label>
              <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="col-md-12">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="col-md-12">
              <label for="confirm_password">Confirm Password</label>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="col-md-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="agree" name="agree" required>
                <label class="form-check-label" for="agree">I agree to the terms and conditions</label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="button-container">
                <a href="index.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- register section end -->

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

  <script>
  document.addEventListener('DOMContentLoaded', function() {
      const username = document.getElementById('username');
      const address = document.getElementById('address');
      const password = document.getElementById('password');
      const confirm_password = document.getElementById('confirm_password');
      
      username.addEventListener('input', function() {
          const messageDiv = document.getElementById('username-message');
          if(this.value.length < 4) {
              setInvalid(this, messageDiv, 'Username minimal 4 karakter');
          } else {
              setValid(this, messageDiv);
          }
      });

      address.addEventListener('input', function() {
          const messageDiv = document.getElementById('address-message');
          if(this.value.length < 5) {
              setInvalid(this, messageDiv, 'Alamat minimal 10 karakter');
          } else {
              setValid(this, messageDiv);
          }
      });

      password.addEventListener('input', function() {
          const messageDiv = document.getElementById('password-message');
          const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
          
          if(!regex.test(this.value)) {
              setInvalid(this, messageDiv, 'Password minimal 8 karakter, harus mengandung huruf besar, huruf kecil, dan angka');
          } else {
              setValid(this, messageDiv);
          }
          
          if(confirm_password.value) {
              confirm_password.dispatchEvent(new Event('input'));
          }
      });

      confirm_password.addEventListener('input', function() {
          const messageDiv = document.getElementById('confirm_password-message');
          if(this.value !== password.value) {
              setInvalid(this, messageDiv, 'Password tidak cocok');
          } else {
              setValid(this, messageDiv);
          }
      });

      function setInvalid(element, messageDiv, message) {
          element.classList.add('is-invalid');
          element.classList.remove('is-valid');
          messageDiv.textContent = message;
          messageDiv.style.display = 'block';
      }

      function setValid(element, messageDiv) {
          element.classList.remove('is-invalid');
          element.classList.add('is-valid');
          messageDiv.style.display = 'none';
      }

      document.querySelector('form').addEventListener('submit', function(e) {
          const inputs = [username, address, password, confirm_password];
          let isValid = true;

          inputs.forEach(input => {
              if(input.classList.contains('is-invalid') || input.value.length === 0) {
                  isValid = false;
                  input.dispatchEvent(new Event('input'));
              }
          });

          if(!document.getElementById('agree').checked) {
              isValid = false;
              alert('Anda harus menyetujui syarat dan ketentuan!');
          }

          if(!isValid) {
              e.preventDefault();
          }
      });
  });
  </script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const username = document.getElementById('username');
    const address = document.getElementById('address');
    const password = document.getElementById('password');
    const confirm_password = document.getElementById('confirm_password');
    
    // Validasi Username
    username.addEventListener('input', function() {
        if(this.value.length >= 4) {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        } else {
            this.classList.remove('is-valid');
            this.classList.add('is-invalid');
        }
    });

    // Validasi Address
    address.addEventListener('input', function() {
        if(this.value.length >= 10) {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        } else {
            this.classList.remove('is-valid');
            this.classList.add('is-invalid');
        }
    });

    // Tambahkan tooltip untuk password
    const passwordField = document.getElementById('password');
    const tooltip = document.createElement('div');
    tooltip.className = 'password-tooltip';
    tooltip.innerHTML = 'Password harus memenuhi kriteria:<br>- Minimal 8 karakter<br>- Minimal 1 huruf besar<br>- Minimal 1 huruf kecil<br>- Minimal 1 angka';
    passwordField.parentElement.appendChild(tooltip);

    // Tampilkan tooltip saat password field difokuskan
    passwordField.addEventListener('focus', function() {
        tooltip.style.display = 'block';
    });

    // Sembunyikan tooltip saat password field kehilangan fokus
    passwordField.addEventListener('blur', function() {
        tooltip.style.display = 'none';
    });

    // Validasi Password
    password.addEventListener('input', function() {
        const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
        if(regex.test(this.value)) {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        } else {
            this.classList.remove('is-valid');
            this.classList.add('is-invalid');
        }
        
        if(confirm_password.value) {
            confirm_password.dispatchEvent(new Event('input'));
        }
    });

    // Validasi Confirm Password
    confirm_password.addEventListener('input', function() {
        if(this.value === password.value && this.value !== '') {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        } else {
            this.classList.remove('is-valid');
            this.classList.add('is-invalid');
        }
    });

    // Validasi form submit
    document.querySelector('form').addEventListener('submit', function(e) {
        const inputs = [username, address, password, confirm_password];
        let isValid = true;

        inputs.forEach(input => {
            if(input.classList.contains('is-invalid') || !input.value) {
                isValid = false;
                input.classList.add('is-invalid');
            }
        });

        if(!document.getElementById('agree').checked) {
            isValid = false;
            alert('Anda harus menyetujui syarat dan ketentuan!');
        }

        if(!isValid) {
            e.preventDefault();
        }
    });
});
</script>

</body>
</html>
