<?php
session_start();

if (isset($_POST['login'])) {

  $hostname = $_POST['hostname'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (!empty(trim($hostname)) && !empty(trim($username)) && !empty(trim($password))) {
    $_SESSION['hostname']=$hostname;
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    header("Location:dashboard.php");
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login - Proxmox VE</title>
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
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo text-center">
                <img src="assets/images/logo.svg">
              </div>
              <h4 class="font-weight-light text-center">Login to Proxmox VE.</h4>
              <form class="pt-3" action="" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="hostname" id="hostname" placeholder="Hostname">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="username" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password">
                </div>
                <div class="mt-3">
                  <!-- <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" -->
                  <!-- name="login" href="dashboard.php">LOGIN</a> -->
                  <!-- <button type="submit">LOGIN</button> -->
                  <input type="submit" class="btn btn-block btn-gradient-primary btn-sm font-weight-medium auth-form-btn" value="LOGIN" name="login">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <!-- endinject -->
</body>

</html>