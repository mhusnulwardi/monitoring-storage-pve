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
$allNodes = $proxmox->get('/nodes');
foreach ($allNodes['data'] as $key => $data) {
    $nodesstatus[] = array('status' => $data['status']);
     $nodescpu[] = array('cpu' => $data['cpu']);
     $nodesmaxcpu[] = array('maxcpu' => $data['maxcpu']);
     $nodesmem[] = array('mem' => $data['mem']);
     $nodesmaxmem[] = array('maxmem' => $data['maxmem']);
     $nodesdisk[] = array('disk' => $data['disk']);
     $nodesmaxdisk[] = array('maxdisk' => $data['maxdisk']);
}

$lxc = $proxmox->get('/nodes/pve/lxc');
foreach ($lxc['data'] as $key => $data) {
    $lxcvmid[] = array('vmid' => $data['vmid']);
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
                                <li class="nav-item"> <a class="nav-link" href="container.php"><?php echo $lxcvmid[0]['vmid']; ?></a></li>
                                <li class="nav-item"> <a class="nav-link" href="container.php"><?php echo $lxcvmid[1]['vmid']; ?></a></li>
                                <li class="nav-item"> <a class="nav-link" href="container.php"><?php echo $lxcvmid[2]['vmid']; ?></a></li>
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
                                <li class="nav-item"> <a class="nav-link" href="pools.php"><?php echo $poolsvmid[0]['vmid']; ?></a></li>
                                <li class="nav-item"> <a class="nav-link" href="pools.php"><?php echo $poolsvmid[1]['vmid']; ?></a></li>
                                <li class="nav-item"> <a class="nav-link" href="pools.php"><?php echo $poolsvmid[2]['vmid']; ?></a></li>
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
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                <i class="mdi mdi-server"></i>
                            </span> Datacenter </h3>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-primary card-img-holder text-white">
                                <div class="card-body">
                                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">CPU <i class="mdi mdi-desktop-tower mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5"><?php echo $nodescpu[0]['cpu']; ?> %</h2>
                                    <h6 class="card-text">of <?php echo $nodesmaxcpu[0]['maxcpu']; ?> CPU(s)</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-info card-img-holder text-white">
                                <div class="card-body">
                                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">Memory <i class="mdi mdi-memory mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5"><?php echo $nodesmem[0]['mem']; ?></h2>
                                    <h6 class="card-text">of <?php echo $nodesmaxmem[0]['maxmem']; ?> GiB</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-success card-img-holder text-white">
                                <div class="card-body">
                                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">Storage <i class="mdi mdi-cloud mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5"><?php echo $nodesdisk[0]['disk']; ?></h2>
                                    <h6 class="card-text">of <?php echo $nodesmaxdisk[0]['maxdisk']; ?> GiB</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Helth</h4>
                                    <table class="table-responsive">
                                        <tbody>
                                            <tr>
                                                <td>Status</td>
                                                <td><label class="badge badge-primary"><?php echo $nodesstatus[0]['status']; ?></label></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Guests</h4>
                                    <div class="table-responsive">

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
        <script src="assets/js/chart.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="assets/js/off-canvas.js"></script>
        <script src="assets/js/hoverable-collapse.js"></script>
        <script src="assets/js/misc.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="assets/js/dashboard.js"></script>
        <script src="assets/js/todolist.js"></script>
        <script type="text/javascript">
            // api2/json/nodes/{node}/storage/{storage}/rrddata
        </script>
        <!-- End custom js for this page -->
</body>

</html>