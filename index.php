<?php
require 'functions.php';
// $sql = "SELECT customerID,customerName, PostalCode, City, Country from customers";
$customer = retrieveData("SELECT customerID,customerName, PostalCode, City, Country from customers");
$itemsDay = top10Day();
$itemsMonth = top10Month();
$data_area = yearlySales();
$data_area3 = yearlySales2();
$data_areas = monthySales();
$data_area2 = weeklySales2();

$xxx = "Jan";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.html" class="brand-link text-center">
                <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                <p class="brand-text font-weight-light">Admin Dashboard</p>
                <p class="brand-text font-weight-light">UAS Basis Data</p>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block ">Hi, Gaduh Hartawan</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="customer.php" class="nav-link">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                    Customers

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="product.php" class="nav-link">
                                <i class="nav-icon fa fa-file"></i>
                                <p>
                                    Products
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Dashboard Page</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Box -->
                    <div class="row text-center">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <?php
                                    $sql = "select * from orders";
                                    $result = $conn->query($sql);
                                    $row = mysqli_num_rows($result);
                                    ?>
                                    <h3>
                                        <?= $row; ?>
                                    </h3>
                                    <p>Total Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <?php
                                    $sql = "select * from employees";
                                    $result = $conn->query($sql);
                                    $row = mysqli_num_rows($result);
                                    ?>
                                    <h3>
                                        <?= $row; ?>
                                    </h3>
                                    <p>Employees</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <?php
                                    $sql = "select * from customers";
                                    $result = $conn->query($sql);
                                    $row = mysqli_num_rows($result);
                                    ?>
                                    <h3>
                                        <?= $row; ?>
                                    </h3>
                                    <p>User Registrations</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="customer.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <?php
                                    $sql = "select * from products";
                                    $result = $conn->query($sql);
                                    $row = mysqli_num_rows($result);
                                    ?>
                                    <h3>
                                        <?= $row; ?>
                                    </h3>
                                    <p>Total Product</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="product.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- Chart -->
                    <div class="row">
                        <!-- Chart week -->
                        <div class="col-lg-6">
                            <canvas id="myChart" width="100" height="100"></canvas>
                        </div>
                        <div class="col-lg-6">
                            <canvas id="myChart3" width="100" height="100"></canvas>
                        </div>
                        <!-- Chart month -->
                        <div class="col-lg-6">
                            <canvas id="myChart2" width="100" height="100"></canvas>
                        </div>
                        <div class="col-lg-6">
                            <canvas id="myChart4" width="100" height="100"></canvas>
                        </div>
                        <!-- Laporan perHari -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Top 10 Product Sales/Day</h3>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table id="table-day" class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Sales</th>
                                                <th>Order Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($itemsDay as $item) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $item["ProductName"]; ?>
                                                    </td>
                                                    <td><?= $item["Price"]; ?>$</td>
                                                    <td>
                                                        <?= $item["Quantity"]; ?> Units
                                                    </td>
                                                    <td>
                                                        <?= $item["orderDate"] ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Laporan PerBulan -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Top 10 Product Sales/Month</h3>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table id="table-month" class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Sales</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($itemsMonth as $item) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $item["ProductName"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php $sum_total = floatval($item['Price']) * floatval($item['sum(Quantity)']); ?>
                                                        <?= $sum_total; ?>$
                                                    </td>
                                                    <td>
                                                        <?= $item["sum(Quantity)"]; ?> units
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $dateObject = DateTime::createFromFormat('!m', $item["month(orderDate)"]);
                                                        $monthName = $dateObject->format('F'); // March 
                                                        ?>
                                                        <?= $monthName; ?> -
                                                        <?= $item["year(orderDate)"]; ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Customers List</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Postal Code</th>
                                                <th>City</th>
                                                <th>Country</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($customer as $row) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row["customerName"]; ?></td>
                                                    <td><?php echo $row["PostalCode"]; ?></td>
                                                    <td><?php echo $row["City"]; ?></td>
                                                    <td><?php echo $row["Country"]; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Postal Code</th>
                                                <th>City</th>
                                                <th>Country</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- FLOT CHARTS -->
    <script src="plugins/flot/jquery.flot.js"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="plugins/flot/plugins/jquery.flot.resize.js"></script>
    <script src="plugins/chart.js/Chart.js"></script>
    <!-- Page specific script -->

    <script>
        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $(function() {
            $('#table-day').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $(function() {
            $('#table-month').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        var ctx = document.getElementById("myChart");
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Week 1", "Week 2", "Week 3", "Week 4", "week 5"],
                datasets: [{
                    label: 'Earnings on July 1996',
                    data: [<?= $data_areas; ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctxx = document.getElementById("myChart2");
        const myChart2 = new Chart(ctxx, {
            type: 'bar',
            data: {
                labels: ["<?php echo $xxx; ?>", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: 'Earnings on 1996',
                    data: [<?= $data_area; ?>],
                    // data: [12, 19, 3, 5, 2, 3, 10, 11, 12],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx3 = document.getElementById("myChart3");
        const myChart3 = new Chart(ctx3, {
            type: 'line',
            data: {
                labels: ["Week 1", "Week 2", "Week 3", "Week 4", "week 5"],
                datasets: [{
                    label: 'Total Order on July 1996',
                    data: [<?= $data_area2; ?>],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]

            }
        });

        var ctx4 = document.getElementById("myChart4");
        const myChart4 = new Chart(ctx4, {
            type: 'line',
            data: {
                labels: ["<?php echo $xxx; ?>", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: 'Total Order on 1996',
                    data: [<?= $data_area3; ?>],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]

            }
        });
    </script>
</body>

</html>