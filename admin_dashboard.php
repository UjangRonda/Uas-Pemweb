<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['role'] !== 'admin') {
  header("Location: login.php");
  exit();
}

$query_products = "SELECT COUNT(*) as total_products FROM products";
$result_products = mysqli_query($conn, $query_products);
$products_count = mysqli_fetch_assoc($result_products)['total_products'];

$query_transactions = "SELECT COUNT(*) as total_transactions FROM transactions";
$result_transactions = mysqli_query($conn, $query_transactions);
$transactions_count = mysqli_fetch_assoc($result_transactions)['total_transactions'];

$transaction_dates = [];
$transaction_counts = [];

$query_chart = "SELECT DATE(transaction_date) as date, COUNT(*) as count 
                FROM transactions 
                GROUP BY DATE(transaction_date) 
                ORDER BY DATE(transaction_date) DESC LIMIT 7";
$result_chart = mysqli_query($conn, $query_chart);

while ($row = mysqli_fetch_assoc($result_chart)) {
  $transaction_dates[] = $row['date'];
  $transaction_counts[] = $row['count'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Play Verse Admin Dashboard</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="icon" href="images/Logo Play Verse.png" type="image/gif" />
  <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

  <style>
    .dashboard-container {
      padding: 2rem;
      background: #f8f9fa;
      min-height: calc(100vh - 200px);
    }

    .stats-card {
      background: white;
      border-radius: 8px;
      padding: 1.5rem;
      margin-bottom: 1rem;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .stats-number {
      font-size: 2rem;
      font-weight: bold;
      color: #5ca0e9;
    }

    .sidebar {
      background: white;
      padding: 1rem;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .sidebar-link {
      display: block;
      padding: 0.75rem 1rem;
      color: #333;
      text-decoration: none;
      border-radius: 4px;
    }

    .sidebar-link:hover {
      background: #f0f0f0;
      color: #5ca0e9;
    }

    .content-area {
      background: white;
      padding: 1.5rem;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .action-buttons a {
      margin: 0 5px;
    }

    .status-pending {
      color: #ffc107;
    }

    .status-completed {
      color: #28a745;
    }

    .status-cancelled {
      color: #dc3545;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
  <!-- Header section -->
  <div class="header_section">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="logo"><a href="admin_dashboard.php"><img src="images/logo nav.png"></a></div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link">Welcome, Admin <?php echo htmlspecialchars($_SESSION['username']); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">LOGOUT</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <div class="dashboard-container">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3">
        <div class="sidebar">
          <h4 class="mb-4">Dashboard Menu</h4>
          <a href="admin_dashboard.php" class="sidebar-link active">Overview</a>
          <a href="admin/products.php" class="sidebar-link">Manage Products</a>
          <a href="admin/transactions.php" class="sidebar-link">Manage Transactions</a>
          <a href="admin/users.php" class="sidebar-link">Manage Users</a>
        </div>
      </div>

      <!-- Main Content -->
      <div class="col-md-9">
        <!-- Stats Cards -->
        <div class="row mb-4">
          <div class="col-md-6">
            <div class="stats-card">
              <h5>Total Products</h5>
              <div class="stats-number"><?php echo number_format($products_count); ?></div>
              <small class="text-muted">Products in catalogue</small>
            </div>
          </div>
          <div class="col-md-6">
            <div class="stats-card">
              <h5>Total Transactions</h5>
              <div class="stats-number"><?php echo number_format($transactions_count); ?></div>
              <small class="text-muted">All time transactions</small>
            </div>
          </div>
        </div>

        <div class="col-md-9">
          <!-- Recent Transactions Chart -->
          <div class="content-area p-4 bg-white rounded shadow-sm">
            <h4>Recent Transactions (Last 7 Days)</h4>
            <canvas id="recentTransactionsChart" height="100"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer section -->
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

  <!-- Scripts -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.0.0.min.js"></script>
  <script src="js/plugin.js"></script>
  <script src="js/custom.js"></script>
  <script>
    const ctx = document.getElementById('recentTransactionsChart').getContext('2d');

    const recentTransactionsChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode(array_reverse($transaction_dates)); ?>,
        datasets: [{
          label: 'Transactions',
          data: <?php echo json_encode(array_reverse($transaction_counts)); ?>,
          backgroundColor: 'rgba(92, 160, 233, 0.7)',
          borderColor: 'rgba(92, 160, 233, 1)',
          borderWidth: 2
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: true,
            position: 'bottom'
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: function(value) {
                return Number.isInteger(value) ? value : "";
              }
            }
          }
        }
      }
    });
  </script>

</body>

</html>