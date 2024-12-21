<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

$showModule = true;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Play Verse Admin - Manage Users</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="icon" href="../images/Logo Play Verse.png" type="image/gif" />
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> -->


    <style>
        #module {
            display: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            font-size: 16px;
        }

        th {
            background-color: #3498db;
            color: white;
            font-weight: 600;
        }

        td {
            background-color: #f9f9f9;
            color: #333;
            border-bottom: 1px solid #ddd;
        }

        td:hover {
            background-color: #f1f1f1;
            transition: 0.3s;
        }

        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        tr:hover td {
            background-color: #e9e9e9;
        }

        .table-container {
            overflow-x: auto;
        }

        /* Styling untuk tombol di dalam tabel */
        .btn {
            padding: 8px 12px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
            text-align: center;
            transition: 0.3s ease;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .btn.delete {
            background-color: #e74c3c;
        }

        .btn.delete:hover {
            background-color: #c0392b;
        }

        .dataTable th,
        .dataTable td {
            border: 1px solid #ddd;
            /* Garis pembatas warna abu-abu */
        }

        .dashboard-container {
            padding: 2rem;
            background: #f8f9fa;
            min-height: calc(100vh - 200px);
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

        .table-container {
            margin-top: 1rem;
            background: white;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 0.375rem 0.75rem;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #5ca0e9;
            color: white !important;
            border: 1px solid #5ca0e9;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #4a90e2;
            color: white !important;
            border: 1px solid #4a90e2;
        }
    </style>
</head>

<body>
    <!-- Header section -->
    <div class="header_section">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="logo"><a href="../admin_dashboard.php"><img src="../images/logo nav.png"></a></div>
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
                    <a href="../admin_dashboard.php" class="sidebar-link">Overview</a>
                    <a href="manage_products.php" class="sidebar-link">Manage Products</a>
                    <a href="manage_transactions.php" class="sidebar-link">Manage Transactions</a>
                    <a href="users.php" class="sidebar-link active">Manage Users</a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="content-area">
                    <h2 class="">Manage Users</h2>
                    <button id="toggleBtn" class="btn btn-primary mt-3">Add</button>
                    <?php if ($showModule): ?>
                        <div id="module" class="mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="register_section">
                                        <div class="container">
                                            <div class="register_section_2">
                                                <form action="create_user.php" method="POST">
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

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="table-container">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Address</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($row['id']); ?></td>
                                        <td><?= htmlspecialchars($row['username']); ?></td>
                                        <td><?= htmlspecialchars($row['address']); ?></td>
                                        <td><?= htmlspecialchars($row['password']); ?></td>
                                        <td>
                                            <a href="edit.php?type=users&id=<?= $row['id']; ?>" class="btn ">Edit</a>
                                            <a href="delete.php?type=users&id=<?= $row['id']; ?>" class="btn delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
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

    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true,
                pageLength: 10,
                language: {
                    search: "Search users:",
                    lengthMenu: "Show _MENU_ users per page",
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#toggleBtn').click(function() {
                $('#module').toggle();
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
                if (this.value.length >= 4) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                } else {
                    this.classList.remove('is-valid');
                    this.classList.add('is-invalid');
                }
            });

            // Validasi Address
            address.addEventListener('input', function() {
                if (this.value.length >= 10) {
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
                if (regex.test(this.value)) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                } else {
                    this.classList.remove('is-valid');
                    this.classList.add('is-invalid');
                }

                if (confirm_password.value) {
                    confirm_password.dispatchEvent(new Event('input'));
                }
            });

            // Validasi Confirm Password
            confirm_password.addEventListener('input', function() {
                if (this.value === password.value && this.value !== '') {
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
                    if (input.classList.contains('is-invalid') || !input.value) {
                        isValid = false;
                        input.classList.add('is-invalid');
                    }
                });

                if (!document.getElementById('agree').checked) {
                    isValid = false;
                    alert('Anda harus menyetujui syarat dan ketentuan!');
                }

                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>

</html>