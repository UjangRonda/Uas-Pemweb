<?php
// Koneksi ke database
include('../koneksi.php');
// Ambil ID yang akan diedit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
   
    // Query untuk mendapatkan data berdasarkan ID
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);
   
    if (mysqli_num_rows($result) > 0) {
        // Ambil data dari database
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Data tidak ditemukan!";
        exit;
    }
} else {
    echo "ID tidak ditemukan!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit User | Play Verse</title>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
  <link rel="stylesheet" href="../css/responsive.css">
  <link rel="icon" href="../images/Logo Play Verse.png" type="image/gif" />
  <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  
  <style>
    .edit_section {
      padding: 50px 0;
      background-color: #f8f9fa;
    }
    
    .edit_section_2 {
      width: 100%;
      max-width: 600px;
      margin: 0 auto;
      padding: 30px;
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    
    .edit_text {
      width: 100%;
      font-size: 36px;
      color: #262626;
      text-align: center;
      margin-bottom: 30px;
    }
    
    .form-control {
      margin-bottom: 20px;
    }
    
    .button-container {
      display: flex;
      justify-content: space-between;
      margin-top: 30px;
    }
    
    .btn-primary {
      background-color: #5ca0e9;
      border-color: #5ca0e9;
    }
    
    .btn-primary:hover {
      background-color: #4a90e2;
      border-color: #4a90e2;
    }
    
    .is-invalid {
      border-color: #dc3545;
    }
    
    .is-valid {
      border-color: #28a745;
    }
  </style>
</head>
<body>
  <!-- header section start -->
  <div class="header_section">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="logo"><a href="index.php"><img src="../images/logo nav.png"></a></div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="../admin_dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="users.php">Manage Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../logout.php">LOGOUT</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <!-- header section end -->

  <!-- edit section start -->
  <div class="edit_section layout_padding">
    <div class="container">
      <div class="edit_section_2">
        <div class="edit_text">Edit <span style="color: #5ca0e9;">User</span></div>
        <form action="update_user.php" method="POST" id="editForm">
          <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
          
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" 
                   value="<?php echo htmlspecialchars($row['username']); ?>" required>
            <div id="username-message" class="invalid-feedback"></div>
          </div>
          
          <div class="form-group">
            <label for="address">Shipping Address</label>
            <input type="text" class="form-control" id="address" name="address" 
                   value="<?php echo htmlspecialchars($row['address']); ?>" required>
            <div id="address-message" class="invalid-feedback"></div>
          </div>
          
          <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" id="password" name="password" 
                   value="<?php echo htmlspecialchars($row['password']); ?>" required>
            <div id="password-message" class="invalid-feedback"></div>
          </div>
          
          <div class="button-container">
            <a href="users.php" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update User</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- edit section end -->

  <!-- footer section start -->
  <div class="section_footer">
    <div class="container">
      <div class="footer_section_2">
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-3">
            <h2 class="account_text">Play Verse</h2>
            <p class="ipsum_text_2">Admin Dashboard for managing Play Verse gaming platform</p>
          </div>
        </div>
      </div>
      <div class="copyright_section">
        <div class="container">
          <p class="copyright_text">Copyright 2024 All Right Reserved By Play Verse</p>
        </div>
      </div>
    </div>
  </div>
  <!-- footer section end -->

  <!-- Javascript files-->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.0.0.min.js"></script>
  <script src="js/plugin.js"></script>
  <script src="js/custom.js"></script>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
      const username = document.getElementById('username');
      const address = document.getElementById('address');
      const password = document.getElementById('password');
      
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
          if(this.value.length < 10) {
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
      });

      function setInvalid(element, messageDiv, message) {
          element.classList.add('is-invalid');
          element.classList.remove('is-valid');
          messageDiv.textContent = message;
      }

      function setValid(element, messageDiv) {
          element.classList.remove('is-invalid');
          element.classList.add('is-valid');
          messageDiv.textContent = '';
      }

      document.getElementById('editForm').addEventListener('submit', function(e) {
          const inputs = [username, address, password];
          let isValid = true;

          inputs.forEach(input => {
              if(input.classList.contains('is-invalid') || input.value.length === 0) {
                  isValid = false;
                  input.dispatchEvent(new Event('input'));
              }
          });

          if(!isValid) {
              e.preventDefault();
          }
      });
  });
  </script>
</body>
</html>