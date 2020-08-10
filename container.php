<?php
session_start();
require_once 'vendor/autoload.php';

use ProxmoxVE\Proxmox;

$credentials = [
    'hostname'  => $_SESSION['hostname'],
    'username'  => $_SESSION['username'],
    'password'  => $_SESSION['password'],
];

$proxmox = new Proxmox($credentials);
$lxc = $proxmox->get('/nodes/pve/lxc');
foreach ($lxc['data'] as $key => $data) {
    $vmid[] = array('vmid' => $data['vmid']);
    $name[] = array('name' => $data['name']);
    $status[] = array('status' => $data['status']);
    $maxdisk[] = array('maxdisk' => $data['maxdisk']);
    $maxmem[] = array('maxmem' => $data['maxmem']);
    $maxswap[] = array('maxswap' => $data['maxswap']);
    $mem[] = array('mem' => $data['mem']);
    $swap[] = array('swap' => $data['swap']);
    $disk[] = array('disk' => $data['disk']);
    $cpu[] = array('cpu' => $data['cpu']);
    $cpus[] = array('cpus' => $data['cpus']);
    $uptime[] = array('uptime' => $data['uptime']);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Proxmox VE</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/proxmox.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="#"><img src="assets/images/logo.svg" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="#"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="assets/images/faces/face4.jpg" alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black"> <?php echo $_SESSION['username']; ?> </p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="logout.php">
                                <i class="mdi mdi-logout mr-2 text-primary"></i> Logout </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                            <span class="menu-title">Datacenter</span>
                            <i class="mdi mdi-server menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">Container</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-cube menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="container.php"><?php echo $vmid[0]['vmid']; ?></a></li>
                                <li class="nav-item"> <a class="nav-link" href="container.php"><?php echo $vmid[1]['vmid']; ?></a></li>
                                <li class="nav-item"> <a class="nav-link" href="container.php"><?php echo $vmid[2]['vmid']; ?></a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                            <span class="menu-title">Pool</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-label menu-icon"></i>
                        </a>
                        <div class="collapse" id="general-pages">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pools.php">NamaPoolA</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pools.php">NamaPoolB</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <span class="menu-title">Logout</span>
                            <i class="mdi mdi-logout menu-icon"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Container </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Container</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Container</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">CT ID <?php echo $vmid[0]['vmid']; ?></div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Status</td><td><?php echo $status[0]['status']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Name</td><td><?php echo $name[0]['name']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>CPU</td><td><?php echo $cpu[0]['cpu']; ?> of <?php echo $cpus[0]['cpus']; ?> CPU(s)</td>
                                            </tr>
                                            <tr>
                                                <td>Memory</td><td><?php echo $mem[0]['mem']; ?> of <?php echo $maxmem[0]['maxmem']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Storage</td><td><?php echo $disk[0]['disk']; ?> of <?php echo $maxdisk[0]['maxdisk']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Swap</td><td><?php echo $swap[0]['swap']; ?> of <?php echo $maxswap[0]['maxswap']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 <a target="_blank">M. Husnul Wardi</a>. All rights reserved.</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/chart.js"></script>
    <!-- End custom js for this page -->
</body>

</html>