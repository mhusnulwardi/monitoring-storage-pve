<?php

require_once 'config.php';

session_start();
$_SESSION


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
                                <img src="assets/images/faces/face1.jpg" alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">M. Husnul Wardi</p>
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
                        <a class="nav-link" href="storage.php">
                            <span class="menu-title">Storage</span>
                            <i class="mdi mdi-database menu-icon"></i>
                        </a>
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
                                    <h2 class="mb-5">2%</h2>
                                    <h6 class="card-text">of 1 CPU(s)</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-info card-img-holder text-white">
                                <div class="card-body">
                                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">Memory <i class="mdi mdi-memory mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5">42%</h2>
                                    <h6 class="card-text">833 MiB of 1.94 GiB</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-success card-img-holder text-white">
                                <div class="card-body">
                                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">Storage <i class="mdi mdi-cloud mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5">9%</h2>
                                    <h6 class="card-text">2.66 GiB of 28.41 GiB</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Recent Tickets</h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th> Assignee </th>
                                                        <th> Subject </th>
                                                        <th> Status </th>
                                                        <th> Last Update </th>
                                                        <th> Tracking ID </th>
                                                    </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>
                                      <img src="assets/images/faces/face1.jpg" class="mr-2" alt="image"> David Grey </td>
                                    <td> Fund is not recieved </td>
                                    <td>
                                      <label class="badge badge-gradient-success">DONE</label>
                                    </td>
                                    <td> Dec 5, 2017 </td>
                                    <td> WD-12345 </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <img src="assets/images/faces/face2.jpg" class="mr-2" alt="image"> Stella Johnson </td>
                                    <td> High loading time </td>
                                    <td>
                                      <label class="badge badge-gradient-warning">PROGRESS</label>
                                    </td>
                                    <td> Dec 12, 2017 </td>
                                    <td> WD-12346 </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <img src="assets/images/faces/face3.jpg" class="mr-2" alt="image"> Marina Michel </td>
                                    <td> Website down for one week </td>
                                    <td>
                                      <label class="badge badge-gradient-info">ON HOLD</label>
                                    </td>
                                    <td> Dec 16, 2017 </td>
                                    <td> WD-12347 </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <img src="assets/images/faces/face4.jpg" class="mr-2" alt="image"> John Doe </td>
                                    <td> Loosing control on server </td>
                                    <td>
                                      <label class="badge badge-gradient-danger">REJECTED</label>
                                    </td>
                                    <td> Dec 3, 2017 </td>
                                    <td> WD-12348 </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title float-left">Local</h4>
                                    <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                                    <canvas id="visit-sale-chart" class="mt-4"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Local LVM</h4>
                                    <canvas id="traffic-chart"></canvas>
                                    <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
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