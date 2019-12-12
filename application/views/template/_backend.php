<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= ucwords($global->headline)?> | haryanto.duwi</title>

  <link rel="stylesheet" href="<?= base_url()?>/asset/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url()?>/asset/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?= base_url()?>/asset/vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="<?= base_url()?>/asset/css/style.css">
  <link rel="shortcut icon" href="<?= base_url()?>/asset/images/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>asset/vendors/datatables/datatables.css"/>
  <script type="text/javascript" src="<?= base_url();?>asset/vendors/jquery/jquery-2.2.3.min.js"></script>
  <!-- plugins:js -->
  <script src="<?= base_url()?>/asset/vendors/js/vendor.bundle.base.js"></script>
  <!---->
  <script src="<?= base_url()?>/asset/vendors/js/vendor.bundle.addons.js"></script>
  
  <!---->
  <script src="<?= base_url()?>/asset/js/jquery.validate.js"></script>


  <script src="<?= base_url()?>/asset/js/toastDemo.js"></script>
  <script src="<?= base_url()?>/asset/js/alerts.js"></script>
  <script type="text/javascript" src="<?= base_url();?>asset/vendors/datatables/datatables.min.js"></script>     
</head>

<body class="sidebar-fixed">
  <div class="container-scroller">
    <!-- partial:<?= base_url()?>/asset/partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="<?= base_url()?>"><img style="width: 180px;height: 55px" src="<?= base_url()?>/asset/images/logowithname.png" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="<?= base_url()?>"><img  style="width: 34px;height: 34px" src="<?= base_url()?>/asset/images/logo-mini.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <span class="d-none d-md-inline">Admin Dashboard</span>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile">
            <a class="nav-link">
              <div class="nav-profile-text">
                <p class="mb-0"><?=ucwords($this->session->userdata('user_nama'))?></p>
              </div>
              <div class="nav-profile-img">
                <img src="<?= base_url()?>/asset/images/faces/user.png" alt="image">
              </div>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-message-text-outline"></i>
              <span class="count-symbol"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <h6 class="p-3 mb-0">Messages</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="<?= base_url()?>/asset/images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                  <p class="text-gray mb-0">
                    1 Minutes ago
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="<?= base_url()?>/asset/images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                  <p class="text-gray mb-0">
                    15 Minutes ago
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="<?= base_url()?>/asset/images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                  <p class="text-gray mb-0">
                    18 Minutes ago
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <h6 class="p-3 mb-0 text-center">4 new messages</h6>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell-outline"></i>
              <span class="count-symbol bg-info"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <h6 class="p-3 mb-0">Notifications</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="mdi mdi-calendar"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                  <p class="text-gray ellipsis mb-0">
                    Just a reminder that you have an event today
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="mdi mdi-settings"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                  <p class="text-gray ellipsis mb-0">
                    Update dashboard
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="mdi mdi-link-variant"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                  <p class="text-gray ellipsis mb-0">
                    New admin wow!
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <h6 class="p-3 mb-0 text-center">See all notifications</h6>
            </div>
          </li>
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="<?= site_url('Login/logout')?>">
              Logout
              <i class="mdi mdi-power"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:<?= base_url()?>/asset/partials/_settings-panel.html -->
      <div id="settings-trigger"><i class="mdi mdi-format-color-fill"></i></div>
      <div id="theme-settings" class="settings-panel">
        <i class="settings-close mdi mdi-close"></i>
        <p class="settings-heading">SIDEBAR SKINS</p>
        <div class="sidebar-bg-options selected" id="sidebar-default-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Default</div>
        <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
        <p class="settings-heading mt-2">HEADER SKINS</p>
        <div class="color-tiles mx-0 px-4">
          <div class="tiles primary"></div>
          <div class="tiles success"></div>
          <div class="tiles warning"></div>
          <div class="tiles danger"></div>
          <div class="tiles info"></div>
          <div class="tiles dark"></div>
          <div class="tiles default light"></div>
        </div>
      </div>

      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <span class="nav-link">
              <img src="<?= base_url()?>/asset/images/faces/user.png" alt="image"/ style="width:64px;height: 64px"> 
              <span class="nav-profile-text"><?=ucwords($this->session->userdata('user_nama'))?></span>
              
            </span>
          </li>
          <?php foreach ($menu as $menu):?>
            <?php if($menu->status==1):?>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#<?=$menu->menu_link?>" aria-expanded="false" aria-controls="<?=$menu->menu_link?>">
                  <i class="<?=$menu->menu_ikon?> menu-icon"></i>              
                  <span class="menu-title"><?= ucwords($menu->menu_nama)?></span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="<?=$menu->menu_link?>">
                  <ul class="nav flex-column sub-menu">
                    <?php foreach($menu->submenu AS $submenu):?>
                    <li class="nav-item"> <a class="nav-link" href="<?= site_url($submenu->menu_link)?>"><?= ucwords($submenu->menu_nama)?></a></li>
                    <?php endforeach;?>
                  </ul>
                </div>
              </li>              
            <?php else:?>
              <li class="nav-item ">
                <a class="nav-link" href="<?= site_url($menu->menu_link)?>">
                  <i class="<?= $menu->menu_ikon?> menu-icon"></i>              
                  <span class="menu-title"><?= ucwords($menu->menu_nama)?></span>
                </a>
              </li>
                                      
            <?php endif;?>
          <?php endforeach;?>
          <li class="nav-item">
            <a class="nav-link" href="../documentation.html">
              <i class="mdi mdi-file-document-box menu-icon"></i>              
              <span class="menu-title">Documentation</span>
            </a>
          </li>
          <li class="nav-item sidebar-actions">
            <a class="nav-link" href="#">
              <i class="mdi mdi-circle-outline menu-icon text-danger"></i>
              Settings
            </a>
            <a class="nav-link" href="#">
              <i class="mdi mdi-circle-outline menu-icon text-danger"></i>
              Contact Support
            </a>
            <span class="nav-link">
              &copy; <?= date('Y')?> haryanto.duwi
            </span>
          </li>
        </ul>
      </nav>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
                <?= ucwords($global->headline)?>
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= site_url($global->url)?>"><?= ucwords($global->menu)?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= ucwords($global->headline)?></li>
                </ol>
            </nav>
          </div>

          <?php
            if(file_exists(APPPATH.$global->view)){
               include(APPPATH.$global->view);
            }else{
              echo "halaman view tidak ditemukan";
            }
          ?>                   
        </div>
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="javascript:void(0)">Haryanto.duwi</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  

  <!-- Custom js for this page-->
  <!--
  <script src="<?= base_url()?>/asset/js/data-table.js"></script>  
  -->

  <script src="<?= base_url()?>/asset/js/off-canvas.js"></script>
  <script src="<?= base_url()?>/asset/js/hoverable-collapse.js"></script>
  <script src="<?= base_url()?>/asset/js/misc.js"></script>
  <script src="<?= base_url()?>/asset/js/settings.js"></script>
  <script src="<?= base_url()?>/asset/js/todolist.js"></script>
  
</body>
</html>
<script type="text/javascript">
  var url=location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
  console.log(url);
</script>