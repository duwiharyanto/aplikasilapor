<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= ucwords($global->headline)?> | Administrator</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url();?>asset/plugins/select2/select2.min.css">  
  <link rel="stylesheet" href="<?= base_url();?>asset/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url();?>asset/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url();?>asset/plugins/datatables/dataTables.bootstrap.css"> 
  <link rel="stylesheet" href="<?= base_url();?>asset/plugins/datepicker/datepicker3.css">  
  <link rel="stylesheet" href="<?= base_url();?>asset/plugins/animate-css/animate.css">   
  <link rel="stylesheet" href="<?= base_url();?>asset/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url();?>asset/dist/css/sweetalert.css">
  <link rel="stylesheet" href="<?= base_url();?>asset/dist/css/skins/_all-skins.min.css">
  
  <!--JAVASCRIPT CORE-->
  <script src="<?= base_url();?>asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="<?= base_url();?>asset/bootstrap/js/bootstrap.min.js"></script>  
  <script src="<?= base_url()?>asset/plugins/chartjs/Chart.bundle.js"></script>
  <script src="<?= base_url()?>asset/plugins/chartjs/utils.js"></script>
  <script src="<?= base_url();?>asset/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url();?>asset/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script src="<?= base_url();?>asset/plugins/select2/select2.full.min.js"></script> 
  <script src="<?= base_url();?>asset/plugins/datepicker/bootstrap-datepicker.js"></script>
  <script src="<?= base_url();?>asset/plugins/ckeditor/ckeditor.js"></script>  
  <script src="<?= base_url();?>asset/dist/js/sweetalert.min.js"></script>
  <script src="<?= base_url();?>asset/dist/js/jquery.priceformat.min.js"></script>  
  <script src="<?= base_url();?>asset/dist/js/jquery.validate.js"></script>
  <script src="<?= base_url();?>asset/plugins/bootstrap-notify/bootstrap-notify.js"></script>
</head>
<body class="hold-transition sidebar-collapse skin-green sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<!--================================HEADER================================-->
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url()?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><span class="fa fa-dashboard"></span></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Dashboard</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
          <a href="#" style="pointer-events:none">Tanggal : <?= date('d-m-Y')?></a>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url();?>asset/dist/img/user.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= ucwords($this->session->userdata('nim'))?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url();?>asset/dist/img/user.png" class="img-circle" alt="User Image">
                <p>
                 <?= ucwords($this->session->userdata('nim'))?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="">
                  <a href="<?php echo site_url("Login/logout")?>" class="btn btn-block btn-default btn-flat">Log Out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- =============================================== -->
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header" style="color:white">MENU UTAMA</li>
        <?php foreach ($menu as $menu):?>
          <?php if($menu->status==1):?>
            <li class="<?php if($global->menu==$menu->menu_nama){echo 'active';}?> treeview">
              <a href="#">
                <i class="<?= $menu->menu_ikon?>"></i> <span><?= ucwords($menu->menu_nama)?></span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php foreach($menu->submenu AS $submenu):?>
                   <li class="<?php if($global->submenu_menu==$submenu->menu_nama){echo 'active';}?>"><a href="<?= site_url($submenu->menu_link)?>"><i class="<?= $submenu->menu_ikon?>"></i> <?= ucwords($submenu->menu_nama)?></a></li>
                <?php endforeach;?>
              </ul>
            </li>            
          <?php else:?>
            <li class="<?php if($global->menu==$menu->menu_nama){echo 'active';}?>"><a href="<?= site_url($menu->menu_link)?>"><i class="<?= $menu->menu_ikon?>"></i> <span><?= ucwords($menu->menu_nama)?></span></a></li>
          <?php endif;?>
        <?php endforeach;?>  
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <span class="<?= $global->ikon?>"></span>
        <?php echo ucwords($global->headline)?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?= site_url($global->url)?>"><?= ucwords($global->headline)?></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-sm-12">
          <?php if($this->session->flashdata('success')):?>
            <script type="text/javascript">
                $.notify({
                  title: '<strong>Informasi</strong>',
                  message: '<?= $this->session->flashdata('success')?>'
                },{
                  type: 'info'
                });
            </script>       
          <?php elseif($this->session->flashdata('error')):?>
            <script type="text/javascript">
                $.notify({
                  title: '<strong>Perhatian </strong>',
                  message: '<?= $this->session->flashdata('error')?>'
                },{
                  type: 'danger'
                });
            </script>            
          <?php endif;?>  
        </div>
      </div>
      <!--==================================== KODE TULIS DISINI========================================-->  
      <?php
        if(file_exists(APPPATH.$global->view)){
           include(APPPATH.$global->view);
        }else{
          echo "halaman view tidak ditemukan";
        }
      ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
    </div>
    <span class="fa fa-question"></span> email : <strong><a href="mailto:p3si@gmail.com">p3si@gmail.com</a></strong>
  </footer>
</div>
<!-- ./wrapper -->
<!--=============================FOOTER====================================-->
<!-- SlimScroll -->
<script src="<?= base_url();?>asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url();?>asset/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url();?>asset/dist/js/adminlte.min.js"></script>
<script src="<?= base_url();?>asset/dist/js/app.min.js"></script>
<script src="<?= base_url();?>asset/dist/js/demo.js"></script>
</body>
</html>

