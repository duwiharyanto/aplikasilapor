<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Gleam Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url()?>/asset/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url()?>/asset/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?= base_url()?>/asset/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url()?>/asset/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url()?>/asset/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <?php if($this->session->error):?>
              <div class="alert alert-fill-danger" role="alert">
                <i class="mdi mdi-alert-circle"></i>
                  Username dan password salah, silahkan kontak admin
              </div>            
            <?php endif?>

            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="<?= base_url()?>/asset/images/logowithname.png" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" action="<?= $onsubmit?>" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <div class="mt-3">
                  <button type="post" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="<?= base_url()?>/asset/index.html">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
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
  <script src="<?= base_url()?>/asset/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?= base_url()?>/asset/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?= base_url()?>/asset/js/off-canvas.js"></script>
  <script src="<?= base_url()?>/asset/js/hoverable-collapse.js"></script>
  <script src="<?= base_url()?>/asset/js/misc.js"></script>
  <script src="<?= base_url()?>/asset/js/settings.js"></script>
  <script src="<?= base_url()?>/asset/js/todolist.js"></script>
  <!-- endinject -->
</body>
</html>
